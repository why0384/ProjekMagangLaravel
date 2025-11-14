@extends('layouts/app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus mr-2"></i>
        {{ $title }}
    </h1>
    
    <div class="card">
        <div class="card-header">
            <a href="{{ route('vehicle') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="card-body"> 
            <form class="text-dark" action="{{ route('vehicleStore') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Foto Siswa -->
                    <div class="col-xl-6 mb-3">
                        <label for="photo_vehicle">Foto Kendaraan</label>
                        <input type="file" class="form-control" name="photo_vehicle" id="photo_vehicle" accept="image/*" onchange="previewImage(event)">
                        @error('photo_vehicle')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-3">
                        <div class="mt-2">
                            <img id="preview" src="{{ asset('images/default.png') }}" width="100" class="rounded border p-1">
                        </div>
                    </div>
                    
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Plat Nomer
                        </label>
                        <input type="text" name="license_plate" class="form-control" value="{{ old('license_plate') }}">
                        @error('license_plate')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>

                    <div class="col-xl-6 mb-3">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Nama Kendaraan
                        </label>
                        <input type="text" name="name_vehicle" class="form-control" value="{{ old('name_vehicle') }}">
                        @error('name_vehicle')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>

                    <div class="col-xl-6 mb-3">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Merk Kendaraan
                        </label>
                        <input type="text" name="type_vehicle" class="form-control" value="{{ old('type_vehicle') }}">
                        @error('type_vehicle')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>
 
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Tahun Kendaraan
                        </label>
                        <input type="text" name="year_vehicle" class="form-control" value="{{ old('year_vehicle') }}">
                        @error('year_vehicle')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>
                </div>

                

                <div>
                    <button class="btn btn-primary btn-sm">
                        <i class="fas fa-save mr-2"></i>
                        Simpan 
                    </button>   
                </div>
            </form>
        </div>
    </div>

@endsection
