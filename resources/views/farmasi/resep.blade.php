@extends('layouts.app')
@section('content')
@include('layouts.navbar')
<div class="blog">
			<div class="conteudo">
				<table>
					<thead>
						<tr>
							<th>Nama Pengguna</th>
							<th>Hadiah</th>
							<th width="1%">Jumlah</th>
						</tr>
					</thead>
					<tbody>
						@foreach($resep as $a)
                        <td>{{$a->obat_id}}</td>
						
					</tbody>
                    @endforeach
				</table>
                
			</div>
		</div>

@endsection
