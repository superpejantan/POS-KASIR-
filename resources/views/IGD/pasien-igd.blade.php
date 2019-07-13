@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<div class="blog">
<div class="judul-1">
<button class="button-1 btn-1">Tambah</button>
</div>
<div class="judul">
<p style="font-size: 45px;">PASIEN IGD</p>
</div>

<div class="conteudo">
<table class="table-data">
		<thead>
            <tr>
            <th>Pasien</th>
            <th>Ruang Poli</th>
            <th>aksi</th>
		</thead>   
</table>
</div>
<div class="modal modal-default fade" id="modal-inap">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Rawat Inap</h4>
      </div>
      <div class="modal-body">
        


      		<form action="{{ url('store/rawat_inap') }}" method="POST" type="submit">
      			{{ csrf_field() }}
					  <input type="text"  name="id" class="form-control" placeholder="hari">
				<div class="box-body">
                	<div class="form-group">
						<label for="exampleInputEmail1">Ruangan</label>
						<select name="ruangan" id="ruang" class="form-control" placeholder="nama dokter" required>
						<option selected="selected" value="">Pilih Ruangan</option>
							@foreach($ruang as $c)
                    			<option value="{{ $c->id_ruangan }}">{{ $c->nama_ruangan }}</option>
                    		@endforeach
                  		</select>
					</div>
				</div>
				<div class="box-body">
                	<div class="form-group">
						<label for="exampleInputEmail1">Diagnosa</label>
						<Input type="text" name="diagnosa" id="diagnosa" class="form-control" placeholder="diagnosa" >
					</div>
				</div>	
				<div class="box-body">
                	<div class="form-group">
						<label for="exampleInputEmail1">Nama Dokter</label>
						<select name="dokter" id="dokter" class="form-control" placeholder="nama dokter" required>
						<option selected="selected" value="">Pilih Dokter</option>
							@foreach($dokter as $c)
                    			<option value="{{ $c->id_dokter }}">{{ $c->nama_dokter }}</option>
                    		@endforeach
                  		</select>
					</div>
				</div>	
				<div class="box-body">
                	<div class="form-group">
						<label for="exampleInputEmail1">Layanan</label>
						<select name="layanan" id="layanan" class="form-control" placeholder="nama dokter" required>
						<option selected="selected" value="">Pilih Layanan</option>
							@foreach($layanan as $c)
                    			<option value="{{ $c->id_layanan }}">{{ $c->layanan }}</option>
                    		@endforeach
                  		</select>
					</div>
				</div>	    
					<div class="box-body">
                			<div class="form-group">
                  			<label for="exampleInputEmail1">Tanggal Inap</label>
                  			<input type="date"  name="tanggal" class="form-control" id="exampleInputEmail1" placeholder="hari">
							</div>
              		</div>
			
							
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block2"><i class="fa fa-fw fa-cart-plus"></i> Update</button>
              </div>
            </form>



      </div>
    </div>
	<!-- /.modal-content -->
	</div>
	</div>
	<!--/modal 2 -->
