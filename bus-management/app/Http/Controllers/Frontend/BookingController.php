<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Coupon;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;
use DB;


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
        // Check coupon exist
        if(Coupon::where('coupon_code', $coupon_code)->exists())
        {
            $coupon = Coupon::where('coupon_code', $coupon_code)->first();
            $schedule_id = $request->input('schedule_id');
            $schedule = Schedule::where('id',$schedule_id)->get();
            // Valid time coupon
            if($coupon->valid_from <= Carbon::today()->format('Y/m/d') && Carbon::today()->format('Y/m/d') <= $coupon->valid_until)
            {
                
            }
            else
            {
                return response()->json([
                    'status'=>'Coupon code has been expired',
                    'error_status'=> 'error'
                ]);
            }
        }
        else
        {
            return response()->json([
                'status'=>'Coupon Code does not exist',
                'error_status'=> 'error'
            ]);
        }
    }
}
