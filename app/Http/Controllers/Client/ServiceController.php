<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Service;

class ServiceController extends Controller
{
    public function service() {
        $service = Service::orderBy('id')->get();
        return view ('client.pages.service.service', [
            'service'=>$service
        ]);
    }
}
