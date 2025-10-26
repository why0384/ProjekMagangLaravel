@extends('layouts/app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-sync mr-2"></i>
        {{ $title }}
    </h1>
     
    <div class="card">
        <div class="card-header">
            <a href="{{ route('driver_vehicleCreate') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus mr-2"></i>
                Tambah Konfigurasi
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center bg-primary text-white">
                        <tr>
                            <th width="3%">No</th>
                            <th>Nama Kendaraan</th>
                            <th>Plat Nomor</th>
                            <th>Nama Sopir</th>
                            <th>No Telepon</th>
                            <th><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($drivervehicle as $item)
                            <tr class="text-dark">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->vehicle ? $item->vehicle->name_vehicle : '-' }}</td>
                                <td>{{ $item->vehicle ? $item->vehicle->license_plate : '-' }}</td>
                                <td>{{ $item->driver ? $item->driver->name_driver : '-' }}</td>
                                <td>{{ $item->driver ? $item->driver->phone_driver : '-' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('driver_vehicleEdit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal Hapus -->
                            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                                            <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus konfigurasi antara
                                            <b>{{ $item->driver->name_driver ?? '-' }}</b> dan
                                            <b>{{ $item->vehicle->name_vehicle ?? '-' }}</b>?
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Batal</button>
                                            <form action="{{ route('driver_vehicleDelete', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
