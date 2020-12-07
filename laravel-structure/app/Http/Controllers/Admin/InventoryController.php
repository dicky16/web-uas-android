<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class InventoryController
{
    public function getInventory()
    {
        $data = DB::table('inventory')->get();
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('aksi', function($row){
          $btn = '<a href="javascript(0);" data-id="'.$row->id.'" class="btn-edit-kelas" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';
          $btn = $btn. '<a href="javascript(0);" data-id="'.$row->id.'" class="btn-delete-kelas" style="font-size: 18pt; text-decoration: none; color:red;">
          <i class="fas fa-trash"></i>
          </a>';
          return $btn;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }
}
