@extends('layout.main')

@section('judul')
    Halaman Home
@endsection

@section('isi')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Selamat Datang, {{ $user->username }}</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="alert alert-success">
                Halo, Selamat Datang
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
