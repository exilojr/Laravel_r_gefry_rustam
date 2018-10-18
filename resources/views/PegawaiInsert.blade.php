<!-- PegawaiInsert.blade.php -->
 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tambahan Penghasilan Pegawai</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  </head>
  <body>
    <div class="container">
      <h2>Input Pegawai</h2><br/>
      <form method="post" action="{{url('pegawai')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-4">
            <label for="Nip">Nip :</label>
            <input type="text" class="form-control" name="nip">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-4">
            <label for="Nama">Nama :</label>
            <input type="text" class="form-control" name="nama">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-4">
            <label for="Pangkat">Pangkat :</label>
            <select class="form-control" id="pangkat" name="pangkat">
              <option value="Eselon II">Eselon II</option>
              <option value="Eselon III">Eselon III</option>
              <option value="Eselon IV">Eselon IV</option>
              <option value="Golongan II">Golongan II</option>
              <option value="Golongan III">Golongan III</option>
              <option value="Golongan IV">Golongan IV</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12"></div>
          <div class="form-group col-md-4">
            <label for="Jabatan">Jabatan :</label>
            <input type="text" class="form-control" name="jabatan">
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