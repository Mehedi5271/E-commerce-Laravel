<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    function about(){
        return view('about');
    }

    function hello(){
        return view('mehedi');
    }

    function info(){
       $alluser =  User::all();

        return view('user',['users'=> $alluser]);
    }
}
