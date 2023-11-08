<?php

namespace App\Http\Controllers;

use App\Http\Responses\APIResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        $user = User::where('email', $request->email)->get();

        if(count($user) !== 0) {
            return APIResponse::fail('Email already taken', 400)->json();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return APIResponse::success('Registration successful', 200)->json();
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();
//            $user->api_token = Str::random(60);
//            $user->save();

            return APIResponse::success('Login successful', 200, ['user' => $user])->json();
        }

            return APIResponse::success('Something went wrong', 401, ['message' => 'Something went wrong'])->json();
    }
    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();
//        $user->api_token = null;
//        $user->save();

        return response()->json(['message' => 'You are successfully logged out'], 200);
    }

}
