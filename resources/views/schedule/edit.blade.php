@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-edit mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card">
        <div class="card-header">
            <a href="{{ route('schedule') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('scheduleUpdate', $schedule->id) }}" method="POST">
                @csrf

                <div class="row">
                    {{-- Pilih Siswa --}}
                    <div class="col-xl-6 mb-3">
                        <label for="student_id">Pilih Siswa</label>
                        <select name="student_id" id="student_id" class="form-control" required>
                            <option value="">-- Pilih Siswa --</option>
                            @foreach ($students as $s)
                                <option value="{{ $s->id }}" {{ $schedule->student_id == $s->id ? 'selected' : '' }}>
                                    {{ $s->name_student }} - ({{ $s->class_student }})
                                </option>
                            @endforeach
                        </select>
                        @error('student_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Pilih Sopir --}}
                    <div class="col-xl-6 mb-3">
                        <label for="driver_id">Pilih Sopir</label>
                        <select name="driver_id" id="driver_id" class="form-control" required>
                            <option value="">-- Pilih Sopir --</option>
                            @foreach ($drivers as $d)
                                <option value="{{ $d->id }}" {{ $schedule->driver_id == $d->id ? 'selected' : '' }}>
                                    {{ $d->name_driver }} - ({{ $d->phone_driver }})
                                </option>
                            @endforeach
                        </select>
                        @error('driver_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Pilih Kendaraan --}}
                    <div class="col-xl-6 mb-3">
                        <label for="vehicle_id">Pilih Kendaraan</label>
                        <select name="vehicle_id" id="vehicle_id" class="form-control" required>
                            <option value="">-- Pilih Kendaraan --</option>
                            @foreach ($vehicles as $v)
                                <option value="{{ $v->id }}" {{ $schedule->vehicle_id == $v->id ? 'selected' : '' }}>
                                    {{ $v->name_vehicle }} - ({{ $v->license_plate }})
                                </option>
                            @endforeach
                        </select>
                        @error('vehicle_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Waktu Jemput --}}
                    <div class="col-md-6 mb-3">
                        <label for="pickup_time">Waktu Jemput</label>
                        <input type="time" name="pickup_time" id="pickup_time" class="form-control"
                            value="{{ $schedule->pickup_time }}">
                        @error('pickup_time')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Waktu Antar --}}
                    <div class="col-md-6 mb-3">
                        <label for="dropoff_time">Waktu Antar</label>
                        <input type="time" name="dropoff_time" id="dropoff_time" class="form-control"
                            value="{{ $schedule->dropoff_time }}">
                        @error('dropoff_time')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Lokasi Jemput --}}
                    <div class="col-md-6 mb-3">
                        <label for="pickup_location">Lokasi Jemput</label>
                        <input type="text" name="pickup_location" id="pickup_location" class="form-control"
                            value="{{ $schedule->pickup_location }}" placeholder="Masukkan lokasi penjemputan">
                        @error('pickup_location')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Lokasi Antar --}}
                    <div class="col-md-6 mb-3">
                        <label for="dropoff_location">Lokasi Antar</label>
                        <input type="text" name="dropoff_location" id="dropoff_location" class="form-control"
                            value="{{ $schedule->dropoff_location }}" placeholder="Masukkan lokasi pengantaran">
                        @error('dropoff_location')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Status Jadwal --}}
                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="aktif" {{ $schedule->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="batal" {{ $schedule->status == 'batal' ? 'selected' : '' }}>Batal</option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fas fa-save mr-2"></i> Simpan 
                </button>
            </form>
        </div>
    </div>
@endsection
