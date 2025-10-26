@extends('layouts/app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit mr-2"></i>
        {{ $title }}
    </h1>
    
    <div class="card">
        <div class="card-header">
            <a href="{{ route('user') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="card-body"> 
        <form class="text-dark" action="{{ route('userUpdate', $user->id) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-xl-6 mb-3">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        Nama 
                    </label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    @error('name')
                        <small>
                            <span class="text-danger">{{ $message }}</span>
                        </small>
                    @enderror
                </div>
                <div class="col-xl-6 mb-3">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        Email
                    </label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                    @error('email')
                        <small>
                            <span class="text-danger">{{ $message }}</span>
                        </small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-3">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        Role
                    </label>
                     <select class="form-control" name="role">
                        <option selected disabled>--Pilih Role--</option>
                        <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : ''}}>Admin</option>
                        <option value="Siswa" {{ $user->role == 'Siswa' ? 'selected' : ''}}>Siswa</option>
                        <option value="Sopir" {{ $user->role == 'Sopir' ? 'selected' : ''}}>Sopir</option>
                    </select>
                    @error('role')
                        <small>
                            <span class="text-danger">{{ $message }}</span>
                        </small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 mb-3">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        Password
                    </label>
                    <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                    @error('password')
                        <small>
                            <span class="text-danger">{{ $message }}</span>
                        </small>
                    @enderror
                </div>
                <div class="col-xl-6 mb-3">
                    <label class="form-label">
                        <span class="text-danger">*</span>
                        Password Konfirmasi
                    </label>
                    <input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                        <small>
                            <span class="text-danger">{{ $message }}</span>
                        </small>
                    @enderror
                </div>
            </div>

            <div>
                <button class="btn btn-primary btn-sm">
                    <i class="fas fa-edit mr-2"></i>
                    Edit
                </button>   
            </div>
              
        </form>
        </div>

    </div>

    
    
@endsection