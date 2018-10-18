<!-- edit.blade.php -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>EDIT Pegawai</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <h2>Update Pegawai</h2><br  />
        <form method="post" action="{{action('PegawaiController@update', $nip)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-4">
            <label for="nip">Nip :</label>
            <input type="text" class="form-control" name="nip" value="{{$pegawai->nip}}" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-4">
            <label for="Nama">Nama :</label>
            <input type="text" class="form-control" name="nama" value="{{$pegawai->nama}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-4">
            <label for="Pangkat">Pangkat :</label>
            <select class="form-control" id="pangkat" name="pangkat">
              <option value="Eselon II" {{ $pegawai->pangkat === "Eselon II" ? 'selected' : '' }} >Eselon II</option>
              <option value="Eselon III" {{ $pegawai->pangkat === "Eselon III" ? 'selected' : '' }} >Eselon III</option>
              <option value="Eselon IV" {{ $pegawai->pangkat === "Eselon IV" ? 'selected' : '' }} >Eselon IV</option>
              <option value="Golongan II" {{ $pegawai->pangkat === "Golongan II" ? 'selected' : '' }} >Golongan II</option>
              <option value="Golongan III" {{ $pegawai->pangkat === "Golongan III" ? 'selected' : '' }} >Golongan III</option>
              <option value="Golongan IV" {{ $pegawai->pangkat === "Golongan IV" ? 'selected' : '' }} >Golongan IV</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-4">
            <label for="Jabatan">Jabatan :</label>
            <input type="text" class="form-control" name="jabatan" value="{{$pegawai->jabatan}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-12" style="margin-top:10px">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>