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
                        <form action="/dashboard/nilai/{{ $nilai->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div>
                                <div class="form-group mb-3">
                                    <label for="mahasiswa_id">Nama Mahasiswa</label>
                                    <fieldset class="form-group">
                                        <select name="mahasiswa_id" id="mahasiswa_id" class="form-select">
                                        @foreach ($mahasiswa as $siswa)
                                            @if (old('mahasiswa_id',  $siswa->mahasiswa_id) == $siswa->id)
                                            {{-- buat yang lama tidak hilang --}}
                                                <option value="{{ $siswa->id }}" selected>{{ $siswa->nim }} - {{ $siswa->nama }}</option>
                                            @else     
                                                <option value="{{ $siswa->id }}">{{ $siswa->nim }} - {{ $siswa->nama }}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="matakuliah_id">Matakuliah</label>
                                    <fieldset class="form-group">
                                        <select name="matakuliah_id" id="matakuliah_id" class="form-select">
                                        @foreach ($matakuliah as $mk)
                                            @if (old('matakuliah_id',  $mk->matakuliah_id) == $mk->id)
                                            {{-- buat yang lama tidak hilang --}}
                                                <option value="{{ $mk->id }}" selected>{{ $mk->mk }}</option>
                                            @else     
                                                <option value="{{ $mk->id }}">{{ $mk->mk }}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nilai">Nilai</label>
                                    <input type="text" name="nilai" id="nilai" 
                                        class="form-control @error('nilai') is-invalid @enderror" 
                                        placeholder="Enter jumlah nilai" required value="{{ old('nilai', $nilai->nilai) }}">
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