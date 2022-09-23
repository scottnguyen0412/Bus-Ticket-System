<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Coupon;
use App\Models\Schedule;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendMailBilling;

use Carbon\Carbon;
use DB;
use Session;



class BookingController extends Controller
{
    public function index()
    {

    }

    public function booking(Request $request)
    {
        $booking = new Booking();
        $booking->user_id = Auth::id();
        if(!$booking->user_id)
        {
            return redirect()->back()->with('status', "Please Login to continute");
        }
        $booking->seat_number = $request->input('choose_seats');
        
        $booking->booking_date = Carbon::now();
        $booking->schedule_id = $request->input('schedule_id');

        // Get coupon value through session
        $coupon = Session::get('coupon');
        // Check if have session coupon
        if($coupon)
        {
            // check value and get id
            $coupon_code = Coupon::where('coupon_code', $coupon)->first()->id;
            
            $booking->coupon_id = $coupon_code;
        }
        $schedule = Schedule::where('id',$booking->schedule_id)->get();
        $total = 0;
        foreach($schedule as $sche)
        {
            $total += $request->input('choose_seats') * $sche->price_schedules;
        }
        $booking->total_price = $total;
        $booking->payment_method = $request->input('payment_mode');
        $booking->payment_id = $request->input('payment_id');
        // dd($booking);
        $booking->save();
        if ($request->input('payment_mode') == "Paid by Razorpay" || $request->input('payment_mode') == "Paid by Paypal") {            
            return response()->json(['status' => 'Order placed successfully']);
        }
        SendMailBilling::dispatch($booking, $schedule)->delay(now());
        // If order successfully then delete session coupon with condition user have coupon
        Session::forget('coupon');
        return redirect('/schedules')->with('status', 'Order Successfully');
    }

    public function checkCoupon(Request $request) 
    {
        $coupon_code = $request->input('coupon_code');
        $coupon = Coupon::where('coupon_code', $coupon_code)->count();
        if($coupon == 0)
        {
            return back()->with('warning', 'You entered an invalid coupon');
        }
        else
        {
            $apply_coupon = Coupon::where('coupon_code', $coupon_code)->get()->first();

            $currentDate = date('Y-m-d');
            $expired_date_coupon = $apply_coupon->valid_until;
           
            if($expired_date_coupon < $currentDate)
            {
                //  dd($expired_date_coupon < $currentDate);
                return redirect()->back()->with('warning', "Coupon is expired");
            }
            else
                {
                    $coupon_session = Session::get('coupon');
                    if($coupon_session)
                    {
                        $is_available = 0;
                        if($is_available == 0)
                        {
                            $count[] = array(
                                'coupon_code' => $apply_coupon->coupon_code,
                                'price_coupon' => $apply_coupon->price_coupon,
                            );
                            // Create new session 
                            Session::put('coupon', $count);
                        }
                    }
                    // Nếu chưa nhập mã giảm giá
                    else
                    {
                        $count[] = array(
                                'coupon_code' => $apply_coupon->coupon_code,
                                'price_coupon' => $apply_coupon->price_coupon,
                            );
                            // Create new session 
                            Session::put('coupon', $count);
                    }
                    Session::save();
                    return back()->with('success', 'Apply coupon successfully');
                }
            } 
    }

    public function removeCoupon(){
        $coupon = Session::get('coupon');
        if($coupon)
        {
            Session::forget('coupon');
        }
        return redirect()->back()->with('success','Removed Coupon Successfully');
    }

    public function razorpayCheck(Request $request)
    {
        $booking = Booking::where('user_id', Auth::id())->get();

        if(!$booking)
        {
            return redirect()->back()->with('status', "Please Login to continute");
        }
        $schedule = Schedule::where('id',$request->input('schedule_id'))->get();
        $total = 0;
        foreach($schedule as $sche)
        {
            $total += $request->input('choose_seats') * $sche->price_schedules;
        }
        // dd($total);
        $seat_number = $request->input('choose_seats');
        $schedule_id = $request->input('schedule_id');
        $coupon_id = $request->input('coupon_id');
        
        return response()->json([
            'choose_seats' => $seat_number,
            'schedule_id' => $schedule_id,
            'coupon_id' => $coupon_id,
            'total_price' => $total,
        ]);

    }
}
