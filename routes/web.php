<?php
use App\pasien;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/a', function () {

    $obat = pasien::get();
    return view('farmasi.obat', ['obat'=>$obat]);
});
Route::get('resep','FarmasiController@index');
Route::get('/', function () {
    return view('layouts.beranda');
});	


Route::group(['middleware'=>'auth'],function(){
Route::resource ('/rekammedis','RekamMedisController');
Route::resource ('/poligigi','PoligigiController');
Route::resource ('/registerpasien','RegisterController');
Route::resource ('/poliumum','PoliUmumController');
Route::resource ('/polikia','PoliKiaController');
Route::resource ('rawatinap','RawatInapController');
Route::resource ('/jajal','JajalController');

Route::get('/pasien/poli_umum','PoliUmumController@index');
//Route::get('periksa/{id_pasien}','PoliUmumController@periksa');
route::get('data/poli_umum','PoliUmumController@yajra_umum');
route::get('data/pasien_umum/{id}','PoliUmumController@get_Periksa');
Route::get('poliumum/daftar/pasien','PoliUmumControrller@daftar');
Route::get('pasien/umum', function(){
    return view('poli_umum.pasien_umum');
});

Route::get('data/poli_gigi','PoliGigiController@yajra_gigi');
Route::get('data/pasien_gigi/{id}','PoliGigiController@get_gigi');
Route::get('poligigi/daftar/pasien','PoliGigiController@daftar');

Route::get('/c', 'RegisterController@index'); 
Route::get('data/rekam_medis','RekamMedisController@index');
Route::get('data/pasien/rekam_medis/','RekamMedisController@tampil');
Route::post('data/insert/rekam_medis','RekamMedisController@store');

Route::get('poli','RekamMedisController@poliklinik');
Route::post('insert','RekamMedisController@store');
Route::get('hapus/pasien/{id}', 'PoliKiaController@hapus_pasien');

Route::get('data/poli_kia', 'PoliKiaController@kia_yajra');
Route::get('data/pasien_kia/{id}', 'PoliKiaController@get_kia');
Route::get('pasien/kia', 'PoliKiaController@daftar');
//Route::get('pasien/kia', function(){
   // return view('poli_Kia.pasien_kia');
//});

Route::post('selisih','RawatInapController@pembayaran');
Route::post('/store/rawat_inap','RawatInapController@store');
Route::get('data/rawatinap','RawatInapController@yajra_inap');
Route::get('data/inap/get/{id}','RawatInapController@geTedit');
Route::post('administrasi/rawat/inap','RawatInapController@pulang');
Route::get('/data_inap', function () {
    return view('Rawat_inap.datainap');
});

Route::post('data/obat/pasien','FarmasiController@store');
Route::get('/obat/poli-umum', function () {

    $obat = pasien::where('id_poli',11)->get();
    return view('farmasi.p-umum', ['obat'=>$obat]);
});
Route::get('/obat/poli-kia', function () {

    $obat = pasien::where('id_poli',12)->get();
    
    return view('farmasi.p-Kia', ['obat'=>$obat]);
});
Route::get('/obat/poli-gigi', function () {

    $obat = pasien::where('id_poli',14)->get();
    return view('farmasi.p-poligigi', ['obat'=>$obat]);
});
Route::get('/obat/rawat-inap', function () {

    $obat = pasien::where('id_poli',99)->get();
    return view('farmasi.p-rawatinap', ['obat'=>$obat]);
});

Route::post('/pendaftaran/pasien','RegisterController@store');
Route::get('data/pasien','RegisterController@yajra_pasien');
Route::get('keluar','RegisterController@keluar');
route::get('obat','PoliUmumController@obat');
Route::get('/beranda', function () {
    return view('layouts.beranda');
    });
Route::get('pasien-igd', 'UGDController@index');
Route::get('data/pasien-igd', 'UGDController@yajra_igd');

//levelauth
Route::get('form/poliumum', 'PoliUmumController@form_login_poliumum');
Route::post('login/poliumum', 'PoliUmumController@login_poliumum');
Route::get('form/poligigi','PoliGigiController@form_login_poligigi');
Route::post('login/poligigi','PoliGigiController@login_poligigi');

});



Route::get('/home', 'HomeController@index')->name('home');
Route::view('tanggal','cekout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
