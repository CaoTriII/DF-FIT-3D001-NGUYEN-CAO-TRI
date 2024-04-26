<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Hotel\StoreRequest;
use App\Http\Requests\Admin\Hotel\UpdateRequest;
use App\Models\Hotel;
use App\Models\User;
use DB;
use App\Models\Room;
use App\Models\District;
use App\Models\HotelRating;
use App\Models\BookingModel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class HotelController extends Controller
{
    public function index(Request $request)
    {

        $user_level = Auth::user()->level;
        if($user_level == 1 || $user_level == 3){
            $hotel = Hotel::get();
        }
        else{
            $user_id = Auth::user()->id;
            $hotel = Hotel::where('user_id',$user_id)->orderBy('created_at','DESC')->paginate();
        }
        return view ('admin.modules.hotel.index',[
            'hotel' =>$hotel,
        ]);
    }
    public function create()
    {
        $district = District::get();
        $hotelrating = HotelRating::get();
        return view ('admin.modules.hotel.create',[
            'district'=>$district,
            'hotelrating'=>$hotelrating
        ]);
    }
    public function store(StoreRequest $request)
    {
        $hotel = new Hotel();
        $file = $request->image;
        $fileName = time() . '-' . $file->getClientOriginalName();
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->status = $request->status;
        $hotel->room_quantity = $request->room_quantity;
        $hotel->description = $request->description;
        $hotel->service = $request->service;
        $hotel->star_number = $request->star_number;
        $hotel->district_id = $request->district_id;
        $hotel->user_id = Auth::user()->id;
        $hotel->image = $fileName;
        $hotel->save();
        $file->move(public_path('uploads/'), $fileName);
        return redirect()->route('admin.hotel.index')->with('success','Upload hotel successfully');
    }
    public function show(string $id)
    {
    }
    public function edit(int $id)
    {
        $district = District::get();
        $hotelrating = HotelRating::get();
        $hotel = Hotel::find($id);
        if ($hotel == null){
            abort(404);
        }
        return view ('admin.modules.hotel.edit',[
            'id'=>$id,
            'hotel'=>$hotel,
            'hotelrating'=>$hotelrating,
            'district'=>$district
        ]);
    }
    public function update(UpdateRequest $request, int $id)
    {
        $hotel =  Hotel::find($id);
        if($hotel == null){
            abort(404);
        }
        $file = $request->image;
        if(!empty($file)){
            $request ->validate([
                'image'=> 'required|mimes:jpg,bmp,png,jpeg',
            ],[
                'image.required'=>'Please enter hotel image',
                'image.mimes'=>'Image must be jpg,bmp,png,jpeg'
            ]);
            $old_image_path = public_path('uploads/' . $hotel->image);
            if(file_exists($old_image_path)){
                unlink($old_image_path);
            }
            $fileName = time() . '-' . $file->getClientOriginalName();
            $hotel->image = $fileName;
            $file->move(public_path('uploads/'), $fileName);
        }
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->status = $request->status;
        $hotel->room_quantity = $request->room_quantity;
        $hotel->description = $request->description;
        $hotel->service = $request->service;
        $hotel->star_number = $request->star_number;
        $hotel->district_id = $request->district_id;
        $hotel->save();
        return redirect()->route('admin.hotel.index')->with('success','Upload hotel successfully');
    }
    public function destroy(int $id)
    {
        $hotel  = Hotel::find($id);
            if($hotel == null) {
                abort(404);
            }
            $old_image_path = public_path('uploads/'.$hotel->image);
            if(file_exists($old_image_path)){
                unlink($old_image_path);
            }
        $hotel ->delete();
        return redirect()->route('admin.hotel.index')->with('success','Hotel delete successfully');
    }
    public function roomdetails($id)
    {

        $room = Room::where('hotel_id',$id)->get();

        return view('admin.modules.room.roomdetail',[
            'room' =>$room,
        ]);
    }

    public function showHotelOrders($id)
    {
        $user = Auth::user();
        $hotelOrders = BookingModel::whereHas('room', function ($query) use ($id) {
            $query->where('hotel_id', $id);
            })->with(['room.hotel', 'booking.bookingDetails'])->get();
        return view('admin.modules.hotel.orderdetail', ['hotelOrders' => $hotelOrders]);
    }
    public function hotelList($user_id)
    {
        $user = User::findOrFail($user_id);
        $hotels = $user->hotels;
        \Log::info('User: ' . $user->toJson());
        \Log::info('Hotels: ' . $hotels->toJson());
        return view('admin.modules.hotel.hotelList', compact('user', 'hotels'));
    }
    public function orderList($user_id)
{
    $user = User::findOrFail($user_id);
    $orders = $user->orders;

    return view('admin.modules.hotel.orderList', compact('user', 'orders'));
    }
    public function todayBooking($id)
    {
        $user = Auth::user();
        $ordersByHotel = [];
        $todayOrdersByHotelDetails = [];

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
                        'hotel_name' => $order->hotel_name, // Thêm thông tin tên khách sạn
                    ];
                }
                $ordersByHotel[$hotelId]['total']++;
                $ordersByHotel[$hotelId]['orders'][] = $order;
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
        foreach ($todayResult as $order) {
            $hotelId = $order->hotel_id;
            if (!isset($todayOrdersByHotelDetails[$hotelId])) {
                $todayOrdersByHotelDetails[$hotelId] = [
                    'total' => 0,
                    'orders' => [],
                    'hotel_name' => $order->hotel_name,
                ];
            }
            $todayOrdersByHotelDetails[$hotelId]['total']++;
            $todayOrdersByHotelDetails[$hotelId]['orders'][] = $order;
        }
        return view('admin.modules.hotel.Todayorderlist', [
            'todayOrdersByHotelDetails' => $todayOrdersByHotelDetails,
            'ordersByHotel' => $ordersByHotel,
        ]);
    }

}
