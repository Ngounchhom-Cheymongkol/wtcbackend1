<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\Province;
use Hash;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    //
    function RegisterAdmin(Request $request)  {  
        // $user=User::create([
        //     'role_id' => 1,
        //     'company_id'=>$request->input('company_id'),
        //     'full_name' => $request->input('full_name'),
        //     'username' => $request->input('username'),
        //     'gender' => $request->input('gender'),
        //     'age' => $request->input('age'),
        //     'phonenumber' => $request->input('phonenumber'),
        //     'email' => $request->input('email'),
        //     'password' => Hash::make($request->input('password'))
        // ]);
        // $user->save();
        $datauser=Auth::user();
        if($datauser['role_id']==3)
        {
            $user=new User;
            $user->role_id=$request->role_id; 
            $user->company_id=$request->company_id;
            $user->full_name=$request->full_name; 
            $user->username=$request->username;
            $user->gender=$request->gender;
            $user->age=$request->age;
            $user->phonenumber=$request->phonenumber;
            $user->email=$request->email;
            $user->password= Hash::make($request->password);
            $user->save();
        return $user;
        }else{
            return  response([
                'message' => 'Only Manager can access this route'
            ]);
        }
        
    }
    public function RegisterCompany(Request $request){
        $datauser=Auth::user();
        if($datauser['role_id']==3)
        {
            $company=new Company;
            $company->company_name=$request->company_name; 
            $company->head_office_location=$request->head_office_location;
            $company->company_description=$request->company_description; 
            $company->email=$request->email;
            $company->phonenumber=$request->phonenumber;
            $user->save();
        return $user;
        }else{
            return  response([
                'message' => 'Only Manager can access this route'
            ]);
        }
    }
    public function AddProvince(Request $request){
        $datauser=Auth::user();
        if($datauser['role_id']==3)
        {
            $provicne=new Province;
            $provicne->province_name=$request->province_name; 
            $provicne->description=$request->description;
            $provicne->nick_name=$request->nick_name;
            $provicne->save();
        return $provicne;
        }else{
            return  response([
                'message' => 'Only Manager can access this route'
            ]);
        }
    }
}
