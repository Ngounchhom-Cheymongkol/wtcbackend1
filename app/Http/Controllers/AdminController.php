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
       
       $datauser=Auth::user();
       if($datauser['role_id']==1)
       {
            // $newroute=new Route;
            // $newroute->departure_date=$request->departure_datee; 
            // $newroute->arrival_date=$request->arrival_date;
            // $newroute->departure_time=$request->departure_time; 
            // $newroute->arrival_time=$request->arrival_etime;
            // $newroute->departure_location=$request->departure_location;
            // $newroute->destination_location=$request->destination_location;
            // $newroute->number_busseat=$request->number_busseat;
            // $newroute->company_id=$datauser['company_id'];
            // $newroute->admin_id=$datauser['id'];
            // $newroute->save();  
            // return $newroute;
            $newroute=Route::create([
                'departure_date' => $request->input('departure_date'),
                'arrival_date' => $request->input('arrival_date'),
                'departure_time' => $request->input('departure_time'),
                'arrival_time' => $request->input('arrival_time'),
                'departure_location' => $request->input('departure_location'),
                'destination_location' => $request->input('destination_location'),
                'number_busseat' => $request->input('number_busseat'),
                'company_id' => $datauser['company_id'],
                'price'=>$request->input('price'),
                'user_id' => $datauser['id'],
            ]);
            $newroute->save();
            return $newroute;
       }else{
           return  response([
               'message' => 'Only Admin can access this route'
           ]);
       }
    }
    public function OwnRouteShow()
    {
        $datauser=Auth::user();
        if($datauser['role_id']==1)
        {
            $routedata = DB::select("select * from routes where user_id= ?", [$datauser['id']]);
            return $routedata;
        }else{
            return  response([
                'message' => 'Only Admin can access this route'
            ]);
        }
        // show all own route
    }
    public function CancelRoute($id)
    {
        //  
            $routedata=DB::select('delete from bookings where route_id=?',[$id]);
            $routedata=DB::select('delete from routes where id=?',[$id]);
            return $routedata;
        // if($datauser['role_id']==1){ 
        // // {DB::select('select * from routes where id=?',[$request->$id])    
        // }else{

        //     return  response([
        //         'message' => 'Only Admin can access this route'
        //     ]);
        // }
    }
    public function Edit($id){
        $route=Route::find($id);
        return $route;
    }
    public function Update(Request $request,$id){
            $newroute=Route::find($id);
            $newroute->departure_date=$request->departure_date; 
            $newroute->arrival_date=$request->arrival_date;
            $newroute->departure_time=$request->departure_time; 
            $newroute->arrival_time=$request->arrival_time;
            $newroute->departure_location=$request->departure_location;
            $newroute->destination_location=$request->destination_location;
            $newroute->number_busseat=$request->number_busseat;
            $newroute->price=$request->price;
            $newroute->save(); 
        return $newroute;
    }
    // public function RouteShow()
    // {
    //     //show all route
    //     $routedata = DB::select('select * from routes order by departure_datetime DESC');
    //     return $routedata;
    // }
    // public function Booking(Request $request)
    // {
    //     //
    //     $user=Auth::user();
    //     $newbooking=new Booking;
    //     $newbooking->user_id=$user['id']; 
    //     $newbooking->route_id=$request->route_id;
    //     $newbooking->seat_number=$request->seat_number;
    //     $newbooking->save();  
    //    return $newbooking;
    // }

    public function ViewBooking()
    {
       $user=Auth::user();
       $booking = DB::select('select * from routes where user_id = 3');
       return $booking;
    }
    public function SeatBooking(Request $request){
        
       $booking = DB::select('select seat_number from bookings where route_id = ?',[$request->route_id]);
       return $booking;
    }
    public function customerBooking(Request $request)
    {
        //
        $customerBooking = DB::select('select * from routes where id = ?', [$request->id]);
        return $customerBooking;
    }

    public function RouteSearch(Request $request){
        if($request->departure_location=='null' and $request->destination_location=='null')
            {
                //$user=Auth::user();
                $routedata = DB::select('select routes.*,companies.image,companies.company_name from routes INNER JOIN companies on routes.company_id=companies.id where departure_date>=? order by departure_date ASC,departure_time',[$request->departure_date]);
                return $routedata;
            }
        elseif($request->departure_location!='null' and $request->destination_location=='null')
            {
                $routedata = DB::select('select routes.*,companies.image,companies.company_name from routes INNER JOIN companies on routes.company_id=companies.id where departure_location=? and departure_date>=? order by departure_date ASC',[$request->departure_location,$request->departure_date]);
                return $routedata;
            }
        elseif($request->departure_location='null' and $request->destination_location!='null')
            {
                $routedata = DB::select('select routes.*,companies.image,companies.company_name from routes INNER JOIN companies on routes.company_id=companies.id where destination_location=? and departure_date>=? order by departure_date ASC',[$request->destination_location,$request->departure_date]);
                return $routedata;
            }
        else{
            $routedata = DB::select('select routes.*,companies.image,companies.company_name from routes INNER JOIN companies on routes.company_id=companies.id where departure_location=? and destination_location=? and departure_date>=? order by departure_date ASC',[$request->departure_location,$request->destination_location,$request->departure_date]);
                return $routedata;
        }
    }
    public function Companysearch(Request $request)
    {
        $routedata = DB::select('select * from companies where id=? order by departure_datetime DESC',[$request->company_id]);
        return $routedata;
    }
}
