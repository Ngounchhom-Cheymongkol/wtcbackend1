<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\Booking;
use Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class Usercontroller extends Controller
{
    //
    public function user()
    {
        $user=Auth::user();
        return $user;
    }
    public function RouteShow()
    {
        //$user=Auth::user();
        $routedata = DB::select('select routes.*,companies.image,companies.company_name from routes INNER JOIN companies on routes.company_id=companies.id order by departure_date DESC,departure_time');
        return $routedata;
    }
    public function GetRoute(Request $request)
    {
        //$user=Auth::user();
        $routedata = DB::select('select routes.*,companies.image,companies.company_name from routes INNER JOIN companies on routes.company_id=companies.id where id=? order by departure_date DESC,departure_time',[$request->id]);
        return $routedata;
    }
    public function Booking(Request $request)
    {
        //
        $user=Auth::user();
        $newbooking=new Booking;
        $newbooking->user_id=$user['id'];
        $newbooking->route_id=$request->route_id;
        $newbooking->seat_number=$request->seat_number;
        $newbooking->save();
        return $newbooking;
    }
    public function ViewBooking()
    {
        //
        $user=Auth::user();
        $routedata = DB::select('select bookings.id, bookings.user_id as user_id,bookings.seat_number, routes.id as route_id,routes.departure_location as departure_location,routes.destination_location as destination_location,routes.departure_date as departure_date,routes.departure_time as departure_time,routes.arrival_date as arrival_date,routes.arrival_time as arrival_time,companies.company_name as company_name from bookings inner join routes on bookings.route_id=routes.id INNER JOIN companies ON routes.company_id=companies.id where bookings.user_id = ?', [$user['id']]);
        return $routedata;
    } 
    public function BookingDetail($id)
    {
        //
        $routedata = DB::select('select bookings.id, bookings.user_id as user_id,bookings.seat_number, routes.id as route_id,routes.departure_location as departure_location,routes.destination_location as destination_location,routes.departure_date as departure_date,routes.departure_time as departure_time,routes.arrival_date as arrival_date,routes.arrival_time as arrival_time,companies.company_name as company_name ,companies.image as company_image ,companies.email as company_email,users.id as user_id ,users.* from bookings inner join routes on bookings.route_id=routes.id INNER JOIN companies ON routes.company_id=companies.id inner join users on bookings.user_id=users.id where bookings.id= ?', [$id]);
        return $routedata;
    } 
    public function CancelBooking(Request $request)
    {
        //
        $booking=Booking::find($request->id);
        $booking->delete();
        return $booking;
    }
}
