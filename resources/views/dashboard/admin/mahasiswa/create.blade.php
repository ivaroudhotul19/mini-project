@extends('dashboard.layouts.main')

@section('title')
    Create Mahasiswa
@endsection

@section('container')
<section id="input-style">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Input Mahasiswa</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/mahasiswa">Data Mahasiswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Input Mahasiswa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header mt-3">
                <h4 class="card-title">Form Input Mahasiswa</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <form action="/dashboard/mahasiswa" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" 
                                            class="form-control @error('username') is-invalid @enderror"
                                            placeholder="Enter username" required value="{{ old('username') }}">
                                            @error ('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" 
                                            class="form-control  @error('email') is-invalid @enderror"
                                            placeholder="Enter email" required value="{{ old('email') }}">
                                            @error ('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input type="text" name="password" id="password" 
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Enter password" required>
                                        @error('password')
                                            <div class="position-absolute mb-5 invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="nim">Nim</label>
                                        <input type="text" name="nim" id="nim" 
                                            class="form-control  @error('nim') is-invalid @enderror"
                                            placeholder="Enter nim" required value="{{ old('nim') }}">
                                            @error ('nim')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" id="nama" 
                                            class="form-control @error('nama') is-invalid @enderror"
                                            placeholder="Enter nama" required value="{{ old('nama') }}">
                                            @error ('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="jns_kelamin">Jenis Kelamin</label>
                                        <div class="form-check-primary mb-4 mt-3">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="jns_kelamin" id="laki" class="form-check-input
                                                @error('jns_kelamin') is-invalid @enderror" value="Laki-Laki" {{
                                                    old('jns_kelamin')=='Laki-Laki' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="laki"> Laki-laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="jns_kelamin" id="perempuan" class="form-check-input
                                                @error('jns_kelamin') is-invalid @enderror" value="Perempuan" {{
                                                    old('jns_kelamin')=='Perempuan' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="perempuan"> Perempuan</label>
                                            </div>
                                            @error ('jns_kelamin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror    
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="tmpt_lahir">Tempat Lahir</label>
                                        <input type="text" name="tmpt_lahir" id="tmpt_lahir" 
                                            class="form-control @error('tmpt_lahir') is-invalid @enderror"
                                            placeholder="Enter tempat lahir" required value="{{ old('tmpt_lahir') }}">
                                            @error ('tmpt_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" id="tgl_lahir" 
                                            class="form-control @error('tgl_lahir') is-invalid @enderror"
                                            placeholder="Enter tanggal lahir" required value="{{ old('tgl_lahir') }}">
                                            @error ('tgl_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="col-lg-6 col-md-12">
                                            <label for="image">Foto</label>
                                            <div class="form-file">
                                                <label class="form-file-label" for="image"></label>
                                                <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                                <input type="file" name="image" id="image" 
                                                class="form-file-input @error('image') is-invalid @enderror"
                                                onchange="previewImage()">
                                                @error ('image')
                                                <div class="invalid-feedback">
                                                   {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="form-group mb-3">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" id="alamat" 
                                        class="form-control @error('alamat') is-invalid @enderror" 
                                        placeholder="Enter alamat" required value="{{ old('alamat') }}">
                                        @error ('alamat')
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
<script>
    document.addEvenListner('trix-file-accept', function(e) {
        e.preventDefault();
    });
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
        
        imgPreview.style.display = 'block';
        const oFReader = new  FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection