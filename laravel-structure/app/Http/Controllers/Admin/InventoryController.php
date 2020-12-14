<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables, File;

class InventoryController
{
    public function __construct()
    {
      date_default_timezone_set("Asia/Jakarta");
    }
    
    public function getInventory()
    {
        $data = DB::table('inventory')->get();
        return Datatables::of($data)
        ->addIndexColumn()
        ->addColumn('aksi', function($row){
          $btn = '<a href="javascript(0);" data-id="'.$row->id.'" class="btn-edit-inventory" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';
          $btn = $btn. '<a href="javascript(0);" data-id="'.$row->id.'" class="btn-delete-inventory" style="font-size: 18pt; text-decoration: none; color:red;">
          <i class="fas fa-trash"></i>
          </a>';
          return $btn;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function getKelas()
    {
        $kelas = DB::table('room')->get();
        return response()->json([
            'success' => true,
            'message' => 'ok',
            'data' => $kelas
        ]);
    }

    public function store(Request $request)
    {
      $gambar = $request->file('gambar');
      $namaOriFile = $gambar->getClientOriginalName();
      $fileName = time().'_'.$namaOriFile;
      $filePath = "assets/inventory/image";
      $gambar->move($filePath, $fileName, "");

      $data = [
        'nama_barang' => $request->nama ?? null,
        'label' => $request->label ?? null,
        'tahun' => $request->tahun ?? null,
        'jumlah' => $request->jumlah ?? null,
        'kondisi' => $request->kondisi ?? null,
        'sumber_dana' => $request->sumber_dana ?? null,
        'keterangan' => $request->keterangan ?? null,
        'gambar' => $filePath.'/'.$fileName,
        'room_id' => $request->id_room,
        'created_at' =>  \Carbon\Carbon::now()
      ];
      $inventory = DB::table('inventory')->insert($data);
      if($inventory) {
        return response()->json([
          'success' => true,
          'message' => 'oke',
          'data' => $data
        ]);
      }
      
    }

    public function edit($id)
    {
      $data = DB::table('inventory')->where('id', $id)->get();
      return response()->json([
        'success' => true,
        'message' => 'oke',
        'data' => $data
      ]);
    }

    public function update(Request $request, $id)
    {
      $gambar = $request->file('gambar');
      if($gambar) {
        $delete = DB::table('inventory')->where('id', $id)->value('gambar');
        File::delete($delete);
        $namaOriFile = $gambar->getClientOriginalName();
        $fileName = time().'_'.$namaOriFile;
        $filePath = "assets/inventory/image";
        $gambar->move($filePath, $fileName, "");

        $data = [
          'nama_barang' => $request->nama ?? null,
          'label' => $request->label ?? null,
          'tahun' => $request->tahun ?? null,
          'jumlah' => $request->jumlah ?? null,
          'kondisi' => $request->kondisi ?? null,
          'sumber_dana' => $request->sumber_dana ?? null,
          'keterangan' => $request->keterangan ?? null,
          'gambar' => $filePath.'/'.$fileName,
          'room_id' => $request->id_room,
          'updated_at' =>  \Carbon\Carbon::now()
        ];
        $inventory = DB::table('inventory')->where('id', $id)->update($data);
        if($inventory) {
          return response()->json([
            'success' => true,
            'message' => 'oke'
          ]);
        }
      }
      $data = [
        'nama_barang' => $request->nama ?? null,
        'label' => $request->label ?? null,
        'tahun' => $request->tahun ?? null,
        'jumlah' => $request->jumlah ?? null,
        'kondisi' => $request->kondisi ?? null,
        'sumber_dana' => $request->sumber_dana ?? null,
        'keterangan' => $request->keterangan ?? null,
        'room_id' => $request->id_room,
        'updated_at' =>  \Carbon\Carbon::now()
      ];
      $inventory = DB::table('inventory')->where('id', $id)->update($data);
      if($inventory) {
        return response()->json([
          'success' => true,
          'message' => 'oke'
        ]);
      }
    }

    public function destroy($id)
    {
      DB::table('inventory')->where('id', $id)->delete();
      return response()->json([
        'success' => true,
        'message' => 'oke'
      ]);
    }
}
