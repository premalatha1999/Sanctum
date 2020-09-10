<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    function index(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
            $abilities = $request->abilities;        
            $token = $user->createToken('my-app-token',[$abilities])->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token
            ];
             return response($response, 201);
    }

    function details(Request $request)
    {
        if(auth()->user()->tokenCan('view')){
            return User::get();
        }else{
            return "no";
        }
        
    }
}