<div class="modal modal-default fade" id="modal-tmbh">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Pasien IGD</h4>
      </div>
      <div class="modal-body">
        
      		<form action="{{ url('/pendaftaran/pasien') }}" method="POST" type="submit">
      			{{ csrf_field() }}
            
              <div class="box-body">
              
            <div class="form-group">
                  <label for="exampleInputEmail1">Nama Pasien</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Pasien">
                </div>
              </div>
			<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <input type="text"  name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Alamat">
				</div>
              </div>
			<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Kelamin</label>
                  <input type="text"  name="kelamin" class="form-control" id="exampleInputEmail1" placeholder="Kelamin">
				</div>
			  </div>
			  <input type="hidden"  name="poli" value="1">
			  <input type="hidden"  name="id">

              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-fw fa-cart-plus"></i> Update</button>
              </div>
            </form>



      </div>
    </div>
	<!-- /.modal-content -->
	</div>
								</div>
								</div>
	<!--modal-3-->
	<div class="modal modal-default fade" id="modal-prks">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Tindakan</h4>
      </div>
      <div class="modal-body">
	  	<form action="{{ url('data/insert/rekam_medis') }}" method="POST" type="submit">
      			{{ csrf_field() }}
            
              <div class="box-body">
              <input type="text" name="id_pasien" class="form-control" id="exampleInputEmail1">
            <div class="form-group">
                  <label for="exampleInputEmail1">Nama Pasien</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang" required>
                </div>
              </div>
			<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Keluhan</label>
                  <input type="text"  name="keluhan" class="form-control" id="exampleInputEmail1" placeholder="keluhan" >
								</div>
              </div>
			<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Lama sakit</label>
                  <input type="text"  name="lama" class="form-control" id="exampleInputEmail1" placeholder="hari">
								</div>
              </div>
			<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Diagnosa</label>
                  <input type="text"  name="diagnosa" class="form-control" id="exampleInputEmail1" placeholder="hari">
				</div>
              </div>
			<div class="box-body">
                <div class="form-group">
				<label for="exampleInputEmail1">Obat</label>
					<select name="dokter" id="dokter" class="form-control" placeholder="nama dokter" required>
                    @foreach($dokter as $c)
                    <option value="{{ $c->id_dokter }}">{{ $c->nama_dokter }}</option>
                    @endforeach
                  </select>
				</div>
			</div>

			<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Obat</label>
					<select multiple class="form-control" id="obat" name="obat[]" size="7" required>
						<option selected="selected" value="">Pilih Obat</option>

						@foreach($obat as $obt){
							<option value="{{ $obt->id}}">{{ $obt->nama_obat }}</option>
									}
									@endforeach
					</select>
                </div>
              </div>
							<input type="hidden" name="poli" class="form-control" id="exampleInputEmail1">
							<input type="text" name="id_p" class="form-control" id="exampleInputEmail1">
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block3"><i class="fa fa-fw fa-cart-plus"></i> Update</button>
              </div>
            </form>



      </div>
    </div>
	<!-- /.modal-content -->
	</div>
								</div>
								</div>

@endsection
@section('scripts')

<script type="text/javascript">
	$(document).ready(function(){
		var flash = "{{ Session::has('pesan') }}";
		if(flash){
			var pesan = "{{ Session::get('pesan') }}";
			swal('Success',pesan,'success');
		}

		$('.table-data').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: "{{ url('data/pasien-igd') }}",
	        columns: [
	            {data: 'nama_pasien', name: 'nama_pasien'},
	            {data: 'alamat', name: 'alamat'},
	            {data: 'action', name: 'action', orderable: false, searchable: false}
	        ],
          order: [ [0, 'asc'] ]
	    });

	    // Ketika btn tambah di klik
	    $('.btn-tambah').click(function(e){
	    	e.preventDefault();
	    	$('#modal-tambah').modal();
	    });

		//modal2
		$('body').on('click','.btn-1',function(e){

			$('#modal-tmbh').modal();
	    })

		//modal-3
		$('body').on('click','.btn-prks',function(e){
			var id = $(this).attr('id-pasien');
	    	$.ajax({
	    		'type':'get',
	    		'url':"{{ url('data/pasien_umum') }}"+'/'+id,
	    		success: function(data){
	    			console.log(data);
	    			$('#modal-prks').find("input[name='id_pasien']").val(data.id_pasien);
						$('#modal-prks').find("input[name='nama']").val(data.nama_pasien);
						$('#modal-prks').find("input[name='poli']").val(data.id_poli);
						$('#modal-prks').find("input[name='id_p']").val(data.id);
					
	    		}
	    	})

			$('#modal-prks').modal();
		})

	    // Button edit di klik
	    $('body').on('click','.btn-edit',function(e){
	    	var id = $(this).attr('id-pasien');
	    	$.ajax({
	    		'type':'get',
	    		'url':"{{ url('data/pasien_umum') }}"+'/'+id,
	    		success: function(data){
	    			console.log(data);
	    			$('#modal-inap').find("input[name='id']").val(data.id_pasien);
						$('#modal-inap').find("input[name='nama']").val(data.nama_pasien);
						$('#modal-inap').find("input[name='poli']").val(data.id_poli);
						$('#modal-inap').find("input[name='id_p']").val(data.id);
					
	    		}
	    	})

	    	$('#modal-inap').modal();
	    })
	})
	//var url = "{{ url('admin/barang') }}"+'/'+id;('untuk edit')

	//form validasi tindakan
	
	//form validasi rawat inap

	
</script>

@endsection