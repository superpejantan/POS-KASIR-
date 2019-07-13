@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<div class="blog">
<div class="conteudo">
<table class="table table-hover">
		<thead>
            <tr>
            <th>Nama Pasien</th>
            <th>Jenis Kelamin</th>
            <th>Ruang Poli</th>
            <th>Alamat</th>
            <th>aksi</th>
		</thead>
           
</table>
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
	        ajax: "{{ url('data/pasien') }}",
	        columns: [
	            {data: 'nama_pasien', name: 'nama_pasien'},
				{data: 'j_kelamin', name:'j_kelamin'},
	            {data: 'nama_poli', name: 'nama_poli'},
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

	    // Button edit di klik
	    $('body').on('click','.btn-edit',function(e){
	    	var id = $(this).attr('barang-id');
	    	$.ajax({
	    		'type':'get',
	    		'url':"{{ url('admin/barang/get') }}"+'/'+id,
	    		success: function(data){
	    			console.log(data);
	    			$('#modal-edit').find("input[name='nama']").val(data.nama);
	    			$('#modal-edit').find("input[name='harga_awal']").val(data.harga_awal);
	    			$('#modal-edit').find("input[name='discount']").val(data.discount);

	    			var url = "{{ url('admin/barang') }}"+'/'+id;

	    			$('#modal-edit').find('form').attr('action',url);
	    		}
	    	})

	    	$('#modal-edit').modal();
	    })
	})
</script>

@endsection