<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PinjamController
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPinjam()
    {
        $pinjam = DB::table('pinjam')->get();
        return response()->json(
            $pinjam
        );
        // return response()->json(['result' => $kelas]);
        
    }
    public function terimaPinjaman(Request $request){
        $id = $request->id ?? null;
         $terima = DB::table('pinjam')
              ->where('id', $id)
              ->update(['status' => 'diterima']);
              if($terima) {
                $msg = [
                    'success' => true,
                    'message' => "sukses"
                ];
                return response()->json([$msg]);
            }
        }
        public function tolakPinjaman(Request $request){
            $id = $request->id ?? null;
             $terima = DB::table('pinjam')
                  ->where('id', $id)
                  ->update(['status' => 'ditolak']);
                  if($terima) {
                    $msg = [
                        'success' => true,
                        'message' => "sukses"
                    ];
                    return response()->json([$msg]);
                }
            }
}
