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
    //     $schedule = Schedule::select('price_schedules')->get();
    //     $data = [];
    //     foreach ($schedule as $items)
    //     {
    //         $data[] = $items['price_schedules'];
    //     }
    //     // dd($data);
    //     return $data;
    // }

    // public function searchBusHouse(Request $request)
    // {
    //     $search_bus = $request->bus_name;
    //     // $bus = Bus::where('bus_name', $search_bus)->first()->id;
    //     if ($search_bus != " ") {
    //         $schedule = Schedule::where("price_schedules", "LIKE", "%$search_bus%")->get();
    //         // dd($schedule);
    //         if ($schedule) {
    //             return redirect('/schedules');
    //         } else {
    //             return redirect()->back()->with("status", "No products matched your search");
    //         }
    //     } else {
    //         return redirect()->back();
    //     }
    // }

    // public function searchBusHouse(Request $request)
    // {
    //     $search_bus = $request->input('bus_name');
    //     $schedule = Schedule::where("price_schedules", "LIKE", "%$search_bus%")->get();
    //     return view('frontend.schedule')->with('schedule',$schedule );
    // }

}
