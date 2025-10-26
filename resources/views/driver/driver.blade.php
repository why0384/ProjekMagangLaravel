@extends('layouts/app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-id-badge mr-2"></i>
        {{ $title }}
    </h1>
    
    <div class="card">
        <div class="card-header">
            <a href="{{ route('driverCreate') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus mr-2"></i>
                Tambah Sopir
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm text-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center bg-primary text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Status</th>
                            <th scope="col">
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($driver as $item)
                            <tr class="text-dark text-center" >
                                <td scope="row" >{{ $loop->iteration }}</td>
                                <td>{{ $item->user ? $item->user->name : '-' }}</td>
                                <td>{{ $item->name_driver }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->birthdate_driver)->format('d-m-Y') }}</td>
                                <td>{{ $item->address_driver }}</td>
                                <td>{{ $item->phone_driver}}</td>
                                <td>
                                    @if ($item->status_driver == 'active')
                                        <div class="badge badge-success justify-content-center d-flex">
                                            Aktif
                                        </div>

                                    @else ($item->status_driver == 'inactive')
                                        <div class="badge badge-danger justify-content-center d-flex">
                                            Tidak Aktif 
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('driverEdit', $item->id) }}" class="btn btn-warning btn-sm">
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
                                            Apakah Anda yakin ingin menghapus siswa <b>{{ $item->name_driver }}</b>?
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Batal</button>
                                            <form action="{{ route('driverDelete', $item->id) }}" method="POST" class="d-inline">
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