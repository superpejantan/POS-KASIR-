<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use DB;
use App\pasien;
use App\obat;
use App\Rekam_medis;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use Auth;

class PoliUmumController extends Controller
{
    public function index()
    {
        

        $obat = DB::table('tb_obat')->get();
        $poli = DB::table('tb_poliklinik')->get();
        $dokter = DB::table('tb_dokter')->orWhere('specialis','umum')->get();
       return view('poli_umum.data',['obat'=>$obat, 'poli'=>$poli, 'dokter'=>$dokter]);
    }

    public function periksa($id_pasien)
    {
        $obat = obat::all();
        $periksa = DB::select('select *from tb_pasien where id_pasien=?', [$id_pasien]);
        
        return view ('poli_umum.periksa', ['periksa'=>$periksa, 'obat'=>$obat]);
    }

    public function yajra_umum()
    {
        $now = Carbon::today();
        $Pumum = DB::table('tb_pasien')
        ->join('tb_poliklinik', 'tb_pasien.id_poli','tb_poliklinik.id_poli')
        //->where('tanggal_periksa', $now)
        ->where('tb_poliklinik.id_poli',11)->get();
        return Datatables::of($Pumum)
            ->addColumn('action', function ($umum) {
                $id = $umum->id_pasien;
                return '<a href="#" id-pasien="'.$id.'" class="btn btn-xs btn-primary btn-edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })->editColumn('nama_pasien',function($Pumum){
                $nama = $Pumum->nama_pasien;
                return $nama;
            })->editColumn('nama_poli',function($Pumum){
                $nama = $Pumum->nama_poli;
                return $nama;
            })->make(true);
    }

    public function get_Periksa($id)
    {
        
        $Pumum = DB::table('tb_pasien')
        ->join('tb_poliklinik', 'tb_pasien.id_poli','tb_poliklinik.id_poli')
        ->where('tb_pasien.id_pasien',$id)->first();

        return response()->json([
            'id'=>$Pumum->id,
            'id_pasien' => $Pumum->id_pasien,
            'nama_pasien' => $Pumum->nama_pasien,
            'nama_poli'=>$Pumum->nama_poli,
            'id_poli'=>$Pumum->id_poli
            
            
        ]);


    }
     public function obat()
     { 
         $rekam = Rekam_medis::all();
        
        foreach($rekam as $rkm ){
            $id = $rkm->id_rm;
        }

            $pobat = DB::table('tb_rm_obat')
            ->join('tb_obat','tb_rm_obat.id_obat','tb_obat.id_obat')  
            ->join('tb_rekam_mds','tb_rm_obat.id_rm', 'tb_rekam_mds.id_rm')
            ->where('tb_rm_obat.id_rm',$id)->get();
           
        $mds = DB::table('tb_rekam_mds')->get();
        foreach ($mds as $md){
            $id = $md->id_rm;
        }
       //  $pobat = DB::table('tb_rm_obat')
       //  ->join('tb_obat','tb_rm_obat.id_obat','tb_obat.id_obat')
         //->where('tb_rm.obat.id_obat',$id)
      //   ->get();
         
         return view('rekam_medis.obat',['pobat'=>$pobat, 'mds'=>$mds]);
     }

     
   
}
