@extends('layouts.app')
@section('content')
@include('layouts.navbar')
<div class="blog">
  <center><h2>Pasien Poli Gigi</h2></center>
<div class="conteudo">
<table class="table table-hover">
        <thead>
            <tr>
            <th>Pasien</th>
            <th>Poli</th>
            <th>aksi</th>
        </thead>
</table>
</div>
</div>

<div class="modal modal-default fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
          <h4 class="modal-title">Periksa Pasien Gigi</h4>
      </div>
      <div class="modal-body">
      		<form action="{{ url('data/insert/rekam_medis') }}" method="POST" type="submit">
      			{{ csrf_field() }}
            
              <div class="box-body">
              <input type="text" name="id_pasien" class="form-control" id="exampleInputEmail1">
              <input type="text" name="poli" class="form-control" id="exampleInputEmail1">
              <input type="text" name="id_p" class="form-control" id="exampleInputEmail1">
            <div class="form-group">
                  <label for="exampleInputEmail1">Nama Pasien</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
                </div>
              </div>
			<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Keluhan</label>
                  <input type="text"  name="keluhan" class="form-control"  placeholder="keluhan">
								</div>
              </div>
			<div class="box-body">
                <div class="form-group">
				<label for="exampleInputEmail1">Dokter</label>
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
					><select multiple class="form-control" id="obat" name="obat[]" size="7" required>
                <?php
                 $dokter = DB::table('tb_obat')->get();
                ?>
                  <option selected="selected" value="">Pilih Obat</option>
                    @foreach($dokter as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_obat}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
							<input type="hidden" name="poli" class="form-control" id="exampleInputEmail1">
							<input type="hidden" name="id_pasien" class="form-control" id="exampleInputEmail1">
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-fw fa-cart-plus"></i> Update</button>
              </div>
            </form>



      </div>
    </div>
    <!-- /.modal-content -->
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

		$('.table-hover').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: "{{ url('data/poli_gigi') }}",
	        columns: [
	            {data: 'nama_pasien', name: 'nama_pasien'},
              {data: 'nama_poli', name: 'nama_poli'},
	            {data: 'action', name: 'action', orderable: false, searchable: false}
	        ],
          order: [ [0, 'asc'] ]
	    });

	    // Ketika btn tambah di klik
      $('body').on('click','.btn-edit',function(e){
	    	var id = $(this).attr('id-pasien');
	    	$.ajax({
	    		'type':'get',
	    		'url':"{{ url('data/pasien_gigi') }}"+'/'+id,
	    		success: function(data){
	    			console.log(data);
	    			$('#modal-edit').find("input[name='id_pasien']").val(data.id_pasien);
						$('#modal-edit').find("input[name='nama']").val(data.nama_pasien);
						$('#modal-edit').find("input[name='poli']").val(data.nama_poli);
            $('#modal-edit').find("input[name='id_p']").val(data.id);			
						
	    			

	    			var url = "{{ url('data/insert/rekam_medis') }}"+'/';

	    			$('#modal-edit').find('form').attr('action',url);
	    		}
	    	})

	    	$('#modal-edit').modal();
	    })
	})
</script>

@endsection