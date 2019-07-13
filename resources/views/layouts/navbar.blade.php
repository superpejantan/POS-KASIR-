<header>
  <h1>PUSKESMAS SEGER WARAS</h1>
</header>
 <div class="leftcolumn">
   <nav class="navigation">
  <ul class="mainmenu">
  <li><a href="">REGISTER</a>
      <ul class="submenu">
        <li><a href="{{route('registerpasien.index')}}">Pendaftaran Pasien</a></li>
      </ul>
    </li>
    <li><a href="{{url('/')}}">Home</a></li>
    <li><a href="">ADMINISTRASI</a><li>
    <li><a href="{{ route('polikia.index')}}">POLI KIA</a>
      <ul class="submenu">
        <li><a href="{{url('pasien/kia')}}">Daftar Pasien KIA</a></li>
      </ul>
    </li>
    <li><a href="{{ route('poliumum.index') }}">POLI UMUM</a>
      <ul class="submenu">
        <li><a href="{{url('poliumum/daftar/pasien')}}">Daftar pasien Umum</a></li>
      </ul>
    </li>
    <li><a href="{{ route('poligigi.index')}}">POLI GIGI</a>
      <ul class="submenu">
        <li><a href="{{url('pasien')}}">Daftar Pasien Gigi</a></li>
      </ul>
    <li>
    <li><a href="{{ url('/obat/poli-umum')}}">FARMASI</a></li>
    <li><a href="{{ url('pasien-igd')}}">Unit Gawat Darurat</a></li>
    <li><a href="{{route('rawatinap.index')}}">Rawat Inap</a></li>

    <li><a href="">Contact us</a></li>
    <li><a href="{{url('keluar')}}">log out</a>
    <ul class="submenu">
        <li><a href="">Dewasa</a></li>
        <li><a href="">Remaja</a></li>
        <li><a href="">Anak-Anak</a></li>
        <li><a href="">Balita</a></li>
      </ul>
    </li>
  </ul>
</nav>
</div>

