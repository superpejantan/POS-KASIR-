@extends('layouts.app')
@section('content')
@include('layouts.navbar')

<div class="blog">
<div class="container">
<table class="table table-hover">
		<thead>
            <tr>
            <th>Pasien</th>
            <th>Ruang Poli</th>
            <th>aksi</th>
		</thead>
        <tbody>

        @foreach($pobat as $ob)
        
        
        <td>
        <ul>
        @foreach($ob->nama_obat as $o)
        <li>{{$o->nama_obat}}</li>
        @endforeach
        </ul>
        </td>
        </tbody>
        </tr>

            @endforeach
          
            
</table>
</div>
</div>
@endsection