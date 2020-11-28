<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginController
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }

    // public function logout()
    // {

    // }

    public function get()
    {
        return response()->json([
            'success' => true,
            'message' => 'ok', 'result' => [
                ["id"=>"1","gambar"=>"waffle.jpg","nama"=>"waffle"]
            ]
        ]);
    }
}
