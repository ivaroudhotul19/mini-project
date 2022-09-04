@extends('dashboard.layouts.main')

@section('title')
    Create Matakuliah
@endsection

@section('container')
<section id="input-style">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Input Matakuliah</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/matakuliah">Data Matakuliah</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Input Matakuliah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header mt-3">
                <h4 class="card-title">Form Input Matakuliah</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <form action="/dashboard/matakuliah" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <div class="form-group mb-3">
                                    <label for="kode_mk">Kode Matakuliah</label>
                                    <input type="text" name="kode_mk" id="kode_mk" 
                                        class="form-control @error('kode_mk') is-invalid @enderror" 
                                        placeholder="Enter kode matakuliah" required value="{{ old('kode_mk') }}">
                                        @error ('kode_mk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="mk">Matakuliah</label>
                                    <input type="text" name="mk" id="mk" 
                                        class="form-control @error('mk') is-invalid @enderror" 
                                        placeholder="Enter matakuliah" required value="{{ old('mk') }}">
                                        @error ('mk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="sks">Jumlah SKS</label>
                                    <input type="text" name="sks" id="sks" 
                                        class="form-control @error('sks') is-invalid @enderror" 
                                        placeholder="Enter jumlah sks" required value="{{ old('sks') }}">
                                        @error ('sks')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                    <button type="reset" class="btn btn-light me-md-2">Cancel</button>
                                    <button type="submit" class="btn btn-secondary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection