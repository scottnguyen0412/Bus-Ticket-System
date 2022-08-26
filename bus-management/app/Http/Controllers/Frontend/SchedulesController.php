<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Bus;
use App\Models\ImageBus;
use \stdClass;



use DB;

class SchedulesController extends Controller
{
    public function index(Request $request)
    {
        $all_schedules = Schedule::all();
        if(\Request::get('sort') == 'price_asc')
        {
            $all_schedules = Schedule::orderBy('price_schedules', 'asc')->get();
        }
        elseif(\Request::get('sort') == 'price_desc')
        {
            $all_schedules = Schedule::orderBy('price_schedules', 'desc')->get();
        }
        elseif(\Request::get('sort') == 'newest')
        {
            $all_schedules = Schedule::orderBy('created_at', 'desc')->get();
        }
        
        // Search by key
        $search_bus = $request->input('bus_name');
        // Check if have input request
        if($search_bus)
        {
            // Check name from input request have same name in table buses
            $bus = DB::table('buses')->where('bus_name','LIKE',"%{$search_bus}%")->get();
            foreach($bus as $bus_search)
            {
                // Display value on view
                $all_schedules = Schedule::where('bus_id', $bus_search->id)->get();
            }
        }

        $schedules = array();
        foreach($all_schedules as $schedule)
        {
            $item = new stdClass(); //Create new object store schedule
            $item->schedule = $schedule;
            $item->images_bus = ImageBus::where('bus_id', $schedule->bus_id )->pluck('image_bus')->toArray();
            array_push($schedules, $item);
        }
        return view('frontend.schedule', [
            'schedules'=> $schedules,
        ]);
    }

    // public function searchBusHouseByAjax()
    // {
    //     $bus = Bus::join('schdules', 'schdules.bus_id','buses.id')->first();
    //     $schedule = Schedule::where('bus_id', $bus)->select('bus_id')->get();
    //     $data = [];
    //     foreach ($schedule as $items)
    //     {
    //         $data[] = $items['price_schedules'];
    //     }
    //     dd($data);
    //     return $data;
    // }

}
