@extends('layouts.app')
@section('content')
<div class="wrapper wrapper--w790">
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">PENDAFTARAN RAWAT INAP</h2>
                </div>
                <div class="card-body">
	<form name="myForm" action="{{url('store')}}" method="post" onsubmit="return validateForm()">
	{{csrf_field()}}
	<div class="form-row space">
        <div class="name">Nama Pasien</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" id="nama" type="text" name="nama">
                        </div>
                            </div>
                        		</div>
	<div class="form-row space">
        <div class="name">No Identitas</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" id="no_id" type="text" name="no_id">
                        </div>
                            </div>
                        		</div>
		<div class="form-row space">
        <div class="name">Tempat, tanggal Lahir</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" id="ttl" type="text" name="ttl">
                        </div>
                            </div>
                        		</div>
		<div class="form-row space">
        <div class="name">Jenis Kelamin</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" id="kelamin" type="text" name="kelamin">
                        </div>
                            </div>
                        		</div>
		<div class="form-row space">						
		<div class="name">Alamat</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" id="alamat" type="text" name="alamat">
                        </div>
                            </div>
                        		</div>
		<div class="form-row space">
		<div class="name">Dokter</div>
            <div class="value">
                <div class="input-group-desc">
                <select name="dokter" id="dokter" class="form-control" required>
                <?php
                 $dokter = DB::table('tb_dokter')->get();
                ?>
				<option value="">pilih dokter</option>
                    @foreach($dokter as $p)
                    <option value="{{ $p->id_dokter }}">{{ $p->nama_dokter}}</option>
                    @endforeach
                  </select>
                        </div>
                            </div>
                        		</div>
        <div class="form-row space">
        <div class="name">Keluhan</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" id="keluhan" type="text" name="keluhan">
                        </div>
                            </div>
                        		</div>
                            <div class="form-row space">
        <div class="name">Diagnosa</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" id="diagnosa" type="text" name="diagnosa">
                        </div>
                            </div>
                        		</div>
        <div class="form-row space">
		<div class="name">Layanan</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" id="layanan" type="text" name="layanan">
                        </div>
                            </div>
                        		</div>
        <div class="form-row space">
		<div class="name">Poli</div>
            <div class="value">
                <div class="input-group-desc">
                <select name="ruangan" id="poli" class="form-control" required>
                <?php
                 $ruangan = DB::table('tb_ruangan')->get();
                ?>
				<option value="">pilih ruangan</option>
                    @foreach($ruangan as $p)
                    <option value="{{ $p->id_ruangan }}">{{ $p->nama_ruangan}}</option>
                    @endforeach
                  </select>
                        </div>
                            </div>
                        		</div>
		<div class="form-row space">
		<div class="name">Tanggal Periksa</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" id="date" type="date" name="tgl_masuk">
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
@section('scripts')
<script type="text/javascript">
function validateForm() {
  var a = document.forms["myForm"]["nama"].value;
  var b = document.forms["myForm"]["no_id"].value;
  var c = document.forms["myForm"]["ttl"].value;
  var d = document.forms["myForm"]["kelamin"].value;
  var e = document.forms["myForm"]["alamat"].value;
  var f = document.forms["myForm"]["dokter"].value;
  var g = document.forms["myForm"]["poli"].value;
  var h = document.forms["myForm"]["date"].value;

  if (a == "") {
    alert("Nama harus diisi");
    return false;
  }
  if (b == "") {
    alert("No id  harus diisi");
    return false;
  }
  if (c == "") {
    alert("tempat tanggal lahir harus diisi");
    return false;
  }
  if (d == "") {
    alert(" Jenis Kelamin harus diisi");
    return false;
  }
  if (e == "") {
    alert(" Alamat harus diisi");
    return false;
  }
  if (f == "") {
    alert(" nama dokter harus diisi");
    return false;
  }
  if (g == "") {
    alert(" nama poli harus diisi");
    return false;
  }
  if (h == "") {
    alert(" Tanggal periksa harus diisi");
    return false;
  }
}
            
</script>
@endsection