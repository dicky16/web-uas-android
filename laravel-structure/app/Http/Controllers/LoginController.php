<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect('/')->cookie(
                'login', 'true', 3600
            );
        }
        return redirect()->back()->with(['status' => 'false']);
    }
}
