@extends('dashboard.layouts.main')

@section('title')
    Dashboard Sistem Informasi Akademik
@endsection

@section('container')
     <div class="page-title">
        <h3>Dashboard</h3>
        <p class="text-subtitle text-muted fw-bold fs-5 mb-3 mt-3">Sistem Informasi Akademik</p>
    </div>
    <section class="section">
        <div class="row mb-2">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-3 bg-info">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-2xl font-weight-bold text-white text-uppercase mb-1">Data User</div>
                            <div class="h5 mb-0 font-weight-bold text-white fs-3 fw-bold">{{ $user }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-4x text-white"></i>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-3 bg-info">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-2xl font-weight-bold text-white text-uppercase mb-1">Data Mahasiswa</div>
                            <div class="h5 mb-0 font-weight-bold text-white fs-3 fw-bold">{{ $mahasiswa }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-4x text-white"></i>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-3 bg-info">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-2xl font-weight-bold text-white text-uppercase mb-1">Data Matakuliah</div>
                            <div class="h5 mb-0 font-weight-bold text-white fs-3 fw-bold">{{ $matakuliah }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-child fa-4x text-white"></i>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-3 bg-info">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-2xl font-weight-bold text-white text-uppercase mb-1">Data Nilai</div>
                            <div class="h5 mb-0 font-weight-bold text-white fs-3 fw-bold">{{ $nilai }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-child fa-4x text-white"></i>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection