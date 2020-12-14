<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\DB;

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
        $user = DB::table('users')
        ->join('user_level', 'users.level_id', '=', 'user_level.id')
        ->where('email', $request->email)
        ->select('users.*', 'user_level.level')
        ->get();
        $msg = [
            'success' => true,
            'message' => 'ok',
            'data' => [
                'id' => $user[0]->id,
                'name' => $user[0]->name,
                'email' => $user[0]->email,
                'level' => $user[0]->level,
                'token' => $token
            ]
        ];
        return response()->json([$msg]);
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
