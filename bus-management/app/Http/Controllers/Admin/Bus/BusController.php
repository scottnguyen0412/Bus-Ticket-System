<?php

namespace App\Http\Controllers\Admin\Bus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\User;
use Yajra\Datatables\Datatables;
use File;

class BusController extends Controller
{
    public function index()
    {
        // Get user with role driver
        $user = User::where('role_id', '3')->get();

        return view('admin.bus.index',[
            'user' => $user,
        ]);
    }

    // Display all bus
    public function getAllRowData(Request $request)
    {
        $bus = Bus::all();
        return Datatables::of($bus)
        ->editColumn('images', function ($data) {
                return '
                    <a class="btn btn-primary btn-sm rounded-pill" href="'.route('admin.account.viewImage',$data->id).'"><i class="fas fa-eye" title="See the image bus"> View Image of Bus</i></a>
                ';
            })
            ->editColumn('driver_id', function($data) {
                if($data->driver_id)
                {
                    return $data->users->name;
                }
            })
            ->editColumn('bus_status', function($data){
                $show = 1;
                $not_show = 0;
                if($data->bus_status == $not_show)
                {
                    return 'Not Shown';
                }
                else if($data->bus_status == $show)
                {
                    return 'Shown';
                }

            })
            ->editColumn('action', function ($data) {
                return '
                    <a class="btn btn-warning btn-sm rounded-pill" href="'.route('admin.bus.edit',$data->id).'"><i class="fas fa-edit" title="Edit Bus"></i></a>
                ';
            })
            ->rawColumns(['images', 'action'])
            ->setRowAttr([
                'data-row' => function ($data) {
                    return $data->id;
                }
            ])
            ->make(true);

    }

    public function create(Request $request)
    {
        $bus = new Bus;
        $bus->bus_name = $request->input('bus_name');
        $bus->bus_number = $request->input('bus_number');
        $bus->bus_status = $request->input('bus_status') == TRUE?'1':'0'; 
        $bus->number_of_seats = $request->input('number_of_seats');
        // Handle multiple image bus
        if($request->hasFile('image_bus'))
        {
            $path = 'admin/upload/img-bus/';
            foreach($request->file('image_bus') as $imgBusfile)
            {
                $name = $imgBusfile->getClientOriginalName();
                $imgBusfile->move('admin/upload/img-bus/', $name);  
                $data[] = $name;  
                $bus->image_bus = json_encode($data); //Convert array $data to string
            }
        }
        $bus->driver_id = $request->input('driver_id');
        $bus->save();

        return redirect()->back()->with('status', 'New Bus Created Successfully');
    }

    // View Image Bus
    public function showImage($id)
    {
        $bus = Bus::findOrFail($id);
        if(!$bus)
        {
            abort(404);
        }
        $image = $bus->image_bus;
        return view('admin.bus.viewImageBus', compact('bus', 'image'));
    }

    public function edit($id)
    {
        $bus = Bus::findOrfail($id);
        if(!$bus)
        {
            abort(404);
        }
        $driver_id = User::where('role_id', '3')->get();
        return view('admin.bus.edit', compact('bus', 'driver_id'));
    }

    public function update(Request $request, $id)
    {
        $bus = Bus::findOrFail($id);

        // Handle image
        if($request->hasFile('image_bus'))
        {
            $path = 'admin/upload/img-bus/';
            foreach($request->file('image_bus') as $imgBusfile)
            {
                $name = $imgBusfile->getClientOriginalName(); //get tên ảnh
                $imgBusfile->move($path,$name);  
                $data[] = $name;  
                $bus->image_bus = json_encode($data); //Convert array $data to string
            }
        }
        $bus->bus_name = $request->input('bus_name');
        $bus->bus_number = $request->input('bus_number');
        $bus->bus_status = $request->input('bus_status') == TRUE ?'1':'0';
        $bus->number_of_seats = $request->input('number_of_seats');
        $bus->driver_id = $request->input('driver_id');
        $bus->update();
        return redirect('/admin/bus')->with('status', 'Updated Bus Successfully');
    }

    // public function deleteImage($bus_image_id)
    // {
    //     $bus = Bus::all();
    //     $bus
    // }
}
