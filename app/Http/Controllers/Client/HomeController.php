<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function index (){
        $hotel = \App\Models\Hotel::orderBy('district_id')->get();
        return view('client.pages.home.index',[
            'hotel'=>$hotel,
        ]);
    }
    public function about(){
        return view ('client.pages.home.about');
    }
}


