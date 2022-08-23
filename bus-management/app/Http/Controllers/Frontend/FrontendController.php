<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;

class FrontendController extends Controller
{
    public function index()
    {
        $schedule = Schedule::all();
        return view('frontend.index', compact('schedule'));
    }
}
