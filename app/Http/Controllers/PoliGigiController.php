<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use DB;
use App\pasien;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use Auth;

class PoliGigiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { $obat = DB::table('tb_obat')->get();
        $poli = DB::table('tb_poliklinik')->get();
        $dokter = DB::table('tb_dokter')->orWhere('specialis','umum')->get();
       return view('poli_gigi.data',['obat'=>$obat, 'poli'=>$poli, 'dokter'=>$dokter]);
    }
    public function PeriksaGigi()
    {

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
    public function edit($id_pasien)
    {
       $gigi = pasien::find($id_pasien);

       return view('poligigi.periksagi', compact('gigi'));
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

    public function yajra_gigi(Request $request)
    {
        $now = Carbon::today();
        $Poli_gigi = DB::table('tb_pasien')
        ->join('tb_poliklinik', 'tb_pasien.id_poli','tb_poliklinik.id_poli')
        //->where('tanggal_periksa', $now)
        ->where('tb_poliklinik.id_poli',14)->get();
        return Datatables::of($Poli_gigi)
            ->addColumn('action', function ($umum) {
                $id = $umum->id_pasien;
                return '<a href="#" id-pasien="'.$id.'" class="btn btn-xs btn-primary btn-edit">Periksa</a>';
            })->editColumn('nama_poli',function($Pumum){
                $nama = $Pumum->nama_poli;
                return $nama;
            })->make(true);
        
    }

    public function get_gigi($id)
    {
        $Pgigi = DB::table('tb_pasien')
                ->join('tb_poliklinik', 'tb_pasien.id_poli','tb_poliklinik.id_poli')
                ->where('tb_pasien.id_pasien',$id)->first();
        return response()->json([
            'id_pasien' => $Pgigi->id_pasien,
            'nama_pasien' => $Pgigi->nama_pasien,
            'nama_poli' => $Pgigi->id_poli,
            'id' => $Pgigi->id
            
        ]);
    }

   
}
