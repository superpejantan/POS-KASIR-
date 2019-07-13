@extends('layouts.app')
@section('content')
@include('layouts.navbar')

		<div class="blog">
			<div class="bar">
    			<ul>
        			<li><a href="{{url('obat/poli-umum')}}">Pasien Umum</a></li>
        			<li><a href="{{url('obat/poli-gigi')}}">Pasien Poli Gigi</a></li>
					<li><a href="{{url('obat/poli-kia')}}">Pasien Poli Kia</a></li>
					<li><a href="{{url('obat/rawat-inap')}}">Pasien Rawat Inap</a></li> 
    			</ul>
			</div>
			<div class="conteudo">
				<table class="table table-striped" id="myTable">
					<thead>
						<tr>
							
							<th>Obat</th>
							<th width="1%">Jumlah</th>
						</tr>
					</thead>
					<tbody>
						@foreach($obat as $a)
						
							<td>
								<ul>
									@foreach($a->n_obat as $h)
									<li>
									{{$h->nama_obat}}
								</li>
									@endforeach
								</ul>
							</td>
							<td class="text-center">{{ $a->n_obat->count()}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
@endsection
@section('scripts')


<script type="text/javascript">

	$(document).ready(function(){
		$('#myTable').DataTable()


	});
</script>

@endsection