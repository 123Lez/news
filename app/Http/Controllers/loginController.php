<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    //
    public function login()
    {
        if(Auth::check())
        {
            return redirect('home')->session()->put('success','You have successfully logged in');
        }
    }
}
