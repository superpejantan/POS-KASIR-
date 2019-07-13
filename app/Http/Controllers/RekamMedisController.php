<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Rekam_medis;
use App\rm_obat;
use Webpatser\Uuid\Uuid;
use App\pasien;
use App\obat;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat = DB::table('tb_obat')->get();
        $poli =DB::table('tb_poliklinik')->get();
        $dokter = DB::table('tb_dokter')->get();

        return view('rekam_medis.data', compact('obat','poli','dokter'));
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
        $tanggal = Carbon::today();
        $id = Uuid::generate(4);
        $id_rm = Uuid::generate(4);
        $pasien = $request->id_pasien;
        $keluhan = $request->keluhan;
        $poli = $request->poli;
        $diagnosa = $request->diagnosa;
        $lama = $request->lama;
        $dokter = $request->dokter;
        $obat = $request->obat;
        $id_p =$request->id_p;
        

        $rekamMds = new Rekam_medis;
        $rekamMds->id_rm = $id;
        $rekamMds->id_pasien = $pasien;
        $rekamMds->keluhan =$keluhan;
        $rekamMds->lama = $lama;
        $rekamMds->diagnosa = $diagnosa;
        $rekamMds->id_poli =$poli;
        $rekamMds->id_dokter = $dokter;
        $rekamMds->tanggal_prksa = $tanggal;
        $rekamMds->save();

        foreach($obat as $ob){
            $rekamObt = new rm_obat;
            $rekamObt->pasien_id = $id_p;
            $rekamObt->pasien = $pasien;
            $rekamObt->obat_id = $ob;
            $rekamObt->save();
        }
        
       
        return redirect()->back();

    }

    /**$obat = $request->obat;
    foreach($obat as $ob){
         $rekamObt = new rm_obat;
         $rekamObt->id_rm = $rekamMds->id_rm;
         $rekamObt->id_obat = $ob;
         $rekamObt->save();-->*/

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

    public function poliklinik()
    {
        $poli =DB::table('tb_poliklinik')->get();
        return view('rekam_medis.rekammds', compact('poli'));

    }

    public function obat()
    {
        $obat = DB::table('obat')->get();
        return view('rekam_medis.rekammds', ['obat'=>$obat]);

    }

    public function tampil()
    {
        //$rekam = rekam_medis::all();
        //foreach($rekam as $rkm){
          //  $id = $rkm->id_rm;
        //}
  
        $Rmedis = DB::table('tb_rekam_mds')
        ->join('tb_pasien','tb_rekam_mds.id_pasien', '=', 'tb_pasien.id_pasien')
        ->join('tb_dokter','tb_rekam_mds.id_dokter', '=','tb_dokter.id_dokter')
        ->join('tb_poliklinik','tb_rekam_mds.id_poli', '=','tb_poliklinik.id_poli')

        ->get();
        
        return Datatables::of($Rmedis)
            ->addColumn('action', function ($Rmedis) {
                return '<a href="#edit-'.$Rmedis->id_rm.'" class="btn btn-xs btn-primary">
                <i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })->editColumn('nama_pasien',function($Rmedis){
                $nama = $Rmedis->nama_pasien;
                return $nama;
            })->editColumn('keluhan',function($Rmedis){
                $keluhan = $Rmedis->keluhan;
                return $keluhan;
            })->editColumn('nama_poli',function($Rmedis){
                $poli = $Rmedis->nama_poli;
                return $poli;
            })->editColumn('nama_dokter',function($Rmedis){
                $dokter = $Rmedis->nama_dokter;
                return $dokter;
            })->editColumn('diagnosa',function($Rmedis){
                $diagnosa = $Rmedis->diagnosa;
                return $diagnosa;
            })->editColumn('tanggal_prksa',function($Rmedis){
                $tanggal=$Rmedis->tanggal_prksa;
                return $tanggal;
            }) ->make(true);
    }

   

   
}
