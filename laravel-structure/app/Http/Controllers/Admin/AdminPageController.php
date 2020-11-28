<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AdminPageController
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function kelas()
    {
        return view('admin.kelas');
    }

    public function inventory()
    {
        return view('admin.inventory');
    }

    public function login()
    {
        return view('login');
    }
}
