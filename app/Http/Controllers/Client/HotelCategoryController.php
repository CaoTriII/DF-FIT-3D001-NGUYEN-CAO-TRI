<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Hotel;
use \App\Models\Room;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
class HotelCategoryController extends Controller
{
    public function hotel ()
    {
        $hotel = Hotel::orderBy('id')->get();

        return view('client.pages.hotel.hotelmain',[
             'hotel'=>$hotel
        ]);
    }
    public function detail ($id)
    {
        $hoteldetail = Hotel::where('id', $id)->get();
        $districtId = session('districts');
        $checkinDate = session('checkin_date');
        $checkoutDate = session('checkout_date');
        $adultNumber = session('adult_number');
        $roomnumber = session('roomnumber');
        $room = Room::where('hotel_id', $id)
        ->where('room_quantity', '>=', ceil($adultNumber / 2))
        ->get();
        $hotelrelated = DB::table('hotel')
            ->where('district_id', $districtId)
            ->whereNotIn('id', [$id])
            ->whereNotExists(function ($query) use ($checkinDate, $checkoutDate) {
                $query->select(DB::raw(1))
                    ->from('bookingdetail')
                    ->join('room', 'bookingdetail.room_id', '=', 'room.id')
                    ->where('room.hotel_id', '=', DB::raw('hotel.id'))
                    ->where(function ($dateQuery) use ($checkinDate, $checkoutDate) {
                        $dateQuery->where('check_in', '<', $checkoutDate)
                            ->where('check_out', '>', $checkinDate);
                    });
            })->get();
        return view('client.pages.hotel.hoteldetail',[
            'hoteldetail'=>$hoteldetail,
             'room'=>$room,
             'hotelrelated'=>$hotelrelated,
             'noOtherHotelsAvailable' => $hotelrelated->isEmpty(),

        ]);
    }


}
