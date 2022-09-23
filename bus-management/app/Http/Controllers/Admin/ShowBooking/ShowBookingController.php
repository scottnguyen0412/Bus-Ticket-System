<?php

namespace App\Http\Controllers\Admin\ShowBooking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Schedule;
use Yajra\Datatables\Datatables;


class ShowBookingController extends Controller
{
    public function index()
    {
        return view('admin.booking.index');
    }
    public function getAllRowData(Request $request)
    {
        $booking = Booking::all();
        return Datatables::of($booking)
            ->editColumn('user_id', function($data){
                return $data->user->email;
            })
            ->editColumn('start_id', function($data) {
                $start_dest = Schedule::where('id', $data->schedule_id)->get();
                foreach($start_dest as $start)
                {
                    return $start->start_dest->name;
                }
            })
            ->editColumn('destination_id', function($data) {
                $destination = Schedule::where('id', $data->schedule_id)->get();
                foreach($destination as $dest)
                {
                    return $dest->destination->name;
                }
            })
            ->editColumn('booking_status', function($data) {
                if($data->booking_status == 0)
                {
                    return '
                            <a class="btn btn-info btn-sm rounded-pill" href="' .route("admin.booking.paid",$data->id).'"><i class="fas fa-check"></i></a>
                        ';
                }
                elseif($data->booking_status == 1)
                {
                    return '
                            <a class="btn btn-info btn-sm rounded-pill" href="' .route("admin.booking.notpay",$data->id).'"><i class="fas fa-times"></i></a>
                            
                        ';
                }
            })
            ->rawColumns(['booking_status'])
            ->setRowAttr([
                'data-row' => function ($data) {
                    return $data->id;
                }
            ])
            ->make(true);
    }

    public function updateNotPay($id)
    {
        $booking_notpaid = Booking::findOrFail($id);
            $booking_notpaid->booking_status = 0;
            $booking_notpaid->update();
            return redirect('/admin/show-booking')->with('status', 'Updated booking status successfully');
    }

    public function updatePaid($id)
    {
        $booking_paid = Booking::findOrFail($id);
            $booking_paid->booking_status = 1;
            $booking_paid->update();
            return redirect('/admin/show-booking')->with('status', 'Updated booking status successfully');
    }
}
