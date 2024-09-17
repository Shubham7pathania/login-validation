<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(){
        return view('auth.login');
    }

    public function login(Request $request){

        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        // ckeck if user esists

        $userExists = User::where('email', $request->email)->exists();

        if(!$userExists){
            return back()->withErrors(['email'=>'User Does not Exists']);
        }

        // Attempt to login

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){

            // Successful login
            $user = Auth::user();
            return redirect()->route('home');
        }else{
            // Unsuccessfull login
            return back()->withErrors(['email'=>'Invalid Credentials']);
        }

    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->flush();
        return redirect('/');


    }
}