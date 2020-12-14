<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getKelas()
    {
        $kelas = DB::table('room')->get();
        return response()->json(
            $kelas
        );
        // return response()->json(['result' => $kelas]);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama ?? null
        ];
        $save = DB::insert($data);
        if($save) {
            return response()->json(['success' => 'true', 'message' => 'ok']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pinjamKelas(Request $request)
    {
        $data = [
            'mulai_pinjam' => $request->mulai ?? null,
            'selesai_pinjam' => $request->selesai ?? null,
            'keterangan' => $request->keterangan ?? null,
            'status' => $request->status ?? null,
            'user_id' => $request->user_id ?? null,
            'kelas_id' => $request->kelas_id ?? null
        ];
        $save = DB::table('pinjam')->insert($data);
        if($save) {
            $msg = [
                'success' => true,
                'message' => "sukses"
            ];
            return response()->json([$msg]);
        }
    }
}
