<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $user=User::create([
            'role_id' => 2,
            'full_name' => $request->input('full_name'),
            'username' => $request->input('username'),
            'gender' => $request->input('gender'),
            'age' => $request->input('age'),
            'phonenumber' => $request->input('phonenumber'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
        $user->save();
        return $user;
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'message' => 'Invalid credentials!'
            ]);
        }

        $user = Auth::user();

        $token = $user->createToken('api_token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 24); // 1 day

        return response([
            'token' => $token
        ])->withCookie($cookie);
    }

    

    public function logout()
    {
        $cookie = Cookie::forget('jwt');

        return response([
            'message' => 'Success'
        ])->withCookie($cookie);
    }

}
