@extends('layouts/app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit mr-2"></i>
        Edit Status Aplikasi
    </h1> 
    
    <div class="card">
        <div class="card-header">
            <a href="{{ route('status') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="card-body">
            <form class="text-dark" action="{{ route('statusUpdate', $status->id) }}" method="POST">
                @csrf

                <div class="row">

                    <!-- Kode Status -->
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Kode Status
                        </label>
                        <input type="text" name="kode_status" class="form-control" value="{{ old('kode_status', $status->kode_status) }}">
                        @error('kode_status')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>

                    <!-- Nama Status -->
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Nama Status
                        </label>
                        <input type="text" name="nama_status" class="form-control" value="{{ old('nama_status', $status->nama_status) }}">
                        @error('nama_status')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>

                </div>

                <div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-save mr-2"></i>
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
