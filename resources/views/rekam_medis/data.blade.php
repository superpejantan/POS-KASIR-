@extends('layouts.app')
@section('content')
@include('layouts.navbar')
<div class="blog">
<div class="conteudo">
<table class="table table-hover">
    <thead>
            <tr>
            <th>Pasien</th>
            <th>Keluhan</th>
            <th>Dokter</th>
            <th>Ruang Poli</th>
            <th>Diagnosa</th>
            <th>Tanggal Periksa</th>
            <th>Aksi</th>
</thead>
</table>
</div>
</div>
@endsection
@section('scripts')

<script type="text/javascript">
	

	$('.table-hover').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: "{{url('data/pasien/rekam_medis')}}",
	        columns: [
	            {data: 'nama_pasien', name: 'nama_pasien'},
	            {data: 'keluhan', name: 'keluhan'},
                {data: 'nama_dokter', name: 'diagnosa'},
                {data: 'nama_poli', name: 'nama_poli'},
                {data: 'diagnosa', name: 'diagnosa'},
                {data: 'tanggal_prksa', name: 'tanggal_prksa'},
	            {data: 'action', name: 'action', orderable: false, searchable: false}
	        ],
          order: [ [0, 'asc'] ]
	    });

	
</script>

@endsection