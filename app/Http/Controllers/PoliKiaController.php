<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use DB;
use App\pasien;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class PoliKiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat = DB::table('tb_obat')->get();
        $poli = DB::table('tb_poliklinik')->get();
        $dokter = DB::table('tb_dokter')->orWhere('specialis','umum')->get();
       return view('poli_KIA.data',['obat'=>$obat, 'poli'=>$poli, 'dokter'=>$dokter]);
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
    public function daftar()
    {
        
        $pasien = DB::table('tb_pasien')
        ->join('tb_poliklinik', 'tb_pasien.id_poli','tb_poliklinik.id_poli')
        ->where('tb_poliklinik.id_poli',12)->get();

        return view('poli_KIA.pasien_kia', ['pasien'=>$pasien]);
    }
    public function kia_yajra()
    {
        $now = Carbon::today();
        $PoliKia = DB::table('tb_pasien')
        ->join('tb_poliklinik', 'tb_pasien.id_poli','tb_poliklinik.id_poli')
        //->where('tanggal_periksa', $now)
        ->where('tb_poliklinik.id_poli',12)->get();
        return Datatables::of($PoliKia)
            ->addColumn('action', function ($umum) {
                $id = $umum->id_pasien;
                return '<a href="#" id-pasien="'.$id.'" class="btn btn-xs btn-primary btn-edit">Periksa</a>';
            })->editColumn('nama_pasien',function($Pumum){
                $nama = $Pumum->nama_pasien;
                return $nama;
            })->editColumn('nama_poli',function($Pumum){
                $nama = $Pumum->nama_poli;
                return $nama;
            })->make(true);

    }

    public function get_kia($id)
    {
        $Pkia = DB::table('tb_pasien')
        ->join('tb_poliklinik', 'tb_pasien.id_poli','tb_poliklinik.id_poli')
        ->where('tb_pasien.id_pasien',$id)->first();

        return response()->json([
            'id_pasien' => $Pkia->id_pasien,
            'nama_pasien' => $Pkia->nama_pasien,
            'nama_poli' => $Pkia->id_poli,
            'id' => $Pkia->id
        ]);
    }

    public function hapus_pasien($id)
    {
        $rm = DB::table('tb_rekam_mds')->where('id_pasien', $id)->delete();
        $pasien = DB::table('tb_pasien')->where('id_pasien',$id)->delete();
    }

   
}
