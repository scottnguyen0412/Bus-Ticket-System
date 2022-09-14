<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Coupon;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
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
        $coupon = $request->input('coupon_code');
        $coupon_code = DB::table('coupons')->where('coupon_code', $coupon)->get();
        foreach($coupon_code as $coupons)
        {
                // Display value on view
                $coupon_id = Booking::where('coupon_id','=',$coupons->id)->first();
                $booking->coupon_id = $coupon_id;
        }
        $booking->save();

        return redirect('/schedules')->with('status', 'Your order successfully');
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
}
