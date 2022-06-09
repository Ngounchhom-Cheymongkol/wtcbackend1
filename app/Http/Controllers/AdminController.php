<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // is a controller for admin 
    public function admin()
    {
        
        return Auth::user();
    }
    // function viewroute(){
    //     $data=Rouet::all();

    //     return $date;
    // }
    public function AddRoute(Request $request){
       $newroute=new Route;
       $newroute->departure_datetime=$request->departure_datetime; 
       $newroute->arrival_datetime=$request->arrival_datetime;
       $newroute->departure_location=$request->departure_location;
       $newroute->destination_location=$request->destination_location;
       $newroute->number_busseat=$request->number_busseat;
       $newroute->company_id=1;
       $newroute->admin_id=2;
       $newroute->save();  
       return $newroute;
    }
    public function OwnRouteShow()
    {
        // show all own route
        $user=Auth::user();
        $routedata = DB::select('select * from routes where admin_id = ?', [$user['id']]);
        return $routedata;
    }
    public function RouteShow()
    {
        //show all route
        $routedata = DB::select('select * from routes order by departure_datetime DESC');
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
       //
       $user=Auth::user();
       $booking = DB::select('select * from bookings where user_id = ?', [$user['id']]);
       return $booking;
    }
    public function customerBooking(Request $request)
    {
        //
        $customerBooking = DB::select('select * from routes where id = ?', [$request->id]);
        return $customerBooking;
    }
    public function OwnBooking()
    {
        $user=Auth::user();
        $newbooking=new Booking;
        $newbooking->user_id=$user['id']; 
        $newbooking->save();  
        return $newbooking;
    }
    public function RouteSearch(Request $request){
        if($request->departure_location=='null' and $request->destination_location=='null')
            {
                //$user=Auth::user();
                $routedata = DB::select('select * from routes order by departure_datetime DESC');
                return $routedata;
            }
        elseif($request->departure_location!='null' and $request->destination_location=='null')
            {
                $routedata = DB::select('select * from routes where departure_location=? order by departure_datetime DESC',[$request->departure_location]);
                return $routedata;
            }
        elseif($request->departure_location!='null' and $request->destination_location!='null')
            {
                $routedata = DB::select('select * from routes where destination_location=? order by departure_datetime DESC',[$request->departure_location]);
                return $routedata;
            }
        else{
            $routedata = DB::select('select * from routes where departure_location=? and destination_location=? order by departure_datetime DESC',[$request->departure_location,$request->destination_location]);
                return $routedata;
        }
    }
    public function Companysearch(Request $request)
    {
        $routedata = DB::select('select * from companies where id=? order by departure_datetime DESC',[$request->company_id]);
        return $routedata;
    }
}
