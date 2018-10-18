<!-- index.blade.php -->
 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>List Pegawai</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>

    <div class="container">

    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
      <h2>List Pegawai</h2><br/>
     <a href="{{action('PegawaiController@create')}}" class="btn btn-primary">Tambah</a>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Nip</th>
        <th>Nama</th>
        <th>Pangkat</th>
        <th>Jabatan</th>
      </tr>
    </thead>
    <tbody>
 
      @foreach($pegawai as $pegawai)
      <tr>
        <td>{{$pegawai['nip']}}</td>
        <td>{{$pegawai['nama']}}</td>
        <td>{{$pegawai['pangkat']}}</td>
        <td>{{$pegawai['jabatan']}}</td>
 
        <td align="right"><a href="{{action('PegawaiController@edit', $pegawai['nip'])}}" class="btn btn-warning">Edit</a></td>
        <td align="left">
          <form action="{{action('PegawaiController@destroy', $pegawai['nip'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>