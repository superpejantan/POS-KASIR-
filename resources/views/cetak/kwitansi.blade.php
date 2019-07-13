<html>
<head>
	<title>Rawat Inap</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}

		.box-1{
			width: 500px;
			height: 400px;
			border: solid 1px;
			margin-left: 110px;
			margin-bottom: 40px;

		}
.col-25 {
  float: left;
  width: 25%;
  margin-top: 16px;
  margin-left: 15px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 16px;
  margin-left: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

	</style>
	<center>
		<h5>Administrasi Rawat Inap</h4>
		<h6>Puskesmas Seger</h5>
	</center>
	@foreach($rawat_inap as $p)
	<div class="box-1">
	<div class="row">
    	<div class="col-25">
     		 <label for="fname">Nama Pasien</label>
    		</div>
    	<div class="col-75">
      		{{$p->nama_pasien}}
    		</div>
  			</div>
  		<div class="row">
    	<div class="col-25">
      		<label for="lname">Alamat</label>
    	</div>
    	<div class="col-75">
      		{{$p->alamat}}
    	</div>
		</div>
		<div class="row">
    	<div class="col-25">
      		<label for="lname">Diagnosa</label>
    	</div>
    	<div class="col-75">
			{{$p->diagnosa}}
    	</div>
  		</div>
		  <div class="row">
    	<div class="col-25">
      		<label for="lname">Dokter</label>
    	</div>
    	<div class="col-75">
      		{{$p->dokter}}
    	</div>
  		</div>
		  <div class="row">
    	<div class="col-25">
      		<label for="lname">Tanggal Masuk</label>
    	</div>
    	<div class="col-75">
      		{{$p->tgal_masuk}}
    	</div>
  		</div>
		  <div class="row">
    	<div class="col-25">
      		<label for="lname">Tanggal Pulang</label>
    	</div>
    	<div class="col-75">
      		{{$p->tgal_pulang}}
    	</div>
  		</div>
		  <div class="row">
    	<div class="col-25">
      		<label for="lname">Layanan</label>
    	</div>
    	<div class="col-75">
      		{{$p->layanan}}
    	</div>
  		</div>
		  <div class="row">
    	<div class="col-25">
      		<label for="lname">Total Administrasi</label>
    	</div>
    	<div class="col-75">
      		{{$p->pembayaran}}
    	</div>
  		</div>
		</div>
		@endforeach
		</br>
		</br>
		</br>
</body>
</html>