@extends('dashboard.layouts.main')

@section('alert-css')
    <link rel="stylesheet" href="{{ asset('../assets/sweetalert2.min.css') }}">
@endsection

@section('title')
    Dashboard Matakuliah
@endsection

@section('container')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Data Matakuliah</h3> 
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Matakuliah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header d-md-flex justify-content-md-end mt-2">
                <a href="/dashboard/matakuliah/create" class="btn btn-primary me-md-2"><i class="fas fa-plus"></i>Tambah Matakuliah</a>
                <a href="/download/matakuliah"  class="btn btn-primary">
                    <i class="fas fa-file-download"></i><span> Download Report</span>
                </a>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Matakuliah</th>
                            <th>Matakuliah</th>
                            <th>Jumlah sks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matakuliah as $mk)   
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mk->kode_mk }}</td>
                                <td>{{ $mk->mk }}</td>
                                <td>{{ $mk->sks }}</td>
                                <td> 
                                    <a href="/dashboard/matakuliah/{{ $mk->id }}/edit" class="btn btn-warning icon">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="/dashboard/matakuliah/{{ $mk->id }}" method="post" id="btn-delete" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger icon" data-toggle="tooltip" title='Delete'>
                                            <i class="fas fa-trash"></i>
                                        </button>        
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection

@section('alert')
<script src="{{ asset('../assets/sweetalert2.min.js') }}"></script>
<script type="text/javascript">
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#5a8dee',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
      });
</script>
@endsection