<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(){
        return view('auth.register');
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'address'=>'required',

            'hobbies'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'company'=>'required',

            'password'=>'required|confirmed',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = $request->password;

        $user->save();

        $userDetails = new UserDetails;

        $userDetails->user_id = $user->id;
        $userDetails->hobbies = $request->hobbies;
        $userDetails->phone = $request->phone;
        $userDetails->gender = $request->gender;
        $userDetails->company = $request->company;

        $userDetails->save();


        return back()->with('success', 'Your Details has been submitted, You can login now');

    }
}
