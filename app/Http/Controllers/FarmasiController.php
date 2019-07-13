<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use App\pasien;
use App\obat;
use App\rm_obat;

class FarmasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $obat = pasien::get();
        //return view('farmasi.obat', ['obat'=>$obat]);
        $obat = pasien::where('id_poli', 14)->get();

        return view('farmasi.obat', ['obat'=>$obat]);
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
        $id = $request->id;
        $id_pasien = $request->id_p;
        $obat = $request->obat;
        $id_ruangan = $request->id_ruang;

        foreach($obat as $ob){
            $rekamObt = new rm_obat;
            $rekamObt->pasien_id = $id;
            $rekamObt->id_ruangan = $id_ruangan;
            $rekamObt->pasien =$id_pasien;
            $rekamObt->obat_id = $ob;
            $rekamObt->save();
        }
        
            return redirect()->back();
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
   
}
