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
            $user = Auth::user();
            if ($user->level == 1 || $user->level == 2) {
                return redirect()->route('dashboard'); // Điều hướng đến trang admin dashboard
            } else {
                return redirect()->route('client.index'); // Điều hướng đến trang client index nếu không phải là admin hoặc owner
            }
        }

        return redirect('/');
    }

}
