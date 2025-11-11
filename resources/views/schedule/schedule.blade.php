@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">
        <i class="fas fa-calendar-alt mr-2"></i>
        {{ $title }}
    </h1>

    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="{{ route('scheduleCreate') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus mr-2"></i>
                Tambah Jadwal
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm text-sm dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Nama Siswa</th>
                            <th>Nama Sopir</th>
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
                        @forelse ($schedules as $item)
                            <tr class="text-dark">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $item->student ? $item->student->name_student : '-' }}</td>
                                <td>{{ $item->driver ? $item->driver->name_driver : '-' }}</td>
                                <td>{{ $item->vehicle ? $item->vehicle->license_plate: '-' }}</td>
                                <td>{{ $item->pickup_time ?? '-' }}</td>
                                <td>{{ $item->dropoff_time ?? '-' }}</td>
                                <td>{{ $item->pickup_location ?? '-' }}</td>
                                <td>{{ $item->dropoff_location ?? '-' }}</td>
                                <td>
                                    @if ($item->status == 'aktif')
                                        <div class="badge badge-success justify-content-center d-flex">
                                            Aktif
                                        </div>

                                    @else ($item->status == 'batal')
                                        <div class="badge badge-danger justify-content-center d-flex">
                                            Batal 
                                        </div>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('scheduleEdit', $item->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#deleteModal{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger text-white">
                                            <h5 class="modal-title">Konfirmasi Hapus</h5>
                                            <button class="close text-white" type="button" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus jadwal untuk
                                            <b>{{ $item->student->name_student ?? '-' }}</b> dengan sopir
                                            <b>{{ $item->driver->name_driver ?? '-' }}</b>?
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary btn-sm" type="button"
                                                data-dismiss="modal">Batal</button>
                                            <form action="{{ route('scheduleDelete', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center text-muted">Belum ada data jadwal.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
