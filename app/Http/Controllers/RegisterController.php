<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\pasien;
use App\Rekam_medis;
use Carbon\Carbon;
use Webpatser\Uuid\Uuid;
use Yajra\DataTables\DataTables;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poli = DB::table('tb_poliklinik')->get();
        $dokter = DB::table('tb_dokter')->get();

        return view('Register.register',compact('poli', 'dokter'));
    }

    public function yajra_pasien()
    {
        $pasien = DB::table('tb_pasien')->
        join('tb_poliklinik','tb_pasien.id_poli', '=','tb_poliklinik.id_poli')->get();;

        return Datatables::of($pasien)
        ->addColumn('action', function($pasien){
            return '<a href="#edit-'.$pasien->id_pasien.'" class="btn btn-xs btn-primary">
            <i class="glyphicon glyphicon-edit"></i> Edit</a>';
        })->editColumn('nama_pasien', function($pasien){
            $nama = $pasien->nama_pasien;
            return $nama;
        })->editColumn('j_kelamin', function($pasien){
            $kelamin = $pasien->J_kelamin;
            return $kelamin;
        })->editColumn('nama_poli',function($pasien){
            $poli = $pasien->nama_poli;
            return $poli;
        })->editColumn('alamat', function($pasien){
            $alamat = $pasien->alamat;
            return $alamat;
        })->make(true);
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
        $id_pasien = Uuid::generate(4);
        $n_pasien = $request->nama;
        $kelamin = $request->kelamin;
        $alamat = $request->alamat;
        $poli = $request->poli;
        

        

        $pasien = new pasien;
        $pasien->id_pasien = $id_pasien;
        $pasien->nama_pasien = $n_pasien;
        $pasien->j_kelamin = $kelamin;
        $pasien->alamat = $alamat;
        $pasien->id_poli = $poli;
        $pasien->tanggal_periksa = $tanggal;
        $pasien->save();
      

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
    public function keluar(){
        \Auth::logout();
        return redirect('/');
    }
}
