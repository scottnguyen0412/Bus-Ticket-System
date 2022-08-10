<?php

namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Yajra\Datatables\Datatables;


class ScheduleController extends Controller
{
    public function index()
    {
        return view('admin.schedule.index');
    }

    // Display all schedule
    public function getAllRowData(Request $request)
    {
        $schedule = Schedule::all();

        return Datatables::of($schedule)
            ->editColumn('bus_id', function ($data) {
                    return '
                        
                    ';
                })
            ->editColumn('action', function ($data) {
                return '

                ';
            })
            ->rawColumns(['action'])
            ->setRowAttr([
                'data-row' => function ($data) {
                    return $data->id;
                }
            ])
            ->make(true);
    }
}
