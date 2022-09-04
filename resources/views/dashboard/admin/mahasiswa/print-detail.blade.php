<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Laporan Data Mahasiswa {{ $mahasiswa->nama }}</title>
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
        border: 1px solid #222f3e;
        margin-bottom: 15px;
        margin-top: 15px;
      }
      th, td {
        display: table-cell;
        padding: 5px 5px 5px 5px;
      } 
      th {
        background-color: #222f3e;
        color: white;
        text-align: left;
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
              <h3>Data Mahasiswa {{ $mahasiswa->nama }}</h3>
              <p style="margin-left: 35px">Date : {{ date('d M Y') }}</p>
            </div>
            <div class="card-content">
              <div class="table-responsive">
                <table class='table table-striped'>
                  <tr>
                      <th style="width: 30%" >Usernam</th>
                      <th style="width: 3%">:</th>
                      <td>{{ $mahasiswa->user->username }}</td>
                  </tr>
                  <tr>
                      <th style="width: 30%" >Email</th>
                      <th style="width: 3%">:</th>
                      <td>{{ $mahasiswa->user->email }}</td>
                  </tr>
                  <tr>
                      <th style="width: 30%" >Nim</th>
                      <th style="width: 3%">:</th>
                      <td>{{ $mahasiswa->nim }}</td>
                  </tr>
                  <tr>
                      <th style="width: 30%" >Nama</th>
                      <th style="width: 3%">:</th>
                      <td>{{ $mahasiswa->nama }}</td>
                  </tr>
                  <tr>
                      <th style="width: 30%" >Foto</th>
                      <th style="width: 3%">:</th>
                      <td>
                        @if($mahasiswa->image)
                          <img src="data:image/png;base64, {{ $img_to_base64 }}" alt="foto_siswa" 
                          class="img-fluid" width="200px">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                      </td>
                  </tr>
                  <tr>
                      <th style="width: 30%" >Tempat Lahir</th>
                      <th style="width: 3%">:</th>
                      <td>{{ $mahasiswa->tmpt_lahir }}</td>
                  </tr>
                  <tr>
                      <th style="width: 30%" >Tanggal Lahir</th>
                      <th style="width: 3%">:</th>
                      <td>{{ date('d M Y',strtotime($mahasiswa->tgl_lahir)) }}</td>
                  </tr>
                  <tr>
                      <th style="width: 30%" >Jenis Kelamin</th>
                      <th style="width: 3%">:</th>
                      <td>{{ $mahasiswa->jns_kelamin }}</td>
                  </tr>
                  <tr>
                      <th style="width: 30%" >Alamat</th>
                      <th style="width: 3%">:</th>
                      <td>{{ $mahasiswa->alamat }}</td>
                  </tr>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <p class="footer">Copyright : {{ date('Y') }} &copy; Iva Roudhotul Rohmah</p>
</body>
</html>