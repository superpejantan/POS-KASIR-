@extends('layouts.app')
@section('content')
	<center><h1>Rekam Medis</h1></center>
	<div class="container">
	<form action="{{url('insert')}}" method="post" type="submit">
	{{csrf_field()}}
	<div class="row">
            <div class="col-md-4"></div>
			<div class="form-group" col-md-4>
				<label for="Pasien"> id:</label>
				<input type="text" id="pasien" class="form-control" name="id">
					</div>
                    </div>
        <div class="row">
            <div class="col-md-4"></div>
			<div class="form-group" col-md-4>
				<label for="Pasien"> Pasien :</label>
				<input type="text" id="pasien" class="form-control" name="pasien">
					</div>
                    </div>
        <div class="row">
            <div class="col-md-4"></div>
			<div class="form-group" col-md-4>		
			<label for="barang"> Keluhan :</label>
					<input type="text" id="keluhan" class="form-control" name="keluhan">
					</div>
                    </div>
         <div class="row">
            <div class="col-md-4"></div>
			<div class="form-group" col-md-4>
				<label for="dokter"> Dokter :</label>
				<select name="dokter" id="dokter" class="form-control" required>
				<option value="">pilih dokter</option>
                    @foreach($dokter as $c)
                    <option value="{{ $c->id_dokter }}">{{ $c->nama_dokter}}</option>
                    @endforeach
                  </select>
					</div>
                    </div>
					<div class="row">
            <div class="col-md-4"></div>
			<div class="form-group" col-md-4>
				<label for="dokter"> Diagnosa :</label>
					<input type="text" class="form-control" name="diagnosa">
					</div>
                    </div>
					<div class="row">
            <div class="col-md-4"></div>
			<div class="form-group" col-md-4>
				<label for="netto"> Ruang poli :</label>
				<select name="poli" id="poli" class="form-control" required>
				<option value="">pilih poli</option>
                    @foreach($poli as $c)
                    <option value="{{ $c->id_poli }}">{{ $c->nama_poli }}</option>
                    @endforeach
                  </select>
					</div>
					</div>
		<div class="row">
            <div class="col-md-4"></div>
			<div class="form-group" col-md-4>
					<label for="jenis">Obat :</label>
					<select multiple class="form-control" id="obat" name="obat[]" size="7" required>
					<option selected="selected" value="">Pilih Obat</option>

					@foreach($obat as $obt){
						<option value="{{ $obt->id_obat }}">{{ $obt->nama_obat }}</option>
					}
					@endforeach
					</select>
					</div>
                    </div>
		<div class="row">
            <div class="col-md-4"></div>
			<div class="form-group" col-md-4>
					<label for="jenis"> Tanggal Periksa :</label>
					<input type="date" class="form-control" name="tanggal">
					</div>
                    </div>

        <div class="row">
            <div class="col-md-4"></div>
			<div class="form-group" col-md-4>
            <button type="submit" class="btn btn-success" style="margin-left:38px">Tambah Motor</button>
            </div>
            </div>
            </form>
            </div>
@endsection