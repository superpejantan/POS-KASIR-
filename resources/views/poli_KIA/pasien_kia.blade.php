@extends('layouts.app')
@section('content')
@include('layouts.navbar')
<div class="blog">
  <center><h2>Pasien Poli KIA</h2></center>
<div class="conteudo">
<table class="table table-hover">
		
					<tr>
						<th>Nama pasien</th>
						<th >Poli</th>
						<th>diagnosa</th>
						<th>Action</th>
						
				</thead>
				<tbody>
					
					@foreach($pasien as $p)

						
						<td>{{$p->nama_pasien}}</td>
						<td>{{$p->nama_poli}}</td>
						<td>
					<a href="{{url('hapus/pasien',$p->id_pasien)}}" class="btn btn-danger">Hapus</a>		
					<a href="{{url('edit',$p->id_pasien)}}" class="btn btn-warning">Update</a>
						<a href="{{url('show',$p->id_pasien)}}" class="btn btn-warning">Show</a>
                        
						</form>
</td>
						</td>
				</tr>
					@endforeach
					
                    
					
				

				</tbody>
				
			
			</table>
    <!-- /.modal-content -->
  </div>

@endsection
@section('scripts')
<script type="text/javascript">

	$(document).ready(function(){
		$('#myTable').DataTable()


	});
</script>
@endsection