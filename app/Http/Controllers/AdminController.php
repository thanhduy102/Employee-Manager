<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function Admin(){
        return view('employees.index');
    }
    function Logout(){
        Auth::logout();
        return redirect('/');
    }
}
