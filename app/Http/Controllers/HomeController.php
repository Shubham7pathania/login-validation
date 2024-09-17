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
}