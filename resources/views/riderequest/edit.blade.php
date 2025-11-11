@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-edit mr-2"></i>
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
        <form action="{{ route('rideRequestUpdate', $rideRequest->id) }}" method="POST">
            @csrf

            <div class="row">
                <!-- Pilih Siswa -->
                <div class="col-xl-6 mb-3">
                    <label for="student_id">Pilih Siswa</label>
                    <select name="student_id" id="student_id" class="form-control" required>
                        <option value="">-- Pilih Siswa --</option>
                        @foreach ($students as $s)
                            <option value="{{ $s->id }}" {{ $rideRequest->student_id == $s->id ? 'selected' : '' }}>
                                {{ $s->name_student }}
                            </option>
                        @endforeach
                    </select>
                    @error('student_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Pilih Sopir -->
                <div class="col-xl-6 mb-3">
                    <label for="driver_id">Pilih Sopir</label>
                    <select name="driver_id" id="driver_id" class="form-control" required>
                        <option value="">-- Pilih Sopir --</option>
                        @foreach ($drivers as $d)
                            <option value="{{ $d->id }}" {{ $rideRequest->driver_id == $d->id ? 'selected' : '' }}>
                                {{ $d->name_driver }} - ({{ $d->phone_driver }})
                            </option>
                        @endforeach
                    </select>
                    @error('driver_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Pilih Kendaraan -->
                <div class="col-xl-6 mb-3">
                    <label for="vehicle_id">Pilih Kendaraan</label>
                    <select name="vehicle_id" id="vehicle_id" class="form-control" required>
                        <option value="">-- Pilih Kendaraan --</option>
                        @foreach ($vehicles as $v)
                            <option value="{{ $v->id }}" {{ $rideRequest->vehicle_id == $v->id ? 'selected' : '' }}>
                                {{ $v->name_vehicle }} - ({{ $v->license_plate }})
                            </option>
                        @endforeach
                    </select>
                    @error('vehicle_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Lokasi Penjemputan -->
                <div class="col-xl-6 mb-3">
                    <label for="pickup_location">Lokasi Penjemputan</label>
                    <input type="text" name="pickup_location" id="pickup_location" class="form-control"
                        value="{{ $rideRequest->pickup_location }}" required>
                    @error('pickup_location')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Status Request -->
                <div class="col-xl-6 mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="pending" {{ $rideRequest->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="konfirmasi" {{ $rideRequest->status == 'konfirmasi' ? 'selected' : '' }}>Konfirmasi</option>
                        <option value="tolak" {{ $rideRequest->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Nomor Antrian -->
                <div class="col-xl-6 mb-3">
                    <label for="queue_number">Nomor Antrian</label>
                    <input type="number" name="queue_number" id="queue_number" class="form-control"
                        value="{{ $rideRequest->queue_number }}" required>
                    @error('queue_number')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="text-right mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i> Simpan Perubahan
                </button>
                <a href="{{ route('riderequest') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
