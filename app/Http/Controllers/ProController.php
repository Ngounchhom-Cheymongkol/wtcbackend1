<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProController extends Controller
{
    //
    function Routelist(){
        $routedata = DB::select('select routes.*,companies.image,companies.company_name from routes INNER JOIN companies on routes.company_id=companies.id order by departure_date ASC , departure_time');
        return $routedata;
    }
    function GetRoute($id){
        $routedata = DB::select('select routes.*,companies.image,companies.company_name from routes INNER JOIN companies on routes.company_id=companies.id where company_id=? order by departure_date ASC , departure_time',[$id]);
        return $routedata;
    }
    function Companylist(){
        $Companydata = DB::select('select * from companies order by company_name DESC');
        return $Companydata;
    }
    function GetCompany($id){
        $Companydata = DB::select('select * from companies where id=? order by company_name DESC',[$id]);
        return $Companydata;
    }
    function Province(){
        $ProvinceData = DB::select('select * from provinces order by province_name DESC');
        return $ProvinceData;
    }
    function GetProvince($id){
        $ProvinceData = DB::select('select * from provinces order by province_name DESC',[$id]);
        return $ProvinceData;
    }
    function GetRouteProvince($Province){
        $ProvinceData = DB::select('select * from routes where destination_location=? order by province_name DESC',[$Province]);
        return $ProvinceData;
    }
    public function CancelRoute($id)
    {
        //  
            $routedata=DB::select('delete * from routes where id=?',[$id]);
            return $routedata;
        // if($datauser['role_id']==1){ 
        // // {DB::select('select * from routes where id=?',[$request->$id])
            
        // }else{
        //     return  response([
        //         'message' => 'Only Admin can access this route'
        //     ]);
        // }
    }
}
