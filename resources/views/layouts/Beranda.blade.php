@extends('layouts.app')
@section('content')
@include('layouts.navbar')
<div class="blog">
<div class="box-isi">
          <p>ADMINISTRASI</p>
        <a href="{{ url('data/barang') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>

      <div class="box-isi">
         <h3>Poli Umum</h3>
          <p>jumlah pasien </p>
        <a href="{{ route('poliumum.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      <div class="box-isi">
         <h3>Poli Gigi</h3>
          <p>jumlah pasien </p>
        <a href="{{ route('poligigi.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      <div class="box-isi">
         <h3>Farmasi</h3>
          <p>jumlah pasien </p>
        <a href="{{ url('data/obat') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      <div class="box-isi">
         <h3>Poli KIA</h3>
          <p>jumlah pasien </p>
        <a href="{{ route('polikia.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      <div class="box-isi">
          <h3>Rawat Inap</h3>
          <p>jumlah pasien</p>
        <a href="{{ url('data_inap') }}">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>

      <div class="box-isi">
          <h3>Rekam Medis</h3>
          <p>jumlah pasien </p>
        <a href="{{ url('rekam_medis') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
      <div class="box-isi">
          <h1>Unit Gawat Darurat(UGD)</h1>
          <p>Jumlah Pasien</p>
        <a href="{{ url('pasien/ugd') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
  </div>

</section>

@endsection