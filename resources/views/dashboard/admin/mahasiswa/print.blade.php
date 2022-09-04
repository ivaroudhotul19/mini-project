<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Mahasiswa</title>
    <style>
      h2{
        text-align: center;
        text-transform: uppercase;
      }
      h3{
        text-align: left;
        margin-left: 35px
      }
      table{
        border-collapse: collapse;
        width: 90%;
        margin-left:auto;
        margin-right:auto;
      }
      p{
        text-align: left;
        margin-top: -10px;
        margin-bottom: 20px
      }
      .name{
        margin-top: -10px;
      }
      .nomor {
        text-align: center
      }
      table, th, td {
        border: 1px solid black;
      }
      th, td {
        display: table-cell;
        padding: 5px 5px 5px 5px;
      } 
      th {
        background-color: #222f3e;
        color: white;
      }
      .footer{
        text-align: left;
        margin-left: 35px;
        margin-top: 20px;
      }
    </style>
</head>
<body>
    <div class="row" id="table-bordered">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title">Sistem Informasi Akademik</h2>
              <hr width="90%" align="center">
              <h3>Laporan Data Mahasiswa</h3>
              <p style="margin-left: 35px">Date : {{ date('d M Y') }}</p>
            </div>
            <div class="card-content">
              <div class="table-responsive">
                <table class="table table-bordered mb-0">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($mahasiswa as $siswa)   
                        <tr>
                            <td class="nomor" width="5px">{{ $loop->iteration }}</td>
                            <td width="7px">{{ $siswa->user->username }}</td>
                            <td width="7px">{{ $siswa->user->email }}</td>
                            <td>{{ $siswa->nim }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->alamat }}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <p class="footer">Copyright : {{ date('Y') }} &copy; Iva Roudhotul Rohmah</p>
</body>
</html>