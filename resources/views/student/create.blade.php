@extends('layouts/app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus mr-2"></i>
        {{ $title }}
    </h1>
    
    <div class="card">
        <div class="card-header">
            <a href="{{ route('student') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="card-body"> 
            <form class="text-dark" action="{{ route('studentStore') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-xl-6 mb-3">
                        <label for="user_id">Pilih User (Siswa)</label>
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

                    <!-- Nama -->
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Nama Siswa
                        </label>
                        <input type="text" name="name_student" class="form-control" value="{{ old('name_student') }}">
                        @error('name_student')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>
 
                    <!-- Kelas -->
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Kelas
                        </label>
                        <input type="text" name="class_student" class="form-control" value="{{ old('class_student') }}">
                        @error('class_student')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            No Telepon
                        </label>
                        <input type="text" name="phone_student" class="form-control" value="{{ old('phone_student') }}">
                        @error('phone_student')
                            <small><span class="text-danger">{{ $message }}</span></small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <!-- Alamat -->
                    <div class="col-xl-6 mb-3">
                        <label class="form-label">
                            <span class="text-danger">*</span>
                            Alamat
                        </label>
                        <textarea name="address_student" class="form-control" rows="3">{{ old('address_student') }}</textarea>
                        @error('address_student')
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
