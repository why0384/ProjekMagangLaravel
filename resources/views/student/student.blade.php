@extends('layouts/app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-user-graduate mr-2"></i>
        {{ $title }}
    </h1>
    
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('studentCreate') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus mr-2"></i>
                Tambah Siswa
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-hover table-sm dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center text-dark">
                        <tr class="bg-primary text-white">
                            <th scope="col">#</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Layanan</th>
                            <th scope="col">Status</th>
                            <th scope="col">
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student as $item)
                            <tr class="text-dark text-center">
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>
                                    @if ($item->photo_student)
                                        <img src="{{ asset('uploads/students/' . $item->photo_student) }}" width="50" height="50" class="rounded-circle" alt="Foto Siswa">
                                    @else
                                        <img src="{{ asset('images/default.png') }}" width="50" height="50" class="rounded-circle" alt="Kosong">
                                    @endif
                                </td>
                                <td>{{ $item->user ? $item->user->name : '-' }}</td>
                                <td>{{ $item->name_student }}</td>
                                <td>{{ $item->class_student }}</td>
                                <td>{{ $item->address_student }}</td>
                                <td>{{ $item->phone_student }}</td>
                                <td>
                                    @if ($item->service_student === 'antar')
                                        <span class="badge badge-info">Antar</span>
                                    @elseif ($item->service_student === 'jemput')
                                        <span class="badge badge-warning">Jemput</span>
                                    @else
                                        <span class="badge badge-success">Antar-Jemput</span>
                                    @endif
                                </td>

                                <td>
                                    @if ($item->status_student === 'active')
                                        <span class="badge badge-success">Aktif</span>
                                    @else
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('studentEdit', $item->id) }}" class="btn btn-warning btn-sm">
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
                                            Apakah Anda yakin ingin menghapus siswa <b>{{ $item->name_student }}</b>?
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            <form action="{{ route('studentDelete', $item->id) }}" method="POST" class="d-inline">
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