<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showlogin() {
        if (Auth::check()){
            return redirect()->back();
        }
        return view('Auth.login');
    }
    public function login(LoginRequest $request) {
        $credentials = [
            'email' =>$request->email,
            'password'=>$request->password,
            'status' =>1
        ];
        if (Auth::attempt($credentials)) {
            return redirect()->route('client.index');
        }
        return redirect('/');
    }

}
