@extends('dashboard.layouts.main')

@section('title')
    Create Nilai
@endsection

@section('container')
<section id="input-style">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Input Nilai</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/nilai">Data Nilai</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Input Nilai</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header mt-3">
                <h4 class="card-title">Form Input Nilai</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <form action="/dashboard/nilai" method="post" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <div class="form-group mb-3">
                                    <label for="mahasiswa_id">Nama Mahasiswa</label>
                                    <fieldset class="form-group">
                                        <select name="mahasiswa_id" id="mahasiswa_id" class="form-select">
                                            {{-- select combobox--}}
                                            @foreach ($mahasiswa as $siswa)
                                               <option value="{{ $siswa->id }}">{{ $siswa->nim }} - {{ $siswa->nama }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="matakuliah_id">Matakuliah</label>
                                    <fieldset class="form-group">
                                        <select name="matakuliah_id" id="matakuliah_id" class="form-select">
                                            {{-- select combobox--}}
                                            @foreach ($matakuliah as $mk)
                                               <option value="{{ $mk->id }}">{{ $mk->mk }}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nilai">Nilai</label>
                                    <input type="text" name="nilai" id="nilai" 
                                        class="form-control @error('nilai') is-invalid @enderror" 
                                        placeholder="Enter jumlah nilai" required value="{{ old('nilai') }}">
                                        @error ('nilai')
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