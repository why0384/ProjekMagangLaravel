@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-info mr-2"></i>
        Status Aplikasi
    </h1>
    
    <div class="card">
        <div class="card-header">
            <a href="{{ route('statusCreate') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus mr-2"></i>
                Tambah Status
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Kode Status</th>
                            <th>Nama Status</th>
                            <th>
                                <i class="fas fa-cog"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($status as $index => $s)
                            <tr class="text-dark text-center">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $s->kode_status }}</td>
                                <td>{{ $s->nama_status }}</td>
                                <td>
                                    <a href="{{ route('statusEdit', $s->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <!-- Tombol hapus dengan modal -->
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $s->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade" id="deleteModal{{ $s->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="deleteModalLabel{{ $s->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $s->id }}">Konfirmasi Hapus</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus status <b>{{ $s->nama_status }}</b>?
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            <form action="{{ route('statusDelete', $s->id) }}" method="POST" class="d-inline">
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
