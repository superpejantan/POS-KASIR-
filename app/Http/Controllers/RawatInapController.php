<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use DB;
use carbon\Carbon;
use App\pasien;
use App\rawat_inap;
use App\rekam_inap;
use Webpatser\Uuid\Uuid;
use Yajra\DataTables\DataTables;
use PDF;
use Auth;
class RawatInapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       return view('rawat_inap.datainap');
    }

    public function pembayaran(Request $request)
    {
        
        $checkIn = $request->tanggal1;
        $checkOut = $request->tanggal2;

       $masuk =\Carbon\Carbon::createFromFormat('Y-m-d', $checkIn);
       $keluar = \Carbon\Carbon::createFromFormat('Y-m-d', $checkOut);

       $selisih = $masuk->diffInDays($keluar);
        $bayar = $selisih * 2000;
       echo $bayar;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rawat_inap.insert');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_pasien = $request->id;
        $keluhan = $request->keluhan;
        $dokter = $request->dokter;
        $diagnosa = $request->diagnosa;
        $ruang = $request->ruangan;
        $layanan = $request->layanan;
        $tanggal = $request->tanggal;
        $qty = 1;
        //dd($layanan);
        $rawatInap = new rawat_inap;
        $rawatInap->id_pasien =$id_pasien;
        $rawatInap->id_dokter =$dokter;
        $rawatInap->diagnosa = $diagnosa;
        $rawatInap->layanan = $layanan;
        $rawatInap->id_ruangan = $ruang;
        $rawatInap->tgl_masuk = $tanggal;
        $rawatInap->save();

        
    	$isi = \DB::table('tb_ruangan')->where('id_ruangan',$ruang)->value('ruangan_terisi');
        $ruangan = \DB::table('tb_ruangan')->where('id_ruangan',$ruang)->value('jumlah_ruangan');

            $qtyNow = \DB::table('tb_ruangan')->where('id_ruangan',$ruang)->value('ruangan_terisi');
    		\DB::table('tb_ruangan')->where('id_ruangan',$ruang)->update([
                'ruangan_terisi'=>$qtyNow+$qty,
                'sisa'=>$ruangan-($isi+1)
            ]);
            
            $produk =DB::table('tb_ruangan')
            ->select(DB::raw('sum(jumlah_ruangan*ruangan_terisi) as sisa'))->get();
            //dd($id_pasien);
            $inap = DB::table('tb_pasien')->where('id_pasien',$id_pasien)->update([
                'id_poli'=>99]);
            //dd($inap);
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
        $hari = carbon::today();
        
       
        $checkOut = $request->tanggal2;

       $masuk =$hari;
       $keluar =  $checkOut;

       $selisih = $masuk->diffInDays($keluar);
        $bayar = $selisih * 2000;
       echo $bayar;
    }

    public function pulang(Request $request)
    {
        $tgl_msk = $request->tgal1;
        $id_pasien = $request->id_p;
        $pulang = carbon::now();
        $harga = $request->harga;
        $diagnosa = $request->diagnosa;
        $layanan = $request->layanan;
        $dokter = $request->dokter;
        $ruang = $request->id_ruang;
        $qty = 1;


        $hari_inap = $pulang->diffInDays($tgl_msk);
        $pembayaran = $hari_inap * $harga;
        //dd($pembayaran, $harga, $hari_inap, $tgl_msk);
        $rekam_inap = new rekam_inap;
        $rekam_inap->id_pasien = $id_pasien;
        $rekam_inap->tgal_masuk = $tgl_msk;
        $rekam_inap->tgal_pulang = $pulang;
        $rekam_inap->lama_inap = $hari_inap;
        $rekam_inap->dokter = $dokter;

        $rekam_inap->layanan = $layanan;
        $rekam_inap->diagnosa = $diagnosa;
        $rekam_inap->pembayaran = $pembayaran;
        $rekam_inap->save();

        $jumlah = DB::table('tb_ruangan')->where('id_ruangan',$ruang)->value('ruangan_terisi');
        $ruangan = DB::table('tb_ruangan')->where('id_ruangan', $ruang)->value('jumlah_ruangan');
        \DB::table('tb_ruangan')->where('id_ruangan',$ruang)->update([
            'ruangan_terisi'=>$jumlah-$qty,
            'sisa'=>$ruangan-($jumlah+1) ]);

            //menghilangkan dari data pasien_inap
        //DB::table('tb_pasien_inap')->where('id_pasien', $id_pasien)->delete();
        
        
        $rawat_inap = DB::table('rekam_inap')
                    ->join('tb_pasien','rekam_inap.id_pasien','tb_pasien.id_pasien')
                    ->where('rekam_inap.id_pasien', $id_pasien)->get();
        $pdf = PDF::loadview('cetak.kwitansi', ['rawat_inap'=>$rawat_inap,]);
        return $pdf->stream('kwitansi_pembayaran_pdf');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function geTedit($id)
    {
        $inap = DB::table('tb_pasien_inap')
        ->join('tb_pasien', 'tb_pasien_inap.id_pasien', '=','tb_pasien.id_pasien')
        ->join('tb_dokter', 'tb_pasien_inap.id_dokter', '=','tb_dokter.id_dokter')
        ->join('tb_ruangan', 'tb_pasien_inap.id_ruangan', '=', 'tb_ruangan.id_ruangan')
        ->join('layanan', 'tb_pasien_inap.layanan', '=', 'layanan.id_layanan')
        ->where('tb_pasien_inap.id_pasien',$id)
        ->first();

        return response()->json([
           'id'=> $inap->id,
           'id_pasien' => $inap->id_pasien,
           'id_rawat_inap'=> $inap->id_rawat_inap,
           'id_ruangan'=>$inap->id_ruangan,
           'nama_pasien'=> $inap->nama_pasien,
           'nama_dokter'=>$inap->nama_dokter,
           'nama_ruangan'=>$inap->nama_ruangan,
           'harga'=>$inap->harga,
           'diagnosa'=>$inap->diagnosa,
           'layanan'=>$inap->layanan,
           'tgl_masuk'=>$inap->tgl_masuk
           
            
        ]);
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

    public function yajra_inap()
    {
        $inap = DB::table('tb_pasien_inap')
        ->join('tb_pasien', 'tb_pasien_inap.id_pasien', '=','tb_pasien.id_pasien')
        ->join('tb_dokter', 'tb_pasien_inap.id_dokter', '=','tb_dokter.id_dokter')
        ->join('tb_ruangan', 'tb_pasien_inap.id_ruangan', '=', 'tb_ruangan.id_ruangan')
        ->join('layanan', 'tb_pasien_inap.layanan','=', 'layanan.id_layanan')
        ->get();

        return Datatables::of($inap)
        ->addColumn('action', function ($inap) {
            $id = $inap->id_pasien;
            return '<a href="#" id-pasien="'.$id.'" class="btn btn-xs btn-primary btn-obat"></i> Obat</a>'
            .'<a href="#" id-pasien="'.$id.'" class="btn-2 btn-plng"</i> Pulang</a>';
        })->editColumn('nama_pasien', function($inap){
            $nama = $inap->nama_pasien;
            return $nama;
        })->editColumn('ruang_inap', function($inap){
            $ruang = $inap->nama_ruangan;
            return $ruang;
        })->editColumn('dokter', function($inap){
            $dokter = $inap->nama_dokter;
            return $dokter;
        })->editColumn('diagnosa', function($inap){
            $diagnosa = $inap->diagnosa;
            return $diagnosa;
        })->editColumn('layanan', function($inap){
            $layanan = $inap->layanan;
            return $layanan;
        })->editColumn('tgl_masuk', function($inap){
            $tgl = $inap->tgl_masuk;
            return $tgl;
        })->make(true);
    }

    
}
