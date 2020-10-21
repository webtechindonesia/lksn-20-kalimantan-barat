<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthConctroller extends Controller
{
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validate->fails())
            return response()->json(['error' => 'unauthozied'], 401);


        $credential = $request->only(['username', 'password']);

        if (!$token = Auth::attempt($credential)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);

        // try {
        //     if (!$token = JWTAuth::attempt($credential)) {
        //         return response()->json(['error' => 'unauthorized'], 401);
        //     }
        // } catch (JWTException $e) {
        //     return response()->json(['message' => 'err'], 401);
        // }

        // return response()->json([
        //     'token' => $token,
        //     'token_type' => 'Bearer',
        //     'expires_in' => 
        // ])
    }
}
