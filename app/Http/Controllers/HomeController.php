<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){

        $users = User::with('user_details')->get();

        return view('home', compact('users'));
    }
    public function user_details_show(){
        return view('details');
    }
    public function user_details_store(Request $request){

        $request->validate([
            'hobbies'=>'required',
            'phone'=>'required',
            'gender'=>'required',
            'company'=>'required',
        ]);


        $userDetails = new UserDetails;

        $userDetails->id = $request->user_id;
        $userDetails->hobbies = $request->hobbies;
        $userDetails->phone = $request->phone;
        $userDetails->gender = $request->gender;
        $userDetails->company = $request->company;

        $userDetails->save();

        return back()->with('success', 'Your details has been saved');
    }
}