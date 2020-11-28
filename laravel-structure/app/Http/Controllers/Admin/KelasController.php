<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use DataTables;

class KelasController
{
    public function getKelas()
    {
        $data = [
            [
                'tes' => 'ok'
            ]
        ];
        return Datatables::of($data)->make(true);
    }
}
