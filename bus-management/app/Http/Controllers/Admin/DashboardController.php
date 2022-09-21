<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $bus = DB::table('buses')->count();
        $user = User::where('role_id', '2')->count();
        $total_price_monthly = Booking::where('booking_status', '1')->sum('total_price');
        $schedule = DB::table('schdules')->count();
        $star_destination = DB::table('start_destination')->count();
        $destination = DB::table('destination')->count();
        $coupon = DB::table('coupons')->count();
        $booking = Booking::where('booking_status', '1')->count();
        return view('admin.dashboard', [
            'bus' => $bus,
            'user' => $user,
            'total_price_monthly' => $total_price_monthly,
            'schedule' =>  $schedule,
            'start_destination' => $star_destination,
            'destination' => $destination,
            'coupon' => $coupon,
            'booking' => $booking
        ]);
    }
}
