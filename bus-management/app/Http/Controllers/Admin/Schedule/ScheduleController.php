<?php

namespace App\Http\Controllers\Admin\Schedule;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Bus;
use App\Models\StartDestination;
use App\Models\Destination;
use DB;

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
                return $data->bus->bus_name;
            })
            ->editColumn('start_destination_id', function($data) {
                return $data->start_dest->name;
            })
            ->editColumn('destination_id', function($data) {
                return $data->destination->name;
            })
            ->editColumn('distance', function($data) {
                if($data->distance == '0')
                {
                    return '
                        Being calculated
                    ';
                }
                    
                else
                {
                    return '
                        '.$data->distance.' km
                    ';
                }
            })
            ->editColumn('estimated_arrival_time', function($data) {
                if($data->estimated_arrival_time == '0')
                {
                    return '
                        Being calculated
                    ';
                }
                else
                {
                    return '
                        '.$data->estimated_arrival_time.'
                    ';
                }
            })
            ->editColumn('action', function ($data) {
                return '
                    <a class="btn btn-info btn-sm rounded-pill" href="'.route("admin.shedule.detail",['id'=>$data->id]).'"><i class="fas fa-eye" title="See Schedule Detail"></i></a>
                    <a class="btn btn-warning btn-sm rounded-pill" href="'.route('admin.schedule.edit', $data->id).'"><i class="fas fa-edit" title="Edit Schedule"></i></a>

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
    public function create()
    {
        $bus = Bus::where('bus_status', '1')->get();
        return view('admin.schedule.create', [
            'bus' => $bus
        ]);
    }

    public function store(Request $request)
    {
        // get request input
        $search_start_destination = $request->start_destination_id;
        // search start destination
        $start_destination = DB::table('start_destination')->where("name", "LIKE", "%$search_start_destination%")->first();

        $search_destination = $request->destination_id;
        $destination = DB::table('destination')->where("name", "LIKE", "%$search_destination%")->first();
        $distance = '0';
        $estimate_time = '0';
        Schedule::create([
            'bus_id' => $request->bus_id,
            'start_at' => $request->start_at,
            'start_destination_id' => $start_destination->id,
            'destination_id' => $destination->id,
            'distance' => $distance,
            'estimated_arrival_time' => $estimate_time,
            'notes' => $request->notes,
        ]);

        return redirect('/admin/schedule')->with('status', 'Created Schdule Successfully');
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        // $start_destination = StartDestination::findOrFail($id);
        // $destination = Destination::findOrFail($id);
        $bus = Bus::where('bus_status', '1')->get();
        return view('admin.schedule.edit', [
            'schedule' => $schedule,
            'bus' => $bus
        ]);
    }
    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);
        // get request input
        $search_start_destination = $request['start_destination_id'];
        // search start destination
        $start_destination = DB::table('start_destination')->where("name", "LIKE", "%$search_start_destination%")->first();

        $search_destination = $request['destination_id'];
        $destination = DB::table('destination')->where("name", "LIKE", "%$search_destination%")->first();
        $schedule->update([
            "bus_id" => $request['bus_id'],
            'start_at' => $request['start_at'],
            'start_destination_id' => $start_destination->id,
            'destination_id' => $destination->id,
            'distance' => $request['distance'],
            'estimated_arrival_time' => $request['estimated_arrival_time'],
            'notes' => $request['notes'],
        ]);
        return redirect('/admin/schedule')->with('status', 'Updated Schedule Successfully');
    }

    // Search start destination
     public function searchStartDestinationByAjax()
    {
        $start_destination = StartDestination::select('name')->get();
        // Tạo mảng rỗng chứa start_destination
        $data = [];
        foreach ($start_destination as $items) {
            $data[] = $items['name'];
        }
        return $data;
    }

    // Search destination
    public function searchDestinationByAjax()
    {
        $destination = Destination::select('name')->get();
        $data = [];
        foreach ($destination as $items)
        {
            $data[] = $items['name'];
        }
        return $data;
    }

    public function details($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('admin.schedule.detail', [
            'schedule' => $schedule
        ]);
    }

}
