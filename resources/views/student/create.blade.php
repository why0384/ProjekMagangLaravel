@extends('layouts/app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card shadow">
        <div class="card-header">
            <a href="{{ route('student') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="card-body">
            <form class="text-dark" action="{{ route('studentStore') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- Foto Siswa -->
                    <div class="col-xl-6 mb-3">
                        <label for="photo_student">Foto Siswa</label>
                        <input type="file" class="form-control" name="photo_student" id="photo_student" accept="image/*" onchange="previewImage(event)">
                        @error('photo_student')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-3">
                        <div class="mt-2">
                            <img id="preview" src="{{ asset('images/default.png') }}" width="100" class="rounded border p-1">
                        </div>
                    </div>

                    <!-- Pilih User -->
                    <div class="col-xl-6 mb-3">
                        <label for="user_id">Pilih User (Siswa)</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option selected disabled>-- Pilih User --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>

                    <!-- Nama Siswa -->
                    <div class="col-xl-6 mb-3">
                        <label class="form-label"><span class="text-danger">*</span> Nama Siswa</label>
                        <input type="text" name="name_student" class="form-control" value="{{ old('name_student') }}">
                        @error('name_student')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>

                    <!-- Kelas -->
                    <div class="col-xl-6 mb-3">
                        <label class="form-label"><span class="text-danger">*</span> Kelas</label>
                        <input type="text" name="class_student" class="form-control" value="{{ old('class_student') }}">
                        @error('class_student')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>

                   

                    <!-- No Telepon -->
                    <div class="col-xl-6 mb-3">
                        <label class="form-label"><span class="text-danger">*</span> No Telepon</label>
                        <input type="text" name="phone_student" class="form-control" value="{{ old('phone_student') }}">
                        @error('phone_student')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>

                    <!-- Jenis Layanan -->
                    <div class="col-xl-6 mb-3">
                        <label class="form-label"><span class="text-danger">*</span> Jenis Layanan</label>
                        <select name="service_student" class="form-control">
                            <option value="antar">Antar</option>
                            <option value="jemput">Jemput</option>
                            <option value="antar-jemput" selected>Antar-Jemput</option>
                        </select>
                        @error('service_student')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="col-xl-6 mb-3">
                        <label class="form-label"><span class="text-danger">*</span> Status</label>
                        <select name="status_student" class="form-control">
                            <option value="active" selected>Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                        @error('status_student')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>
                </div>
                 <!-- Alamat -->
                    <div class="col-xl mb-3">
                        <label class="form-label"><span class="text-danger">*</span> Alamat</label>
                        <textarea name="address_student" class="form-control" rows="3">{{ old('address_student') }}</textarea>
                        @error('address_student')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>

                <!-- Tombol Simpan -->
                <div>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-save mr-2"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
