<?php
namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\BookingModel;
use  App\Models\Room;
use  App\Models\Hotel;
use  App\Models\BookingUSer;
use App\Models\User;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;
use DB;
use DateTime;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Events\NewOrderNotificationEvent;
class CartController extends Controller
{
    public function booking()
    {
        $cartCollection = Cart::getContent();
        return view ('client.pages.cart.checkout',[
            'cartCollection' => $cartCollection,
        ]);
    }
    public function addbooking(Request $request,$id,$quantity)
    {
        $room = Room::find($id);
        $roomQuantity = session('roomnumber');
        if (Cart::isEmpty()){
            $cart =  Cart::add(array(
                'id' =>$room->id,
                'name'=>$room->name,
                'price'=>$room->price,
                'quantity'=>$roomQuantity,
                'attributes'=>array(
                    'image'=> $room->image,
                    'check_in'=>session('checkin_date'),
                    'check_out'=>session('checkout_date'),
                    'adult_number' => session('adult_number'),
                    'room_number' => session('roomnumber', 1),
                )
            ));
        }else {
            Cart::clear();
            $cart =  Cart::add(array(
                'id' =>$room->id,
                'name'=>$room->name,
                'price'=>$room->price,
                'quantity'=>$roomQuantity,
                'attributes'=>array(
                    'image'=> $room->image,
                    'check_in'=>session('checkin_date'),
                    'check_out'=>session('checkout_date'),
                    'adult_number' => session('adult_number'),
                    'room_number' => session('roomnumber', 1),
                )
            ));
        }

        return redirect()->route('client.checkoutPost',['cart'=>$cart]);
    }
    public function updatebooking(Request $request)
    {
        $id  = $request->id;
        $quantity = $request->quantity;
        Cart::update($id,array(
            'quantity' => array(
                'relative' => false,
                'value' => $quantity
            ),
        ));
        return response()->json([
            'status'=>200
        ]);
    }
    public function checkout()
    {
        return view('client.pages.cart.checkout');
    }
    public function generateBookingCode()
    {
    return 'BK' . time() . mt_rand(1000, 9999);
    }
    public function checkoutPost(Request $request)
    {
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'committion 5%',
            'type' => 'committion',
            'target' => 'total',
            'value' => '5%',
            'attributes' => array(
                'description' => 'Value added committion',
                'more_data' => 'more data here'
            )
        ));
        $bookingCode = $this->generateBookingCode();
        session(['bookingCode' => $bookingCode]);
        Cart::condition($condition);
        $cartConditions = Cart::getConditions();
            foreach($cartConditions as $condition)
            {
                $condition = Cart::getCondition('committion 5%');
                $condition->getTarget();
                $condition->getName();
                $condition->getType();
                $condition->getValue();
                $condition->getAttributes();
                $total = Cart::getTotal();
                $conditionCalculatedValue = $condition->getCalculatedValue($total);
            }
        $data = [
            'email'=>$request->email,
            'fullname'=>$request->fullname,
            'address'=>$request->address,
            'phone'=>$request->phone,
            'cart_total'=>Cart::getTotal(),
            'status'=>1,
            'ordercode' => $bookingCode,
            'created_at'=>new DateTime()
        ];
        session(['data' => $data]);
        $cart_id = DB::table('booking')->insertGetId($data);
        $cartCollection = Cart::getContent();
        $user_id = Auth::user()->id;
        $cart_details = [];
        foreach($cartCollection as $item) {
            $roomId = $item->id;
            $quantity = $item->quantity;
            $room = Room::find($roomId);
            $this->decreaseRoomQuantity($room, $quantity);
            $cart_details[] = [
                'room_id'=>$item->id,
                'price'=>$item->price,
                'quantity'=>$item->quantity,
                'check_in'=>$item->attributes->check_in,
                'check_out'=>$item->attributes->check_out,
                'booking_id'=>$cart_id,
                'user_id'=>$user_id,
                'created_at'=> new DateTime()
            ];
        }
        session(['quantity'=>$quantity]);
        DB::table('bookingdetail')->insert($cart_details);
        $adultNumber = session('adult_number');
        $roomnumber = session('roomnumber');
        $bookingDetail = DB::table('bookingdetail')
        ->join('booking', 'bookingdetail.booking_id', '=', 'booking.id')
        ->join('room', 'bookingdetail.room_id', '=', 'room.id')
        ->join('hotel', 'room.hotel_id', '=', 'hotel.id')
        ->select('booking.*', 'room.*', 'room.name as room_name', 'hotel.*', 'bookingdetail.check_in', 'bookingdetail.check_out')
        ->where('bookingdetail.booking_id', $cart_id)
        ->first();
        session(['bookingDetail' => $bookingDetail]);

        if(in_array($request->payment_method, ['vnpay_atm', 'vnpay_emv'])){
            $url = $this->vn_payment($request);
            return redirect()->away($url);
        }
    }
    public function deleteBooking(Request $request, $bookingId)
{
    Cart::clear();
    return redirect()->route('client.index')->with('success', 'Booking đã được xóa thành công.');
}
    private function decreaseRoomQuantity($room, $quantity)
    {
        $room->room_quantity -= $quantity;
        $room->save();
        $hotel = $room->hotel;
        if ($hotel) {
            $hotel->room_quantity -= $quantity;
            $hotel->save();
        }
    }
    public function checkoutcomplete(Request $request)
    {
        $data = session('data');
        $cart_id = DB::table('booking')->insertGetId($data);
        $quantity = session('quantity');
        $adultNumber = session('adult_number');
        $bookingDetail = session('bookingDetail');
        $email = $bookingDetail->email;
        $fullname = $bookingDetail->fullname;
        $bookingCode = session('bookingCode');
        Mail::to($email)->send(new OrderConfirmation([
            'bookingCode' => $bookingCode,
            'fullname' =>$fullname,
            'hotelName' => $bookingDetail->name,
            'roomName' => $bookingDetail->room_name,
            'quantity' => $quantity,
            'adultNumber' => $adultNumber,
            'checkInDate' => $bookingDetail->check_in,
            'checkOutDate' => $bookingDetail->check_out,
            'cartTotal' => $bookingDetail->cart_total,
        ]));
        Cart::clear();
        event(new NewOrderNotificationEvent('New-Order'));
        return view('client.pages.cart.checkoutcomplete');
    }
    public function markOrderAsNew(Request $request, $bookingDetailId)
    {
        $bookingDetail = BookingDetail::findOrFail($bookingDetailId);
        $bookingDetail->update(['is_new' => true]);
        broadcast(new NewOrderNotificationEvent($bookingDetail));
        return response()->json(['message' => 'Order marked as new']);
    }
    public function bookingList()
    {
        $user_id = Auth::user()->id;
        $bookingdetails = BookingModel::orderBy('created_at','DESC')->with('room','Booking',)->where('user_id',$user_id)->get();
        return view('client.pages.cart.bookinglist',[
            'bookingdetails'=>$bookingdetails,
        ]);
    }
    public function bookingdetail($id)
    {
        $bookingdetail = BookingModel::where('id', $id)
        ->with('room', 'Booking', 'room.hotel')
        ->get();
    return view('client.pages.cart.bookingdetail', [
        'bookingdetail' => $bookingdetail
    ]);
    }
    public function vn_payment(Request $request)
    {
    $data = $request->all();
    $code_cart = Rand(00,9999);
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = route('client.vnpay_response');
    $vnp_TmnCode = "31ONAG55";
    $vnp_HashSecret = "IGVUOVRYYHYOBBMDVDLVMFFTUVFOPZLV";
    $vnp_TxnRef = $code_cart;
    $vnp_OrderInfo = 'Test Payment';
    $vnp_OrderType = 'Bill Payment';
    $vnp_Amount = $data['total_vnpay'] * 100;
    $vnp_Locale = 'VN';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    $startTime = date("YmdHis");
    $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));

    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
        "vnp_ExpireDate" => $expire
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    return $vnp_Url;

    }
    public function vnpay_response(Request $request) {
        $vnp_HashSecret = "IGVUOVRYYHYOBBMDVDLVMFFTUVFOPZLV";

        $vnp_SecureHash = $request->input('vnp_SecureHash');
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        return redirect()->route('client.checkoutcomplete');
    }
}
