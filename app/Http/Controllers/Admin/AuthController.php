<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin(){
        return view('admin.auth.login');
    }
    public function login(){
        // return request()->all();
        $creditial = request()->only('email', 'password');
        $checkAuth = auth()->guard('admin')->attempt($creditial);
        if($checkAuth){
            return redirect('/admin');
        }
        return 'wrong email and password';
    }

    public function logout(){
        auth()->guard('admin')->logout();
        return redirect('/admin/login');
    }
}
