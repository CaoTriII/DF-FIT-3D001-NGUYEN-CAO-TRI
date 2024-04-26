<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Room;
use Illuminate\Support\Facades\Session;
class RoomDetailController extends Controller
{
    public function roomlist ()
    {
        $room = Room::orderBy('id')->get();
        return view('client.pages.room.roomlist',[
            'room'=>$room
        ]);
    }
    public function roomdetail($id)
    {
        $checkinDate = session('checkin_date');
        $checkoutDate = session('checkout_date');
        $roomdetail = Room::with('room_image')->findOrFail($id);

        return view('client.pages.room.roomdetail', [
            'roomdetail' => $roomdetail,
            'id' => $id,
            'checkinDate' => $checkinDate,
            'checkoutDate' => $checkoutDate,
        ]);
    }
}
