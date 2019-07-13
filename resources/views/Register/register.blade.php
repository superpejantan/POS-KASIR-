@extends('layouts.app')
@section('content')
<div class="wrapper wrapper--w790">
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">PENDAFTARAN PASIEN</h2>
                </div>
                <div class="card-body">
	<form action="{{url('pendaftaran/pasien')}}" method="post" >
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
        <div class="name">Keluhan</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" type="text" name="keluhan">
                        </div>
                            </div>
                        		</div>
        <div class="form-row space">
		<div class="name">Poli</div>
            <div class="value">
                <div class="input-group-desc">
                <select name="poli" id="poli" class="form-control" required>
				<option value="">pilih poli</option>
                    @foreach($poli as $p)
                    <option value="{{ $p->id_poli }}">{{ $p->nama_poli}}</option>
                    @endforeach
                  </select>
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
	
        <div class="row">
            <div class="col-md-4"></div>
			<div class="form-group" col-md-4>
            <button type="submit" class="btn btn-success" style="margin-left:38px">Insert</button>
            <a href="{{url('/')}}"  class="btn btn-xs btn-primary btn-edit"><i class="glyphicon glyphicon-edit"></i> Kembali</a>'
            </div>
            </div>
            </form>
            </div>

@endsection
@section('scripts')
<script type="text/javascript">
    $('.btn-success').click(function(e){
                    e.preventDefault();
                    var nama = $("input[name='nama']").val();
                    var ttl  = $("input[name='ttl']").val();
                    var kelamin = $("input[name='kelamin']").val();
                    var keluhan = $("input[name='keluhan']").val();
                    var alamat = $("input[name='alamat']").val();
                    var poli = $("input[name='poli']").val();
                    var layanan = $("input[name='layanan']").val();
                   
                    if(nama == ''){
                      alert ('nama tidak boleh kosong');
                    } 
                    if(ttl == ''){
                        alert ('tempat tanggal harus di isi');
                    }
                    if(kelamin == ''){
                        alert ('jenis kelamin harus di isi');
                    }
                    if(alamat ==''){
                        alert ('alamat harus di isi');
                    }if(poli == ''){
                        alert ('layanan poli harus di pilih');
                    }
                    if(layanan == ''){
                        alert ('layanan harus di pilih')
                    }
                    else{
                        $(this).addClass('disabled');
                        $(this).closest('form').submit();
                    }
                })
</script>
@endsection