@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus-circle mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('riderequest') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali 
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('rideRequestStore') }}" method="POST">
                @csrf

                <!-- Pilih Siswa -->
                <div class="row">
                    <div class="col-xl-6 mb-3">
                        <label for="student_id">Pilih Siswa</label>
                        <select name="student_id" id="student_id" class="form-control" required>
                            <option value="">-- Pilih Siswa --</option>
                            @foreach ($students as $s)
                                <option value="{{ $s->id }}" {{ old('student_id') == $s->id ? 'selected' : '' }}>
                                    {{ $s->name_student }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pilih Sopir -->
                    <div class="col-xl-6 mb-3">
                        <label for="driver_id">Pilih Sopir</label>
                        <select name="driver_id" id="driver_id" class="form-control" required>
                            <option value="">-- Pilih Sopir --</option>
                            @foreach ($drivers as $d)
                                <option value="{{ $d->id }}" {{ old('driver_id') == $d->id ? 'selected' : '' }}>
                                    {{ $d->name_driver }} - ({{ $d->phone_driver }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pilih Kendaraan -->
                    <div class="col-xl-6 mb-3">
                        <label for="vehicle_id">Pilih Kendaraan</label>
                        <select name="vehicle_id" id="vehicle_id" class="form-control" required>
                            <option value="">-- Pilih Kendaraan --</option>
                            @foreach ($vehicles as $v)
                                <option value="{{ $v->id }}" {{ old('vehicle_id') == $v->id ? 'selected' : '' }}>
                                    {{ $v->name_vehicle }} - ({{ $v->license_plate }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Lokasi Penjemputan -->
                    <div class="col-xl-6 mb-3">
                        <label for="pickup_location">Lokasi Penjemputan</label>
                        <input type="text" name="pickup_location" id="pickup_location" class="form-control"
                            value="{{ old('pickup_location') }}" required>
                    </div>

                    <!-- Status -->
                    <div class="col-xl-6 mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="konfirmasi" {{ old('status') == 'konfirmasi' ? 'selected' : '' }}>Konfirmasi</option>
                            <option value="tolak" {{ old('status') == 'tolak' ? 'selected' : '' }}>Tolak</option>
                        </select>
                    </div>

                    <!-- Nomor Antrian -->
                    <div class="col-xl-6 mb-3">
                        <label for="queue_number">Nomor Antrian</label>
                        <input type="number" name="queue_number" id="queue_number" class="form-control"
                            value="{{ old('queue_number') }}" required>
                    </div>
                </div>
                
                <div class="text-right mt-4">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('riderequest') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
