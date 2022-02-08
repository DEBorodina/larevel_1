<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        /*$user = User::where('email',$request->input('email'))->first();
        if($user && Hash::check($request->input('password'),$user->password)){
            return response()->json([
                'access_token'=>$user->createToken('tokens')->plainTextToken
            ]);
        }*/
        if(!Auth::attempt($request->all(['email','password']))){
            return response()->json([
                'error'=>'incorrect credentials',
            ],401);
        }
        return response()->json([
            'access_token'=>Auth::user()->createToken('tokens')->plainTextToken,
        ]);

    }

    public function register(Request $request){
        $data  = [
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
            'name'=>$request->input('name'),
            // 'api_token'=>Hash::make...
        ];
       $user = User::create($data);
       return response()->json([
           'access_token'=>$user->createToken('tokens')->plainTextToken
       ]);
    }

    public function logout(){
        Auth::user()->tokens()->delete();
        Auth::logout();
        return response()->json([
            'message' => 'goodbye!',
        ]);
    }

}
