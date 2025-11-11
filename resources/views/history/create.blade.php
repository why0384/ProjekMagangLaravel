@extends('layouts/app')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">
    <i class="fas fa-plus mr-2"></i>
    {{ $title }}
</h1>

<div class="card">
    <div class="card-header">
        <a href="{{ route('history') }}" class="btn btn-success btn-sm">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali
        </a>
    </div>

    <div class="card-body">
        <form class="text-dark" action="{{ route('historyStore') }}" method="post">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="schedule_id">Jadwal</label>
                    <select name="schedule_id" id="schedule_id" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Jadwal --</option>
                        @foreach($schedules as $schedule)
                            <option value="{{ $schedule->id }}" {{ old('schedule_id') == $schedule->id ? 'selected' : '' }}>
                                {{ $schedule->id }} - {{ $schedule->pickup_location }} → {{ $schedule->dropoff_location }}
                            </option>
                        @endforeach
                    </select>
                    @error('schedule_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="student_id">Siswa</label>
                    <select name="student_id" id="student_id" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Siswa --</option>
                        @foreach($students as $student)
                            <option value="{{ $student->user_id }}" {{ old('student_id') == $student->user_id ? 'selected' : '' }}>
                                {{ $student->name_student }}
                            </option>
                        @endforeach
                    </select>
                    @error('student_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="driver_id">Sopir</label>
                    <select name="driver_id" id="driver_id" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Sopir --</option>
                        @foreach($drivers as $driver)
                            <option value="{{ $driver->user_id }}" {{ old('driver_id') == $driver->user_id ? 'selected' : '' }}>
                                {{ $driver->name_driver }}
                            </option>
                        @endforeach
                    </select>
                    @error('driver_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="vehicle_id">Kendaraan</label>
                    <select name="vehicle_id" id="vehicle_id" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Kendaraan --</option>
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}" {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }}>
                                {{ $vehicle->name_vehicle }} - {{ $vehicle->license_plate }}
                            </option>
                        @endforeach
                    </select>
                    @error('vehicle_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- == PERUBAHAN DIMULAI DARI SINI == --}}
                <div class="col-md-6 mb-3">
                    <label for="pickup_time">Waktu Penjemputan</label>
                    <input type="time" name="pickup_time" id="pickup_time" pattern="[0-9]{2}:[0-9]{2}" class="form-control" value="{{ old('pickup_time') }}">
                    @error('pickup_time')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="dropoff_time">Waktu Pengantaran</label>
                    <input type="time" name="dropoff_time" id="dropoff_time" pattern="[0-9]{2}:[0-9]{2}" class="form-control" value="{{ old('dropoff_time') }}">
                    @error('dropoff_time')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                {{-- == PERUBAHAN SELESAI DI SINI == --}}

                <div class="col-md-6 mb-3">
                    <label>Lokasi Penjemputan</label>
                    <input type="text" name="pickup_location" class="form-control" value="{{ old('pickup_location') }}">
                    @error('pickup_location')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label>Lokasi Pengantaran</label>
                    <input type="text" name="dropoff_location" class="form-control" value="{{ old('dropoff_location') }}">
                    @error('dropoff_location')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="status_id">Status</label>
                    <select name="status_id" id="status_id" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Status --</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status->id }}" {{ old('status_id') == $status->id ? 'selected' : '' }}>
                                {{ $status->nama_status }}
                            </option>
                        @endforeach
                    </select>
                    @error('status_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                
            </div>

            <button class="btn btn-primary btn-sm">
                <i class="fas fa-save mr-2"></i> Simpan
            </button>
        </form>
    </div>
</div>

@endsection