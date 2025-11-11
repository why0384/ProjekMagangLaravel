@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('history') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <div class="card-body">
            <form class="text-dark" action="{{ route('historyUpdate', $history->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="schedule_id">Jadwal</label>
                        <input type="number" name="schedule_id" id="schedule_id" class="form-control"
                            value="{{ old('schedule_id', $history->schedule_id) }}" placeholder="Masukkan ID Jadwal">
                        @error('schedule_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="student_id">Siswa</label>
                        <input type="number" name="student_id" id="student_id" class="form-control"
                            value="{{ old('student_id', $history->student_id) }}" placeholder="Masukkan ID Siswa">
                        @error('student_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="driver_id">Sopir</label>
                        <input type="number" name="driver_id" id="driver_id" class="form-control"
                            value="{{ old('driver_id', $history->driver_id) }}" placeholder="Masukkan ID Sopir">
                        @error('driver_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="vehicle_id">Kendaraan</label>
                        <input type="number" name="vehicle_id" id="vehicle_id" class="form-control"
                            value="{{ old('vehicle_id', $history->vehicle_id) }}" placeholder="Masukkan ID Kendaraan">
                        @error('vehicle_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="pickup_time">Waktu Penjemputan</label>
                        <input type="time" name="pickup_time" id="pickup_time" class="form-control"
                            value="{{ old('pickup_time', $history->pickup_time) }}">
                        @error('pickup_time')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="dropoff_time">Waktu Pengantaran</label>
                        <input type="time" name="dropoff_time" id="dropoff_time" class="form-control"
                            value="{{ old('dropoff_time', $history->dropoff_time) }}">
                        @error('dropoff_time')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="pickup_location">Lokasi Penjemputan</label>
                        <input type="text" name="pickup_location" id="pickup_location" class="form-control"
                            value="{{ old('pickup_location', $history->pickup_location) }}" placeholder="Contoh: Rumah Siswa">
                        @error('pickup_location')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="dropoff_location">Lokasi Pengantaran</label>
                        <input type="text" name="dropoff_location" id="dropoff_location" class="form-control"
                            value="{{ old('dropoff_location', $history->dropoff_location) }}" placeholder="Contoh: Sekolah SDN 1 Ketoyan">
                        @error('dropoff_location')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="status_id">Status</label>
                    <select name="status_id" id="status_id" class="form-control">
                        <option selected disabled>-- Pilih Status --</option>
                        <option value="1" {{ $history->status_id == 1 ? 'selected' : '' }}>Selesai</option>
                        <option value="2" {{ $history->status_id == 2 ? 'selected' : '' }}>Proses</option>
                        <option value="3" {{ $history->status_id == 3 ? 'selected' : '' }}>Dibatalkan</option>
                    </select>
                    @error('status_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button class="btn btn-primary btn-sm">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </form>
        </div>
    </div>
@endsection
