<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;
class DistrictController extends Controller
{
    public function district ()
    {
        $district = District::find('id')->get();
        return view('client.pages.hotel.hotelmain',[
            'district'=>$district

        ]);

    }
}
