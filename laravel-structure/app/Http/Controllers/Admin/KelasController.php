<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class KelasController
{
    public function getKelas()
    {
        $data = DB::table('room')->get();
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

    public function store(Request $request) 
    {
        $data = [
            'room_name' => $request->nama ?? null,
            'created_at' => \Carbon\Carbon::now()
        ];
        $save = DB::table('room')->insert($data);
        if($save) {
            return response()->json([
                'success' => "true",
            ]); 
        }
    }
    public function getLastId()
    {
        $lastId = DB::table('room')->latest()->value('id');
        return response()->json(['success' => 'true', 'message' => 'ok', 'data' => $lastId]);
    }

    public function edit($id)
    {
        $data = DB::table('room')->where('id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $data
        ]); 
    }

    public function update(Request $request, $id)
    {
        $data = [
            'room_name' => $request->nama ?? null,
            'updated_at' => \Carbon\Carbon::now()
        ];
        $save = DB::table('room')->where('id', $id)->update($data);
        if($save) {
            return response()->json(['update' => 'success']);
        }
    }

    public function destroy($id)
    {
        $delete = DB::table('room')->where('id', $id)->delete();
        if($delete) {
            return response()->json(['delete' => 'success']);
        }
        return response()->json(['delete' => 'failed']);
    }
}
