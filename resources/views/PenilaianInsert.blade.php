<!-- PegawaiInsert.blade.php -->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tambahan Penghasilan Pegawai</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">

  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
  <script src="{{asset('js/select2.min.js')}}"></script>


</head>
<body>
  <div class="container">
    @if (session('alert'))
    <div class="alert alert-danger">
      {{ session('alert') }}
    </div>
    @endif
    <h2>Input Penilaian</h2><br/>
    <form method="post" action="{{url('penilaian')}}" enctype="multipart/form-data">
      @csrf

      

      <div class="row mt-3 bg-dark text-white">
        <div class="col-md-12"></div>
        <div class="form-group col-md-4">
          <label for="nip">Nip / Nama:</label>
          <select class="nip form-control"  id=nip name="nip"></select>

        </div>
      </div>

      <div class="row mt-3 bg-primary text-white" >
        <div class="col-md-12"></div>
        <div class="form-group col-md-6">
          <label for="tahun">Tahun :</label>
          <input type="text" class="form-control" name="tahun" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')" oninput="setCustomValidity('')" value="{{ old('tahun') }}">
        </div>
        <div class="form-group col-md-6">
          <label for="bulan">bulan :</label>
          <input type="text" class="form-control" name="bulan" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')" oninput="setCustomValidity('')" value="{{ old('bulan') }}">
        </div>
      </div>

      
      
      <div class="row mt-3 bg-secondary text-white">
        <div class="col-md-12"></div>
        <div class="form-group col-md-4">
          <label for="jumlah_hari_kerja">Jumlah Hari Kerja :</label>
          <input type="number" class="form-control" name="jumlah_hari_kerja" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{ old('jumlah_hari_kerja') }}">
        </div>
        <div class="form-group col-md-4">
          <label for="hadir">Hadir :</label>
          <input type="number" class="form-control" name="hadir" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{ old('hadir') }}">
        </div>
        <div class="form-group col-md-4">
          <label for="izin">Izin :</label>
          <input type="number" class="form-control" name="izin" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')"  value="{{ old('izin') }}">
        </div>
        <div class="form-group col-md-4">
          <label for="sakit">Sakit :</label>
          <input type="number" class="form-control" name="sakit" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{ old('sakit') }}">
        </div>
        <div class="form-group col-md-4">
          <label for="cuti">Cuti :</label>
          <input type="number" class="form-control" name="cuti" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{ old('cuti') }}">
        </div>
        <div class="form-group col-md-4">
          <label for="tanpa_alasan_sah">Tanpa Alasan Yang Sah :</label>
          <input type="number" class="form-control" name="tanpa_alasan_sah" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{ old('tanpa_alasan_sah') }}">
        </div>
      </div>

      <div class="row mt-3 bg-success text-white">
        <div class="col-md-12"></div>
        <div class="form-group col-md-4">
          <label for="terlambat">Terlambat ( Menit ) :</label>
          <input type="number" class="form-control" name="terlambat" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{ old('terlambat') }}">
        </div>
        <div class="form-group col-md-4">
          <label for="cepat_pulang">Cepat Pulang ( Menit ) :</label>
          <input type="number" class="form-control" name="cepat_pulang" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{ old('cepat_pulang') }}">
        </div>
        <div class="form-group col-md-4">
          <label for="lkh">Lembur Kerja Harian (Menit) :</label>
          <input type="number" class="form-control" name="lkh" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{ old('lkh') }}">
        </div>
      </div>
      
      <div class="row mt-3 bg-danger text-white">
        <div class="col-md-12"></div>
        <div class="form-group col-md-4">
          <label for="uwas">UWAS :</label>
          <input type="number" class="form-control" name="uwas" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{ old('uwas') }}">
        </div>
        <div class="form-group col-md-4">
          <label for="upacara">Upacara :</label>
          <input type="number" class="form-control" name="upacara" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{ old('upacara') }}">
        </div>
        <div class="form-group col-md-4">
          <label for="wirid">Wirid :</label>
          <input type="number" class="form-control" name="wirid" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{ old('wirid') }}">
        </div>
        <div class="form-group col-md-4">
          <label for="apel">Apel :</label>
          <input type="number" class="form-control" name="apel" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{ old('apel') }}">
        </div>
        <div class="form-group col-md-4">
          <label for="senam">Senam :</label>
          <input type="number" class="form-control" name="senam" required="" oninvalid="this.setCustomValidity('Kolom Ini Harus Di Isi !')"
          oninput="setCustomValidity('')" value="{{ old('senam') }}">
        </div>
      </div>
      
      
      
      
      <div class="row mt-3 bg-info text-white">
        <div class="col-md-12"></div>
        <div class="form-group col-md-4">
          <label for="orientasi_pelayanan">Orientasi Pelayanan (1-100) :</label>
          <input type="number" class="form-control" name="orientasi_pelayanan" required=""  value="{{ old('orientasi_pelayanan') }}" min="1" max="100">
        </div>
        <div class="form-group col-md-4">
          <label for="integritas">Integritas (1-100):</label>
          <input type="number" class="form-control" name="integritas" required="" value="{{ old('integritas') }}" min="1" max="100">
        </div>
        <div class="form-group col-md-4">
          <label for="skp">Sasaran Kerja Pegawai (1-100) :</label>
          <input type="number" class="form-control" name="skp" required=""  value="{{ old('skp') }}" min="1" max="100">
        </div>
        <div class="form-group col-md-4">
          <label for="kerja_sama">Kerja Sama (1-100) :</label>
          <input type="number" class="form-control" name="kerja_sama" required="" value="{{ old('kerja_sama') }}" min="1" max="100">
        </div>
        <div class="form-group col-md-4">
          <label for="kepemimpinan">Kepemimpinan (1-100) :</label>
          <input type="number" class="form-control" name="kepemimpinan" required=""  value="{{ old('kepemimpinan') }}" min="1" max="100">
        </div>
        <div class="form-group col-md-4">
          <label for="sop">SOP (1-100) :</label>
          <input type="number" class="form-control" name="sop" required="" value="{{ old('sop') }}" min="1" max="100">
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

  <script type="text/javascript">


    $('.nip').select2({
      placeholder: 'Masukkan Nama Pegawai',
      ajax: {
        url: '/select2-autocomplete-ajax',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
          return {
            results:  $.map(data, function (item) {
              return {
                text: item.nip+" / "+item.nama,
                id: item.nip
              }
            })
          };
        },
        cache: true
      }
    });


  </script>
</body>
</html>