@extends('layouts.app')
@section('content')
<div class="wrapper wrapper--w790">
    <div class="card card-5">
        <div class="card-heading">
            <h2 class="title">PERIKSA PASIEN</h2>
                </div>
                <div class="card-body">
    @foreach($gigi as $p)
	<form action="{{ url('insert')}}" method="post" type="submit">
	{{csrf_field()}}
	<div class="form-row space">
	<div class="name">Nama Pasien</div>
	<div class="value">
        <input class="input--style-5" type="text" name="nama" value="{{$p->nama_pasien}}">
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
        <div class="name">Dokter</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" type="text" name="dokter">
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
        <div class="name">Obat</div>
            <div class="value">
                <div class="input-group-desc">
                <select multiple class="form-control" id="obat" name="obat[]" size="7" required>
					<option selected="selected" value="">Pilih Obat</option>

					@foreach($obat as $obt){
						<option value="{{ $obt->id_obat }}">{{ $obt->nama_obat }}</option>
					}
					@endforeach
					</select>
                        </div>
                            </div>
                            </div>
        <div class="form-row space">
        <div class="name">Tanggal Periksa</div>
            <div class="value">
                <div class="input-group-desc">
                    <input class="input--style-5" type="date" name="tanggal">
                        </div>
                            </div>
                            </div>
                            
       
                    <input class="input--style-5" type="hidden" value="{{$p->id_poli}}" name="poli">
                    <input class="input--style-5" type="hidden" value="{{$p->id_pasien}}" name="pasien">
                        
        
        
				
        <div class="row">
            <div class="col-md-4"></div>
			<div class="form-group" col-md-4>
            <button type="submit" class="btn btn-success" style="margin-left:38px">Submit</button>
            </div>
            </div>
            </form>
            </div>
			@endforeach
@endsection