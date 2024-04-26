<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use  App\Models\BookingModel;
use Illuminate\Support\Facades\Log;
use  App\Models\Room;
use  App\Models\Hotel;
use  App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
class DasBoardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $totalOrderCount = 0;
        $ordersByHotel = [];
        $result = [];

        if ($user->level != 1) {
            $result = DB::table('bookingdetail')
                ->join('room', 'bookingdetail.room_id', '=', 'room.id')
                ->join('hotel', 'room.hotel_id', '=', 'hotel.id')
                ->join('users', 'hotel.user_id', '=', 'users.id')
                ->where('users.id', '=', $user->id)
                ->select('bookingdetail.*', 'room.*', 'hotel.*', 'users.*')
                ->get();
            foreach ($result as $order) {
                $hotelId = $order->hotel_id;
                if (!isset($ordersByHotel[$hotelId])) {
                    $ordersByHotel[$hotelId] = ['total' => 0, 'orders' => []];
                }
                $ordersByHotel[$hotelId]['total']++;
                $ordersByHotel[$hotelId]['orders'][] = $order;
                $totalOrderCount++;
            }
        } else {
            $result = DB::table('bookingdetail')
                ->join('room', 'bookingdetail.room_id', '=', 'room.id')
                ->join('hotel', 'room.hotel_id', '=', 'hotel.id')
                ->select('bookingdetail.*', 'room.*', 'hotel.*')
                ->get();
            foreach ($result as $order) {
                $hotelId = $order->hotel_id;
                if (!isset($ordersByHotel[$hotelId])) {
                    $ordersByHotel[$hotelId] = ['total' => 0, 'orders' => []];
                }
                $ordersByHotel[$hotelId]['total']++;
                $ordersByHotel[$hotelId]['orders'][] = $order;
                $totalOrderCount++;
            }
        }
        $bookingData = collect($result)->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->toDateString();
        })->map(function ($group, $date) {
            return ['date' => $date, 'totalBookings' => count($group)];
        })->values()->toArray();
        $todayResult = DB::table('bookingdetail')
            ->join('room', 'bookingdetail.room_id', '=', 'room.id')
            ->join('hotel', 'room.hotel_id', '=', 'hotel.id')
            ->join('users', 'hotel.user_id', '=', 'users.id')
            ->where('users.id', '=', $user->id)
            ->whereDate('bookingdetail.created_at', Carbon::today())
            ->select('bookingdetail.*', 'room.*', 'hotel.*', 'users.*')
            ->get();
        $todayTotalOrderCount = 0;
        $todayOrdersByHotelTotal = [];
        $todayOrdersByHotelDetails = [];
        foreach ($todayResult as $order) {
            $hotelId = $order->hotel_id;

            if (!isset($todayOrdersByHotelTotal[$hotelId])) {
                $todayOrdersByHotelTotal[$hotelId] = 0;
            }
            $todayOrdersByHotelTotal[$hotelId]++;
            $todayOrdersByHotelDetails[$hotelId][] = $order;
            $todayTotalOrderCount++;
        }
        $bookingstatus = DB::table('booking')
        ->select('status', DB::raw('COUNT(*) as total_booking'))
        ->groupBy('status')
        ->get();
        $result=[];
        $result[]= ['Status','Total'];
        foreach($bookingstatus as $item){
            $result []= [ucfirst($item ->status),($item->total_booking)];
        }
        return view('admin.modules.DashBoard.dashboard', [
            'totalOrderCount' => $totalOrderCount,
            'ordersByHotel' => $ordersByHotel,
            'todayTotalOrderCount' => $todayTotalOrderCount,
            'todayOrdersByHotelTotal' => $todayOrdersByHotelTotal,
            'todayOrdersByHotelDetails' => $todayOrdersByHotelDetails,
            'bookingData' => $bookingData,
            'result'=>$result
        ]);
    }
    public function dashboardBooking(Request $request)
    {
        $user = Auth::user();
        $totalOrderCount = 0;
        $ordersByHotel = [];
        $result = [];
        if ($user->level != 1) {
            $result = DB::table('bookingdetail')
                ->join('room', 'bookingdetail.room_id', '=', 'room.id')
                ->join('hotel', 'room.hotel_id', '=', 'hotel.id')
                ->join('users', 'hotel.user_id', '=', 'users.id')
                ->where('users.id', '=', $user->id)
                ->select('bookingdetail.*', 'room.*', 'hotel.*', 'users.*')
                ->get();
            foreach ($result as $order) {
                $hotelId = $order->hotel_id;
                if (!isset($ordersByHotel[$hotelId])) {
                    $ordersByHotel[$hotelId] = ['total' => 0, 'orders' => []];
                }
                $ordersByHotel[$hotelId]['total']++;
                $ordersByHotel[$hotelId]['orders'][] = $order;
                $totalOrderCount++;
            }
        } else {
            $result = DB::table('bookingdetail')
                ->join('room', 'bookingdetail.room_id', '=', 'room.id')
                ->join('hotel', 'room.hotel_id', '=', 'hotel.id')
                ->select('bookingdetail.*', 'room.*', 'hotel.*')
                ->get();
            foreach ($result as $order) {
                $hotelId = $order->hotel_id;
                if (!isset($ordersByHotel[$hotelId])) {
                    $ordersByHotel[$hotelId] = ['total' => 0, 'orders' => []];
                }
                $ordersByHotel[$hotelId]['total']++;
                $ordersByHotel[$hotelId]['orders'][] = $order;
                $totalOrderCount++;
            }
        }
        $bookingData = collect($result)->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->toDateString();
        })->map(function ($group, $date) {
            return ['date' => $date, 'totalBookings' => count($group)];
        })->values()->toArray();
        $todayResult = DB::table('bookingdetail')
            ->join('room', 'bookingdetail.room_id', '=', 'room.id')
            ->join('hotel', 'room.hotel_id', '=', 'hotel.id')
            ->join('users', 'hotel.user_id', '=', 'users.id')
            ->where('users.id', '=', $user->id)
            ->whereDate('bookingdetail.created_at', Carbon::today())
            ->select('bookingdetail.*', 'room.*', 'hotel.*', 'users.*')
            ->get();
        $todayTotalOrderCount = 0;
        $todayOrdersByHotelTotal = [];
        $todayOrdersByHotelDetails = [];
        foreach ($todayResult as $order) {
            $hotelId = $order->hotel_id;

            if (!isset($todayOrdersByHotelTotal[$hotelId])) {
                $todayOrdersByHotelTotal[$hotelId] = 0;
            }
            $todayOrdersByHotelTotal[$hotelId]++;
            $todayOrdersByHotelDetails[$hotelId][] = $order;
            $todayTotalOrderCount++;
        }
        return view('admin.modules.DashBoard.dashboardBooking', [
            'todayOrdersByHotelDetails' => $todayOrdersByHotelDetails,
            'ordersByHotel' => $ordersByHotel,
            'totalOrderCount' => $totalOrderCount,
            'todayTotalOrderCount' => $todayTotalOrderCount,
        ]);
}
public function todayBooking()
{
    $user = Auth::user();
    $totalOrderCount = 0;
    $ordersByHotel = [];
    $selectColumns = [
        'bookingdetail.*',
        'room.id as room_id',
        'room.name as room_name',
        'hotel.id as hotel_id',
        'hotel.name as hotel_name',
        'users.id as user_id',
        'users.full_name as user_name',
    ];
    if ($user->level == 1) {
        $result = DB::table('bookingdetail')
            ->join('room', 'bookingdetail.room_id', '=', 'room.id')
            ->join('hotel', 'room.hotel_id', '=', 'hotel.id')
            ->join('users', 'hotel.user_id', '=', 'users.id')
            ->select($selectColumns)
            ->get();
        } else {
        $result = DB::table('bookingdetail')
            ->join('room', 'bookingdetail.room_id', '=', 'room.id')
            ->join('hotel', 'room.hotel_id', '=', 'hotel.id')
            ->join('users', 'hotel.user_id', '=', 'users.id')
            ->where('users.id', '=', $user->id)
            ->select($selectColumns)
            ->get();
        foreach ($result as $order) {
            $hotelId = $order->hotel_id;
            if (!isset($ordersByHotel[$hotelId])) {
                $ordersByHotel[$hotelId] = [
                    'total' => 0,
                    'orders' => [],
                    ];
                }
                $ordersByHotel[$hotelId]['total']++;
                $ordersByHotel[$hotelId]['orders'][] = $order;
                $totalOrderCount++;
            }
    }
    $todayResult = DB::table('bookingdetail')
        ->join('room', 'bookingdetail.room_id', '=', 'room.id')
        ->join('hotel', 'room.hotel_id', '=', 'hotel.id')
        ->join('users', 'hotel.user_id', '=', 'users.id')
        ->where('users.id', '=', $user->id)
        ->whereDate('bookingdetail.created_at', Carbon::today())
        ->select($selectColumns)
        ->get();
    $todayTotalOrderCount = 0;
    $todayOrdersByHotelTotal = [];
    $todayOrdersByHotelDetails = [];
    foreach ($todayResult as $order) {
        $hotelId = $order->hotel_id;
        if (!isset($todayOrdersByHotelTotal[$hotelId])) {
            $todayOrdersByHotelTotal[$hotelId] = 0;
            }
        $todayOrdersByHotelTotal[$hotelId]++;
        $todayOrdersByHotelDetails[$hotelId][] = $order;
        $todayTotalOrderCount++;
    }
    return view('admin.modules.DashBoard.todayBooking', [
        'todayOrdersByHotelDetails' => $todayOrdersByHotelDetails,
        'ordersByHotel' => $ordersByHotel,
        'totalOrderCount' => $totalOrderCount,
        'todayTotalOrderCount' => $todayTotalOrderCount,
    ]);
}
public function showCheckInStatus()
{
    $user = Auth::user();
    $bookingModel = new BookingModel;
    $hotelOrders = $bookingModel->whereHas('room.hotel', function ($query) use ($user) {
        $query->where('user_id', $user->id);
        })->with(['room.hotel', 'booking.bookingDetails'])->get();
    $today = now()->toDateString();
    $todayArrivals = [];
    foreach ($hotelOrders as $order) {
        $checkInDate = $order->check_in;
        $status = $order->booking->status;
        if ($checkInDate == $today && $status == 1) {
            $todayArrivals[] = $order;
            }
        }
    return view('admin.modules.DashBoard.hotelstatus', [
        'todayArrivals' => $todayArrivals,
    ]);
}
public function checkInAction($orderId)
{
    $order = BookingModel::find($orderId);
    if (!$order) {
        return redirect()->route('error')->with('error', 'Order not found');
        }
    $bookingDetails = $order->booking->bookingDetails->first();
    if (!$bookingDetails) {
        return redirect()->route('error')->with('error', 'Booking details not found');
        }
    $bookingDetails->booking->status = 2;
    $bookingDetails->booking->save();
    return redirect()->route('showCheckInStatus');
}
public function showCheckedStatus ()
{
    $user = Auth::user();
    $bookingModel = new BookingModel;
    $hotelOrders = $bookingModel->whereHas('room.hotel', function ($query) use ($user) {
        $query->where('user_id', $user->id);
    })->with(['room.hotel', 'booking.bookingDetails'])->get();
    $today = now()->toDateString();
    $todayArrivals = [];
    foreach ($hotelOrders as $order) {
        $checkInDate = $order->check_in;
        $status = $order->booking->status;
        if ($checkInDate == $today && $status == 2) {
            $todayArrivals[] = $order;
        }
    }
    return view('admin.modules.DashBoard.hotelchecked', [
        'todayArrivals' => $todayArrivals,
    ]);
  }

}




