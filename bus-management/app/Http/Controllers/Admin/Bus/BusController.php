<?php

namespace App\Http\Controllers\Admin\Bus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\User;
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
                $ext = $imgBusfile->getClientOriginalExtension();  //Lấy tên file bao gồm extension ví dụ: .png, .jpg
                $filename = time().$count++.'.'.$ext;
                $imgBusfile->move($path, $filename);
                $finalImagePath = $path.$filename;
                $bus->image_bus = $finalImagePath;

            }
        }
        $bus->driver_id = $request->input('driver_id');
        $bus->save();

        return redirect()->back()->with('status', 'New Bus Created Successfully');
    }
}
