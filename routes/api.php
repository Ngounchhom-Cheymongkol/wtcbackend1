<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Usercontroller;

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
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', function(){
        $datauser=Auth::user();
        if($datauser['role_id']==1)
        {
            return (new Usercontroller)->user();
        }else{
            return (new AdminController)->admin();
        }
    });
    Route::post('addroute', [\App\Http\Controllers\AdminController::class, 'AddRoute']);
    Route::get('viewroute', [\App\Http\Controllers\AdminController::class, 'RouteShow']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});