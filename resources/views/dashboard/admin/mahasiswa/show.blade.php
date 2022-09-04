@extends('dashboard.layouts.main')

@section('title')
    Detail Mahasiswa {{ $mahasiswa->nama }}
@endsection

@section('container')
<section id="input-style">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Data Mahasiswa</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    @can('admin')
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/mahasiswa">Data Mahasiswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
                    </ol>
                    @endcan
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="btn-toolbar justify-content-between">
                    <div>
                        <h4 class="card-title mt-3">Data Mahasiswa {{ $mahasiswa->nim }} - {{ $mahasiswa->nama }}</h4>
                    </div>
                    @can('admin')
                    <div>
                      <div class="d-grid gap-2 d-md-flex justify-content-md-end ">
                        <a href="/download/detail-mahasiswa/{{ $mahasiswa->id }}" class="btn btn-secondary me-md-2">Download Report</a>
                      </div>  
                    </div>
                    @endcan
                </div>
            </div>
            <div class="card-body"> 
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="table-responsive">
                            <table class='table table-striped'>
                                <tr>
                                    <th style="width: 30%" >Username</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $mahasiswa->user->username }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Email</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $mahasiswa->user->email }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Nim</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $mahasiswa->nim }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Nama</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $mahasiswa->nama }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Foto</th>
                                    <th style="width: 1%">:</th>
                                    <td>
                                        @if ($mahasiswa->image)
                                        <div style="max-height: 350px; overflow:hidden;">
                                            <img src="{{ asset('storage/'.$mahasiswa->image) }}" alt="{{ $mahasiswa->nama }}" 
                                            class="image-fluid" width="200px">
                                        </div>
                                        @else
                                            <img class="img-preview img-fluid mb-3 col-sm-5">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Jenis Kelamin</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $mahasiswa->jns_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Tempat Lahir</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $mahasiswa->tmpt_lahir }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Tanggal Lahir</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ date('d M Y',strtotime($mahasiswa->tgl_lahir)) }}</td>
                                </tr> 
                                <tr>
                                    <th style="width: 30%" >Alamat</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $mahasiswa->alamat }}</td>
                                </tr> 
                                {{-- @can('user')
                                <tr>
                                    <th style="width: 30%" >Nilai</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $mahasiswa->nilai->nilai }}</td>
                                </tr> 
                                @endcan --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection