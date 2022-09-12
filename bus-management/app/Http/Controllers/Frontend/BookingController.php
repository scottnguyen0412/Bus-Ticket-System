<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class BookingController extends Controller
{
    public function index()
    {

    }

    public function booking(Request $request)
    {
        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->title = 'test1';
        $booking->seat_number = $request->input('choose_seats');
        $booking->booking_date = Carbon::now();
        $booking->ticket_amount = '20';
        $booking->schedule_id = $request->input('schedule_id');
        $booking->coupon_id = '1';
        $booking->save();

        return redirect('/schedules')->with('status', 'Your order successfully');
    }
}
