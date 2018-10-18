<!-- index.blade.php -->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>List Nilai</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>


</head>
<body>

  <div class="container">

    <br />
    @if (\Session::has('success'))
    <div class="alert alert-success">
      <p>{{ \Session::get('success') }}</p>
    </div><br />
    @endif
    <h2>List Nilai Pegawai</h2><br/>
    <a href="{{action('PenilaianController@create')}}" class="btn btn-primary">Tambah</a>
    <div class="col-md-12"></div>

    <div class="table-responsive mt-3">
     <table class="table table-bordered table table-hover table table-sm">
      <thead class="thead-dark">
        <tr>
          <th class="text-center" colspan="2" >Action</th>
          <th>Nip</th>
          <th>Tahun</th>
          <th>Bulan</th>
          <th>Jumlah_Hari_Kerja</th>
          <th>Hadir</th>
          <th>Izin</th>
          <th>Sakit</th>
          <th>Cuti</th>
          <th>Tanpa_Alasan_Sah</th>
          <th>Terlambat</th>
          <th>Cepat_Pulang</th>
          <th>UWAS</th>
          <th>Upacara</th>
          <th>Wirid</th>
          <th>Apel</th>
          <th>Senam</th>
          <th>Orientasi_Pelayanan</th>
          <th>Integritas</th>
          <th>Kerja_Sama</th>
          <th>Kepemimpinan</th>
          <th>LKH</th>
          <th>SOP</th>
          <th>SKP</th>
          <th>~~~Hasil~~~</th>
          <th>Komitmen</th>
          <th>Disiplin</th>
          <th>Prilaku_Kerja</th>
          <th>Sasaran_Kerja_Pegawai</th>
          <th>Penilaian_Prestasi_Kerja</th>
          <th>TPP_Maksimal</th>
          <th>Kinerja</th>
          <th>Kehadiran</th>
          <th>TPP_Bulan_Ini</th>
         


        </tr>
      </thead>
      <tbody>

        @foreach($penilaian as $penilaian)
        <tr>
          <td align="right"><a href="{{action('PenilaianController@edit', $penilaian->nip)}}" class="btn btn-warning">Edit</a></td>
          <td align="left">
            <form action="{{action('PenilaianController@destroy', $penilaian->nip)}}" method="post">
              @csrf
              <input name="_method" type="hidden" value="DELETE">
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td>
          <td>{{$penilaian->nip}}</td>
          <td>{{$penilaian->tahun}}</td>
          <td>{{$penilaian->bulan}}</td>
          <td>{{$penilaian->jumlah_hari_kerja}}</td>
          <td>{{$penilaian->hadir}}</td>
          <td>{{$penilaian->izin}}</td>
          <td>{{$penilaian->sakit}}</td>
          <td>{{$penilaian->cuti}}</td>
          <td>{{$penilaian->tanpa_alasan_sah}}</td>
          <td>{{$penilaian->terlambat}}</td>
          <td>{{$penilaian->cepat_pulang}}</td>
          <td>{{$penilaian->uwas}}</td>
          <td>{{$penilaian->upacara}}</td>
          <td>{{$penilaian->wirid}}</td>
          <td>{{$penilaian->apel}}</td>
          <td>{{$penilaian->senam}}</td>
          <td>{{$penilaian->orientasi_pelayanan}}</td>
          <td>{{$penilaian->integritas}}</td>
          <td>{{$penilaian->kerja_sama}}</td>
          <td>{{$penilaian->kepemimpinan}}</td>
          <td>{{$penilaian->lkh}}</td>
          <td>{{$penilaian->sop}}</td>
          <td>{{$penilaian->skp}}</td>
          <td></td>
          <td>{{$penilaian->komitmen}}</td>
          <td>{{$penilaian->disiplin}}</td>
          <td>{{$penilaian->prilaku_kerja}}</td>
          <td>{{$penilaian->sasaran_kerja_pegawai}}</td>
          <td>{{$penilaian->penilaian_prestasi_kerja}}</td>
          <td>{{$penilaian->tpp_maksimal}}</td>
          <td>{{$penilaian->kinerja}}</td>
          <td>{{$penilaian->kehadiran}}</td>
          <td>{{$penilaian->tpp_bulan_ini}}</td>




        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  
</div>
</body>
</html>