<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\DataTables;
use DB;


class UGDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruang = DB::table('tb_ruangan')->get();
        $dokter = DB::table('tb_dokter')->get();
        $layanan = DB::table('layanan')->get();
        $obat = DB::table('tb_obat')->get();
        
        return view('IGD.pasien-igd', ['obat'=>$obat, 'ruang'=>$ruang, 'dokter'=>$dokter, 'layanan'=>$layanan]);
    }

    public function yajra_igd()
    {
        $igd = DB::table('tb_pasien')->where('id_poli',1)->get();

        return DataTables::of($igd)
        ->addColumn('action', function($id_p){
            $id = $id_p->id_pasien;
            return '<a href="#" id-pasien="'.$id.'" class="btn-size btn-clr-2 btn-edit">
            Inap</a>'.'<a href="#" id-pasien="'.$id.'" class="btn-2 btn-prks">Periksa</a>';
        })->editColumn('nama', function($nama){
            $nma = $nama->nama_pasien;
            return $nma;
        })->editColumn('alamat', function($alamat){
            $almt = $alamat->alamat;
            return $almt;
        })->make('true');
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
        //
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
