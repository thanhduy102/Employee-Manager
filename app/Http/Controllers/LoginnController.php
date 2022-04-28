<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class LoginnController extends Controller
{
    function GetLogin(){
        return view('employees.login');
    }

    function PostLogin(LoginRequest $rq){
        $email=$rq->email;
        $password=$rq->password;

        if(Auth::attempt(['email' => $email, 'password' => $password]))
        {
            return redirect('admin');
        }
        else{
            return redirect()->back()->with("thongbao","Tài khoản hoặc mật khẩu không hợp lệ!")->withInput();
        }
    }
}
