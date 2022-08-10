<?php

namespace App\Http\Controllers\Admin\StartDestination;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StartDestination;
use Yajra\Datatables\Datatables;


class StartController extends Controller
{
    public function index(StartDestination $startdest)
    {
        return view('admin.map.startDestination.index');
    }

    public function getAllRowData()
    {
        $start_destination = StartDestination::all();
        return Datatables::of($start_destination)
            ->editColumn('action', function($data) {
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

    public function create()
    {
        return view('admin.map.startDestination.create');
    }

    public function store(Request $request)
    {
        StartDestination::create([
            'name' => $request->name,
            'address'  => $request->address,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);
        return redirect()->route('admin.startdestination.index');
    }
}
