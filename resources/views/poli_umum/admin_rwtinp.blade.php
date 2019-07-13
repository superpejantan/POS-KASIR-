@extends('layouts.app')
@section('content')
<div class="wrapper wrapper--w790">
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">PENDAFTARAN RAWAT INAP</h2>
                </div>
                <div class="card-body">
	<form action="{{url('store')}}" method="post" type="submit">
	{{csrf_field()}}
	<div class="form-row space">
        <div class="name">Nama Pasien</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" type="text" name="nama">
                        </div>
                            </div>
                        		</div>
	<div class="form-row space">
        <div class="name">No Identitas</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" type="text" name="no_id">
                        </div>
                            </div>
                        		</div>
		<div class="form-row space">
        <div class="name">Tempat, tanggal Lahir</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" type="text" name="ttl">
                        </div>
                            </div>
                        		</div>
		<div class="form-row space">
        <div class="name">Jenis Kelamin</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" type="text" name="kelamin">
                        </div>
                            </div>
                        		</div>
		<div class="form-row space">						
		<div class="name">Alamat</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" type="text" name="alamat">
                        </div>
                            </div>
                        		</div>
		<div class="form-row space">						
		<div class="name">No Hp/Telepon</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" type="text" name="no_tlp">
                        </div>
                            </div>
                        		</div>
		<div class="form-row space">
		<div class="name">Diagnosa</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" type="text" name="diagnosa">
                        </div>
                            </div>
                        		</div>
		<div class="form-row space">
		<div class="name">Dokter</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" type="text" name="dokter">
                        </div>
                            </div>
                        		</div>
        <div class="form-row space">
        <div class="name">Ruangan</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" type="text" name="ruangan">
                        </div>
                            </div>
                        		</div>
        <div class="form-row space">
		<div class="name">Layanan</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" type="text" name="layanan">
                        </div>
                            </div>
                        		</div>
		<div class="form-row space">
		<div class="name">Tanggal Masuk</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" type="date" name="tgl_masuk">
                        </div>
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