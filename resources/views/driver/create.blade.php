@extends('layouts/app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus mr-2"></i>
        {{ $title }}
    </h1> 
    
    <div class="card">
        <div class="card-header">
            <a href="{{ route('driver') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali 
            </a>
        </div>

        <div class="card-body"> 
            <form class="text-dark" action="{{ route('driverStore') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Foto Sopir -->
                    <div class="col-xl-6 mb-3">
                        <label for="photo_driver">Foto Sopir</label>
                        <input type="file" class="form-control" name="photo_driver" id="photo_driver" accept="image/*" onchange="previewImage(event)">
                        @error('photo_driver')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-3">
                        <div class="mt-2">
                            <img id="preview" src="{{ asset('images/default.png') }}" width="100" class="rounded border p-1">
                        </div>
                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-12 mb-3">
                        <label for="user_id">Pilih User (Sopir)</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option selected disabled>-- Pilih User --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-12 mb-3">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Nama Sopir
                        </label>
                        <input type="text" name="name_driver" class="form-control" value="{{ old('name_driver') }}">
                        @error('name_driver')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-12 mb-3">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Tanggal Lahir
                        </label>
                        <input type="date" name="birthdate_driver" class="form-control" value="{{ old('birthdate_driver') }}">
                        @error('birthdate_driver')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-12 mb-3">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            No Telepon
                        </label>
                        <input type="text" name="phone_driver" class="form-control" value="{{ old('phone_driver') }}">
                        @error('phone_driver')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>

                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-12 mb-3">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Alamat
                        </label>
                        <textarea name="address_driver" class="form-control" rows="3">{{ old('address_driver') }}</textarea>
                        @error('address_driver')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>

                    <div class="col-xl-6 col-md-6 col-sm-12 mb-3">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Status
                        </label>
                        <select class="form-control" name="status_driver">
                            <option selected disabled>-- Pilih Status --</option>
                            <option value="active" {{ old('status_driver') == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status_driver') == 'inactive' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        @error('status_driver')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>

                    <!-- No Telepon -->
                    
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
