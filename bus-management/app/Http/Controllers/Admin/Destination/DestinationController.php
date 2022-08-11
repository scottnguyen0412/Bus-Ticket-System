<?php

namespace App\Http\Controllers\Admin\Destination;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// import model
use App\Models\Destination;
use Yajra\Datatables\Datatables;


class DestinationController extends Controller
{
    public function index()
    {
        return view('admin.map.destination.index');
    }

    public function create()
    {
        return view('admin.map.destination.create');
    }

    public function store(Request $request)
    {
        Destination::create([
            'name' => $request->name,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        return redirect()->route('admin.destination.index')->with('status', 'Destination Created Successfully');
        
    }

    // Display all data 
    public function getAllRowData()
    {
        $destination = Destination::all();
        return Datatables::of($destination)
            ->editColumn('name' , function($data) {
                return ' 
                    <a href="' . route('admin.destination.detail', $data->id) . '">' . $data->name . '</a>
                ';
            })
            ->editColumn('action', function($data) {
                return '
                    <a class="btn btn-warning btn-sm rounded-pill" href="'.route('admin.destination.edit', $data->id).'"><i class="fas fa-edit" title="Edit Destination"></i></a>
                ';
            })
            ->rawColumns(['action', 'name'])
            ->setRowAttr([
                'data-row' => function ($data) {
                    return $data->id;
                }
            ])
            ->make(true);
    }

    // Show detail with map
    public function detail($id)
    {   
        $destination = Destination::findOrFail($id);

        return view('admin.map.destination.detail', [
            'destination' => $destination
        ]);
    }

    public function edit($id)
    {
        $destination = Destination::findOrFail($id);
        return view('admin.map.destination.edit', compact('destination'));
    }

    public function update(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);
        $destination->update([
            'name' => $request->name,
            'address'=> $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect('/admin/destination')->with('status', 'Updated Location Successfully');
    }
}
