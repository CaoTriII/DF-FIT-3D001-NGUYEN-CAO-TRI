<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use \App\Models\Hotel;
class AjaxController extends Controller
{

    public function viewfilter() {
        $district = DB::table('district')->get();
        return view ('filter',[
            'district'=>$district
        ]);
    }
    public function processfilter(Request $request) {
        $district = $request-> district;
        $rating = $request-> rating;

        $result = DB::table('hotel')
            ->where('star_number',$rating)
            ->where('district_id', $district)
            ->get();
        return response([
                'status' => 'success',
                'result' => $result
            ],200);
    }
    public function hotelresult(Request $request)
{
    $district = $request->district;
    $roomnumber = $request->roomnumber;
    $checkinDate = $request->checkinDate;
    $checkoutDate = $request->checkoutDate;
    $adultNumber = $request->adult_number;
    session(['districts' => $district, 'checkin_date' => $checkinDate, 'checkout_date' => $checkoutDate]);


    $existingBookings = DB::table('bookingdetail')
    ->where('check_in', '<', $checkoutDate)
    ->where('check_out', '>', $checkinDate)
    ->get();


$roomnumber = ceil($adultNumber / 2);
session(['adult_number' => $adultNumber, 'roomnumber' => $roomnumber]);

$result = DB::table('hotel')
    ->where('district_id', $district)
    ->where('room_quantity', '>=', $roomnumber)
    ->get();
if (!$result->isEmpty() && $existingBookings->isNotEmpty()) {
    $duplicateHotels = $existingBookings->pluck('hotel_id')->unique()->toArray();
    $result = $result->reject(function ($item) use ($duplicateHotels) {
        return in_array($item->id, $duplicateHotels);
    });
    if ($result->isNotEmpty()) {
        return response([
            'status' => 'success',
            'result' => $result,
        ], 200);
    } else {
        return response([
            'status' => 'error',
            'message' => 'Room unavailable or dates overlap',
        ], 200);
    }
    } else {
        return response([
            'status' => 'success',
            'result' => $result,
        ], 200);
    }
}
public function notification()
{
    return view('admin.modules.notification.notification');
}
public function increaseRoomQuantity()
{
    $completedBookings = DB::table('bookingdetail')
        ->where('check_out', '<', now())
        ->where('completed', true)
        ->get();

    foreach ($completedBookings as $booking) {
        $room = Room::find($booking->room_id);
        $quantity = $booking->quantity;
        $room->room_quantity += $quantity;
        $room->save();
        $hotel = $room->hotel;
        if ($hotel) {
            $hotel->room_quantity += $quantity;
            $hotel->save();
        }
    }
    return response()->json(['message' => 'Room quantities increased successfully']);
}

}


