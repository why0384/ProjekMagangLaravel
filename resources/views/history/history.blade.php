@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-history mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('historyCreate') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus mr-2"></i>
                Tambah Riwayat
            </a>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-sm text-sm dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Siswa</th>
                            <th>Sopir</th>
                            <th>Kendaraan</th>
                            <th>Waktu Jemput</th>
                            <th>Waktu Antar</th>
                            <th>Lokasi Jemput</th>
                            <th>Lokasi Antar</th>
                            <th>Status</th>
                            <th><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($histories as $item)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->student ? $item->student->name_student : '-' }}</td>
                                <td>{{ $item->driver ? $item->driver->name_driver : '-' }}</td>
                                <td>{{ $item->vehicle ? $item->vehicle->name_vehicle : '-' }}</td>
                                <td>{{ $item->pickup_time ? \Carbon\Carbon::parse($item->pickup_time)->format('H:i') : '-' }}</td>
                                <td>{{ $item->dropoff_time ? \Carbon\Carbon::parse($item->dropoff_time)->format('H:i') : '-' }}</td>
                                <td>{{ $item->pickup_location ?? '-' }}</td>
                                <td>{{ $item->dropoff_location ?? '-' }}</td>
                                <td>
                                    @if ($item->status_id == 1)
                                        <div class="badge badge-success">Selesai</div>
                                    @elseif ($item->status_id == 2)
                                        <div class="badge badge-warning">Proses</div>
                                    @elseif ($item->status_id == 3)
                                        <div class="badge badge-danger">Dibatalkan</div>
                                    @else
                                        <div class="badge badge-secondary">Tidak Diketahui</div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('historyEdit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus data riwayat ini?
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Batal</button>
                                            <form action="{{ route('historyDelete', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr class="text-center">
                                <td colspan="11" class="text-muted">Belum ada data riwayat</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
