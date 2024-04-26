<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserDetailController extends Controller
{
    public function userdetail($id) {

        return view('client.pages.user.userdetail');
    }
}
