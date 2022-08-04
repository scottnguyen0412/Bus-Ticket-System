<?php

namespace App\Http\Controllers\Admin\Bus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        return view('admin.bus.index');
    }
}
