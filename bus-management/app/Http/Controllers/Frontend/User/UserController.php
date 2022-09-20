<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Models\User;
use DB;

class UserController extends Controller
{
    public function changePassword()
    {
        return view('frontend.accountUser.changePassword');
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        // Check user want change password
        $user = Auth::user();
        // Check password in DB have the same with old_password user input
        if(!(Hash::check($request['old_password'], $user->password))) {
            return redirect()->back()->with('warning','The password currently used does not matches with the provided password.');
        }       
        //Sring compare: Old password and the new one
        if(strcmp($request['old_password'], $request['new_password']) == 0){
            return redirect()->back()->with('warning','The new password cannot be the same with current password.');
        }
        //bcrypt --> password-hashing function
        $user->password = bcrypt($request['new_password']);
        DB::table('users')->where('id', $user->id)->update(['password' => $user->password]);
        return redirect('/')->with('success','Password changed successfully !');
    }
}
