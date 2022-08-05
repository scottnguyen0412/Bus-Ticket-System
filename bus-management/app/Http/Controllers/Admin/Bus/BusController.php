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
        ->editColumn('image_bus', function ($data) {
                if($data->image_bus)
                {
                    foreach(json_decode($data->image_bus) as $images) //Decode image_bus
                    {
                        // dd($images);
                        $img = '<img src="'.asset('admin/upload/img-bus/'.$images).'" width="40" height="40" class="rounded" align="center" alt=$images/>';
                        return $img;    
                    }
                }
            })
            ->editColumn('driver_id', function($data) {
                if($data->driver_id)
                {
                    return $data->users->name;
                }
            })
            ->editColumn('action', function ($data) {
                return '
                    
                ';
            })
            ->rawColumns(['image_bus', 'action'])
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

        // Check for loop up load image
        $count = 1;
        // Handle multiple image bus
        if($request->hasFile('image_bus'))
        {
            $path = 'admin/upload/img-bus/';
            foreach($request->file('image_bus') as $imgBusfile)
            {
                // $ext = $imgBusfile->getClientOriginalExtension();  //Lấy tên file bao gồm extension ví dụ: .png, .jpg
                // $filename = time().$count++.'.'.$ext;
                // $imgBusfile->move($path, $filename);
                // $finalImagePath = $path.$filename;
                // $bus->image_bus = $finalImagePath;
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
}
