<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use App\Models\User;
use App\Models\Role;
use File;



class AccountController extends Controller
{
    public function index()
    {

        return view('admin.account.index',
            [
                'roles' => Role::all(),
            ]);
    }

    public function getAllRowData(Request $request)
    {
        $users = User::all();
        return Datatables::of($users)
            ->editColumn('role', function ($user) {
                return $user->role->name;
            })
            ->editColumn('avatar', function ($data) {
                $assetAvatar = asset('admin/upload/img/'.$data->avatar);
                return '<img src="'.$assetAvatar.'" width="40" height="40" class=" rounded-circle" align="center" />';
            })
            ->editColumn('action', function ($data) {
                return '
                    <a class="btn btn-warning btn-sm rounded-pill" href=""><i class="fas fa-edit" title="Edit Account"></i></a>
                ';
            })
            ->rawColumns(['avatar', 'action'])
            ->setRowAttr([
                'data-row' => function ($data) {
                    return $data->id;
                }
            ])
            ->make(true);
    }

    public function create(AccountRequest $request)
    {
        $user = new User;
        // Xử lí upload image
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension(); //Lấy tên file bao gồm extension ví dụ: .png, .jpg
            $filename = time().'.'.$ext;
            $file->move('admin/upload/img/',$filename);
            $user->avatar = $filename;
        }
        // Send Password by email
        $password = $this->autoRandomString(20);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender'); 
        $user->date_of_birth = $request->input('date_of_birth');
        $user->address = $request->input('address');
        $user->phone_number = $request->input('phone_number');
        $user->password = Hash::make($password);
        $user->role_id = $request->input('role_id');
        // dd($user);
        $user->save();
        return redirect()->back()->with('status','Created Account Succesfully');
    }

    // Random string
    private function autoRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
