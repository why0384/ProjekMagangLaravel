@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-plus-circle mr-2"></i>
        {{ $title }}
    </h1>
 
    <div class="card">
        <div class="card-header">
            <a href="{{ route('driver_vehicle') }}" class="btn btn-success btn-sm">
                <i class="fas fa-arrow-left mr-2"></i>
                Kembali 
            </a>
        </div>

        <div class="card-body">
            <form action="{{ route('driver_vehicleStore') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="vehicle_id">Pilih Kendaraan</label>
                    <select name="vehicle_id" id="vehicle_id" class="form-control" required>
                        <option value="">-- Pilih Kendaraan --</option>
                        @foreach ($vehicles as $v)
                            <option value="{{ $v->id }}">
                                {{ $v->name_vehicle }} - ({{ $v->license_plate }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="driver_id">Pilih Sopir</label>
                    <select name="driver_id" id="driver_id" class="form-control" required>
                        <option value="">-- Pilih Sopir --</option>
                        @foreach ($drivers as $d)
                            <option value="{{ $d->id }}">
                                {{ $d->name_driver }} - ({{ $d->phone_driver }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i> Simpan
                </button>
            </form>
        </div>
    </div>
@endsection
