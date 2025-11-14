@extends('layouts/app')

@section('content')
 
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-car-side mr-2"></i>
        {{ $title }}
    </h1>
    
    <div class="card">
        <div class="card-header">
            <a href="{{ route('vehicleCreate') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus mr-2"></i>
                Tambah Kendaraan
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm text-sm dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Plat Nomer</th>
                            <th>Nama Kendaraan</th>
                            <th>Merek Kendaraan</th>
                            <th>Tahun</th>
                            <th>
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicle as $item)
                            <tr class="text-dark">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>
                                    @if ($item->photo_vehicle)
                                        <img src="{{ asset('uploads/vehicles/' . $item->photo_vehicle) }}" width="50" height="50" class="rounded-circle" alt="Foto Siswa">
                                    @else
                                        <img src="{{ asset('images/default.png') }}" width="50" height="50" class="rounded-circle" alt="Kosong">
                                    @endif
                                </td>
                                <td>{{ $item->license_plate }}</td>
                                <td>{{ $item->name_vehicle }}</td>
                                <td>{{ $item->type_vehicle }}</td>
                                <td>{{ $item->year_vehicle }}</td>
                                <td class="text-center">
                                    <a href="{{ route('vehicleEdit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            
                            <!-- Modal Konfirmasi Delete -->
                            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Konfirmasi Hapus</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus kendaraan <b>{{ $item->name_vehicle }}</b>?
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            <form action="{{ route('vehicleDelete', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
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