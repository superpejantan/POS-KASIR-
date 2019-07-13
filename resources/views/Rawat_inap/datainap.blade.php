@extends('layouts.app')
@section('content')
@include('layouts.navbar')
<div class="blog">
  <center><h2>Pasien Rawat Inap</h2></center>
<div class="conteudo">
<table class="table table-hover">
		<thead>
          <tr>
            <th>Pasien</th>
            <th>Ruang Inap</th>
			      <th>Dokter</th>
			      <th>Diagnosa</th>
			      <th>Layanan</th>
			      <th>Tanggal Masuk</th>
						<th>aksi</th>
</tr>
		</thead>         
</table>
</div>
</div>


<div class="modal modal-default fade" id="modal-plng">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Administrasi Rawat Inap</h4>
      </div>
      <div class="modal-body">
        


      		<form role="form" action="{{url('administrasi/rawat/inap')}}" method="POST">
      			{{ csrf_field() }}
              <div class="box-body">
              <input type="text" name="id_p" class="form-control" id="exampleInputEmail1">
              <input type="text" name="id_ruang" class="form-control" id="exampleInputEmail1">
              <input type="hidden" name="harga" class="form-control" id="exampleInputEmail1">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Pasien</label>
                  <input type="nama" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Ruang Inap</label>
                  <input type="text" name="ruang" class="form-control" id="exampleInputEmail1" placeholder="Harga Awal">
                </div>
              </div>
							<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Diagnosa</label>
                  <input type="text" name="diagnosa" class="form-control" id="exampleInputEmail1" >
                </div>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Dokter</label>
                  <input type="text" name="dokter" class="form-control" id="exampleInputEmail1" >
                </div>
              </div>
							<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Layanan</label>
                  <input type="text" name="layanan" class="form-control" id="exampleInputEmail1" >
                </div>
              </div>
							<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Masuk</label>
                  <input type="text" name="tgal1" class="form-control" id="exampleInputEmail1" >
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-fw fa-cart-plus"></i> Update</button>
              </div>
            </form>


        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
    <!--modal-2-->
  <div class="modal modal-default fade" id="modal-obat">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Resep Obat</h4>
        </div>
          <div class="modal-body">
          <form action="{{url('data/obat/pasien')}}" method="POST">
      			{{ csrf_field() }}
            
              <div class="box-body">
              <input type="text" name="id_p" class="form-control" id="exampleInputEmail1">
              <input type="text" name="id" class="form-control" id="exampleInputEmail1">
              <input type="text" name="id_ruang" class="form-control" id="exampleInputEmail1">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Ruangan</label>
                  <input type="text" name="ruang" class="form-control" id="exampleInputEmail1">
                </div>
              </div> 
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Obat</label>
                  <select multiple class="form-control" id="obat" name="obat[]" size="7" required>
                <?php
                 $dokter = DB::table('tb_obat')->get();
                ?>
                  <option selected="selected" value="">Pilih Obat</option>
                    @foreach($dokter as $p)
                    <option value="{{ $p->id }}">{{ $p->nama_obat}}</option>
                    @endforeach
                  </select>
                </div>
                
							
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-fw fa-cart-plus"></i> Update</button>
              </div>
            </form>


  </div>
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

		$('.table-hover').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: "{{ url('data/rawatinap') }}",
	        columns: [
	            {data: 'nama_pasien', name: 'nama_pasien'},
				      {data: 'ruang_inap', name: 'ruang_inap'},
	            {data: 'dokter', name: 'dokter'},
              {data: 'diagnosa', name: 'diagnosa'},
				      {data: 'layanan', name: 'layanan'},
				      {data: 'tgl_masuk', name: 'tgl_masuk'},
	            {data: 'action', name: 'action', orderable: false, searchable: false}
	        ],
          order: [ [0, 'asc'] ]
	    });

	    // Ketika btn tambah di klik
	    $('.btn-tambah').click(function(e){
	    	e.preventDefault();
	    	$('#modal-tambah').modal();
	    });

      //btn obat
      $('body').on('click','.btn-obat',function(e){
	    	var id = $(this).attr('id-pasien');
	    	$.ajax({
	    		'type':'get',
	    		'url':"{{ url('data/inap/get') }}"+'/'+id,
	    		success: function(data){
	    			console.log(data);
            $('#modal-obat').find("input[name='id_p']").val(data.id_pasien);
            $('#modal-obat').find("input[name='id']").val(data.id);
	    			$('#modal-obat').find("input[name='nama']").val(data.nama_pasien);
            $('#modal-obat').find("input[name='ruang']").val(data.nama_ruangan);
            $('#modal-obat').find("input[name='id_ruang']").val(data.id_ruangan);
            $('#modal-obat').find("input[name='dokter']").val(data.nama_dokter);
            $('#modal-plng').find("input[name='diagnosa']").val(data.diagnosa);
            $('#modal-plng').find("input[name='layanan']").val(data.layanan);
            $('#modal-plng').find("input[name='tanggal']").val(data.tgl_masuk);

	    		}
	    	})

	    	$('#modal-obat').modal();
	    })

	    // Button edit di klik
	    $('body').on('click','.btn-plng',function(e){
	    	var id = $(this).attr('id-pasien');
	    	$.ajax({
	    		'type':'get',
	    		'url':"{{ url('data/inap/get') }}"+'/'+id,
	    		success: function(data){
	    			console.log(data);
            $('#modal-plng').find("input[name='id']").val(data.id);
            $('#modal-plng').find("input[name='id_p']").val(data.id_pasien);
	    			$('#modal-plng').find("input[name='nama']").val(data.nama_pasien);
            $('#modal-plng').find("input[name='ruang']").val(data.nama_ruangan);
            $('#modal-plng').find("input[name='id_ruang']").val(data.id_ruangan);
            $('#modal-plng').find("input[name='dokter']").val(data.nama_dokter);
            $('#modal-plng').find("input[name='diagnosa']").val(data.diagnosa);
            $('#modal-plng').find("input[name='layanan']").val(data.layanan);
            $('#modal-plng').find("input[name='harga']").val(data.harga);
            $('#modal-plng').find("input[name='tgal1']").val(data.tgl_masuk);

	    		}
	    	})

	    	$('#modal-plng').modal();
	    })
	})
</script>

@endsection