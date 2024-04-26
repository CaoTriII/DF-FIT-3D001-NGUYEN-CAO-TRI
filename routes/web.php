<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HotelTypeController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\RoomserviceController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\DistrictController;
use App\Http\Controllers\Client\HotelCategoryController;
use App\Http\Controllers\Client\RoomDetailController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ServiceController;
use App\Http\Controllers\Client\UserDetailController;
use App\Http\Controllers\Client\AjaxController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Admin\DasBoardController;
use App\Models\User;
use App\Jobs\TestJob;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix('client')->name('client.')->group(function () {
    Route::get('/hotel/hotel-detail/{id}', [HotelCategoryController::class, 'detail'])->name('detail');
    Route::get('/room/roomdetail/{id}', [RoomDetailController::class, 'roomdetail'])->name('roomdetail');

    Route::get('/district/{id}', [DistrictController::class, 'district'])->name('district');

    Route::get('/userdetail/{id}', [UserDetailController::class, 'userdetail'])->name('userdetail');

    Route::get('/booking', [CartController::class, 'booking'])->name('booking');

    Route::post('/addbooking/{id}/{quantity}', [CartController::class, 'addbooking'])->name('addbooking');

    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [CartController::class, 'checkoutPost'])->name('checkoutPost');
    Route::get('/checkoutcomplete', [CartController::class, 'checkoutcomplete'])->name('checkoutcomplete');

    Route::post('/updatebooking', [CartController::class, 'updatebooking'])->name('updatebooking');
    Route::delete('/booking/{bookingId}', [CartController::class,'deleteBooking'])->name('delete.booking');

    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/about', [HomeController::class, 'about'])->name('about');

    Route::get('/hotel/hotelmain', [HotelCategoryController::class, 'hotel'])->name('hotel');
    Route::get('/room/roomlist', [RoomDetailController::class, 'roomlist'])->name('roomlist');

    Route::get('/payment', [CartController::class, 'payment'])->name('payment');
    Route::post('/vn_payment', [CartController::class, 'vn_payment'])->name('vn_payment');
    Route::get('/vnpay_response',[CartController::class, 'vnpay_response'])->name('vnpay_response');
});
Route::get('/bookinglist', [CartController::class, 'bookinglist'])->name('bookinglist');
Route::get('/bookingdetail/{id}', [CartController::class, 'bookingdetail'])->name('bookingdetail');

Route::get('auth/login',[LoginController::class,'showlogin'])->name('showlogin');
Route::post('auth/login',[LoginController::class,'login'])->name('login');
Route::get('auth/logout',Logout::class)->name('logout');

Route::get('search',[AjaxController::class, 'viewsearch'])->name('viewsearch');
Route::post('processSearch',[AjaxController::class, 'processSearch'])->name('processSearch');

Route::get('filter',[AjaxController::class,'viewfilter'])->name('viewfilter');
Route::post('processfilter',[AjaxController::class,'processfilter'])->name('processfilter');

Route::get('datepicker',[AjaxController::class,'datepicker'])->name('datepicker');
Route::post('processdatepicker',[AjaxController::class,'processdatepicker'])->name('processdatepicker');

Route::get('showresult',[AjaxController::class,'showresult'])->name('showresult');
Route::post('hotelresult', [AjaxController::class, 'hotelresult'])->name('hotelresult');

Route::get('dashboard',[DasBoardController::class, 'dashboard'])->name('dashboard');
Route::get('dashboardBooking',[DasBoardController::class, 'dashboardBooking'])->name('dashboardBooking');

Route::get('todayBooking',[DasBoardController::class, 'todayBooking'])->name('todayBooking');

Route::get('showCheckInStatus',[DasBoardController::class, 'showCheckInStatus'])->name('showCheckInStatus');
Route::get('showCheckedStatus',[DasBoardController::class, 'showCheckedStatus'])->name('showCheckedStatus');

Route::get('/dashboard/check-in/{id}', [DasBoardController::class, 'checkInOrder'])->name('check-in-order');

Route::put('/check-in/{orderId}', 'BookingController@updateCheckInStatus')->name('updateCheckInStatus');
Route::post('check-in-action/{order}', [DasBoardController::class, 'checkInAction'])->name('check-in-action');

Route::get('/hotelList/{user_id}', [HotelController::class,'hotelList'])->name('hotelList');
Route::get('/orderList/{user_id}', [HotelController::class,'orderList'])->name('orderList');
Route::get('/todayorderList/{id}', [HotelController::class,'todayBooking'])->name('todayorderList');

Route::post('/markOrderAsNew/{bookingDetailId}', [OrderController::class, 'markOrderAsNew'])->name('markOrderAsNew');

Route::prefix('user')->name('user.')->controller(UserController::class)->group(function () {
    Route::get('index','index')->name('index');

    Route::get('create','create')->name('create');
    Route::post('store','store')->name('store');

    Route::get('edit/{id}','edit')->name('edit');
    Route::post('update/{id}','update')->name('update');
    Route::get('destroy/{id}','destroy')->name('destroy');
});
Route::prefix('admin')->name('admin.')->middleware('check_login')->group(function () {
    Route::prefix('hoteltype')->name('hoteltype.')->controller(HotelTypeController::class)->group(function () {
        Route::get('index','index')->name('index');

        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');

        Route::get('edit/{id}','edit')->name('edit');
        Route::post('update/{id}','update')->name('update');
        Route::get('destroy/{id}','destroy')->name('destroy');
    });
    Route::prefix('hotel')->name('hotel.')->controller(HotelController::class)->group(function () {
        Route::get('index','index')->name('index');

        Route::get('roomdetails/{id}','roomdetails')->name('roomdetails');
        Route::get('showHotelOrders/{id}','showHotelOrders')->name('showHotelOrders');

        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');

        Route::get('edit/{id}','edit')->name('edit');
        Route::post('update/{id}','update')->name('update');
        Route::get('destroy/{id}','destroy')->name('destroy');

        Route::get('district','district')->name('district');
    });
    Route::prefix('roomtype')->name('roomtype.')->controller(RoomTypeController::class)->group(function () {
        Route::get('index','index')->name('index');

        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');

        Route::get('edit/{id}','edit')->name('edit');
        Route::post('update/{id}','update')->name('update');
        Route::get('destroy/{id}','destroy')->name('destroy');
    });
    Route::prefix('roomservice')->name('roomservice.')->controller(RoomserviceController::class)->group(function () {
        Route::get('index','index')->name('index');

        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');

        Route::get('edit/{id}','edit')->name('edit');
        Route::post('update/{id}','update')->name('update');
        Route::get('destroy/{id}','destroy')->name('destroy');
    });
    Route::prefix('room')->name('room.')->controller(RoomController::class)->group(function () {
        Route::get('index}','index')->name('index');

        Route::get('create','create')->name('create');
        Route::post('store','store')->name('store');

        Route::get('edit/{id}','edit')->name('edit');
        Route::post('update/{id}','update')->name('update');
        Route::get('destroy/{id}','destroy')->name('destroy');

        Route::post('upload-file/{id}','uploadFile')->name('uploadFile');
        Route::get('delete-file/{id}','deleteFile')->name('deleteFile');
    });
});




