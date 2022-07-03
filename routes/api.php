<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware(['cors'])->group(function () {
    
// });
Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('cancelroute/{id}', [\App\Http\Controllers\ProController::class, 'CancelRoute']);
Route::get('bookingdetail/{id}',[\App\Http\Controllers\UserController::class, 'BookingDetail']);
    Route::post('getbookinguser', [\App\Http\Controllers\AdminController::class, 'GetBookingUser']);



Route::get('route',[App\Http\Controllers\ProController::class,'Routelist']);
Route::get('company',[App\Http\Controllers\ProController::class,'Companylist']);
Route::get('getcompany/{id}',[App\Http\Controllers\ProController::class,'GetCompany']);
Route::get('getroute/{id}',[App\Http\Controllers\ProController::class,'GetRoute']);
Route::get('getprovince/{id}',[App\Http\Controllers\ProController::class,'GetProvince']);
Route::get('getrouteprovince/{Province}',[App\Http\Controllers\ProController::class,'GetRouteProvince']);


Route::get('province',[App\Http\Controllers\ProController::class,'Province']);
Route::post('bookseat', [\App\Http\Controllers\AdminController::class, 'SeatBooking']);
Route::post('search', [\App\Http\Controllers\AdminController::class, 'RouteSearch']);
Route::post('cancelroute/{id}', [\App\Http\Controllers\AdminController::class, 'CancelRoute']);
Route::post('admin/edit/{id}','\App\Http\Controllers\AdminController@Edit');
Route::put('admin/update/{id}', [\App\Http\Controllers\AdminController::class, 'Update']);
Route::middleware('auth:sanctum')->group(function (){
    Route::get('user', function(){
        $datauser=Auth::user();
        if($datauser['role_id']==2)
        {
            return (new Usercontroller)->user();
        }else{
            return (new AdminController)->admin();
        }
    });

    //user work
    Route::post('booking',[\App\Http\Controllers\UserController::class, 'Booking']);
    Route::post('cancelbooking',[\App\Http\Controllers\UserController::class, 'CancelBooking']);

    //Admin work
    Route::post('addroute', [\App\Http\Controllers\AdminController::class, 'AddRoute']);
    Route::get('ownroute', [\App\Http\Controllers\AdminController::class, 'OwnRouteShow']);
    Route::get('ownbooking', [\App\Http\Controllers\UserController::class, 'ViewBooking']);

    //Manager Work
    Route::post('registeradmin',[\App\Http\Controllers\ManagerController::class, 'RegisterAdmin']);
    Route::post('registercompany',[\App\Http\Controllers\ManagerController::class, 'RegisterCompany']);
    Route::post('addprovince',[\App\Http\Controllers\ManagerController::class, 'AddProvince']);

    // Route::post('registeradmin', [\App\Http\Controllers\ManagerController::class, 'RegisterAdmin']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});