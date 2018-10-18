<!-- PegawaiInsert.blade.php -->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tambahan Penghasilan Pegawai</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">

  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  


</head>
<body>
  <div class="container">

    <h2>Edit Penilaian</h2><br/>
    <form method="post" action="{{action('PenilaianController@update', $nip)}}">
      @csrf

      <input name="_method" type="hidden" value="PATCH">
      

      <div class="row mt-3 bg-dark text-white">
        <div class="col-md-12"></div>
        <div class="form-group col-md-4">
          <label for="nip">Nip / Nama:</label>
          <input type="text" class="form-control" name="nip" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')" oninput="setCustomValidity('')" value="{{$penilaian->nip}}" readonly="">

        </div>
      </div>

      <div class="row mt-3 bg-primary text-white" >
        <div class="col-md-12"></div>
        <div class="form-group col-md-6">
          <label for="tahun">Tahun :</label>
          <input type="text" class="form-control" name="tahun" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')" oninput="setCustomValidity('')" value="{{$penilaian->tahun}}">
        </div>
        <div class="form-group col-md-6">
          <label for="bulan">bulan :</label>
          <input type="text" class="form-control" name="bulan" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')" oninput="setCustomValidity('')" value="{{$penilaian->bulan}}">
        </div>
      </div>

      

      <div class="row mt-3 bg-secondary text-white">
        <div class="col-md-12"></div>
        <div class="form-group col-md-4">
          <label for="jumlah_hari_kerja">Jumlah Hari Kerja :</label>
          <input type="number" class="form-control" name="jumlah_hari_kerja" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{$penilaian->jumlah_hari_kerja}}">
        </div>
        <div class="form-group col-md-4">
          <label for="hadir">Hadir :</label>
          <input type="number" class="form-control" name="hadir" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{$penilaian->hadir}}">
        </div>
        <div class="form-group col-md-4">
          <label for="izin">Izin :</label>
          <input type="number" class="form-control" name="izin" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')"  value="{{$penilaian->izin}}">
        </div>
        <div class="form-group col-md-4">
          <label for="sakit">Sakit :</label>
          <input type="number" class="form-control" name="sakit" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{$penilaian->sakit}}">
        </div>
        <div class="form-group col-md-4">
          <label for="cuti">Cuti :</label>
          <input type="number" class="form-control" name="cuti" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{$penilaian->cuti}}">
        </div>
        <div class="form-group col-md-4">
          <label for="tanpa_alasan_sah">Tanpa Alasan Yang Sah :</label>
          <input type="number" class="form-control" name="tanpa_alasan_sah" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{$penilaian->tanpa_alasan_sah}}">
        </div>
      </div>

      <div class="row mt-3 bg-success text-white">
        <div class="col-md-12"></div>
        <div class="form-group col-md-4">
          <label for="terlambat">Terlambat ( Menit ) :</label>
          <input type="number" class="form-control" name="terlambat" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{$penilaian->terlambat}}">
        </div>
        <div class="form-group col-md-4">
          <label for="cepat_pulang">Cepat Pulang ( Menit ) :</label>
          <input type="number" class="form-control" name="cepat_pulang" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{$penilaian->cepat_pulang}}">
        </div>
        <div class="form-group col-md-4">
          <label for="lkh">Lembur Kerja Harian (Menit) :</label>
          <input type="number" class="form-control" name="lkh" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{$penilaian->lkh}}">
        </div>
      </div>
      
      <div class="row mt-3 bg-danger text-white">
        <div class="col-md-12"></div>
        <div class="form-group col-md-4">
          <label for="uwas">UWAS :</label>
          <input type="number" class="form-control" name="uwas" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{$penilaian->uwas}}">
        </div>
        <div class="form-group col-md-4">
          <label for="upacara">Upacara :</label>
          <input type="number" class="form-control" name="upacara" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{$penilaian->upacara}}">
        </div>
        <div class="form-group col-md-4">
          <label for="wirid">Wirid :</label>
          <input type="number" class="form-control" name="wirid" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{$penilaian->wirid}}">
        </div>
        <div class="form-group col-md-4">
          <label for="apel">Apel :</label>
          <input type="number" class="form-control" name="apel" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{$penilaian->apel}}">
        </div>
        <div class="form-group col-md-4">
          <label for="senam">Senam :</label>
          <input type="number" class="form-control" name="senam" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{$penilaian->senam}}">
        </div>
      </div>

      


      <div class="row mt-3 bg-info text-white">
        <div class="col-md-12"></div>
        <div class="form-group col-md-4">
          <label for="orientasi_pelayanan">Orientasi Pelayanan (1-100) :</label>
          <input type="number" class="form-control" name="orientasi_pelayanan" required=""  value="{{$penilaian->orientasi_pelayanan}}" min="1" max="100">
        </div>
        <div class="form-group col-md-4">
          <label for="integritas">Integritas (1-100):</label>
          <input type="number" class="form-control" name="integritas" required="" value="{{$penilaian->integritas}}" min="1" max="100">
        </div>
        <div class="form-group col-md-4">
          <label for="skp">Sasaran Kerja Pegawai (1-100) :</label>
          <input type="number" class="form-control" name="skp" required=""  value="{{$penilaian->skp}}" min="1" max="100">
        </div>
        <div class="form-group col-md-4">
          <label for="kerja_sama">Kerja Sama (1-100) :</label>
          <input type="number" class="form-control" name="kerja_sama" required="" value="{{$penilaian->kerja_sama}}" min="1" max="100">
        </div>
        <div class="form-group col-md-4">
          <label for="kepemimpinan">Kepemimpinan (1-100) :</label>
          <input type="number" class="form-control" name="kepemimpinan" required=""  value="{{$penilaian->kepemimpinan}}" min="1" max="100">
        </div>
        <div class="form-group col-md-4">
          <label for="sop">SOP (1-100) :</label>
          <input type="number" class="form-control" name="sop" required="" value="{{$penilaian->sop}}" min="1" max="100">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12"></div>
        <div class="form-group col-md-4" style="margin-top:10px">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </div>
    </form>
  </div>


</body>
</html>