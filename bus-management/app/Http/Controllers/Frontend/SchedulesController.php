<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Bus;
use App\Models\ImageBus;
use \stdClass;

class SchedulesController extends Controller
{
    public function index()
    {
        $all_schedules = Schedule::all();
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

}
