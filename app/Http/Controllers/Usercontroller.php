<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
class Usercontroller extends Controller
{
    //
    public function user()
    {
        return Auth::user();
    }
    public function RouteShow()
    {
        //$user=Auth::user();
        $routedata = DB::select('select * from routes order by departure_datetime DESC');
        return $routedata;
    }
    public function Booking()
    {
        //
        $user=Auth::user();
        $newbooking=new Booking;
        $newbooking->user_id=$user['id']; 
        $newbooking->save();
       return $newbooking;
    }
    public function ViewBooking()
    {
        //
        $user=Auth::user();
        $routedata = DB::select('select * from bookings where user_id = ?', [$user['id']]);
        return $routedata;
    }
    
}
