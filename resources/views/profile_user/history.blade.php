@extends('profile_user.layout')

@section('profile_dashboard')
    <section class="mt-5" style="padding-top: 100px;">
        <div class="card container">
            <div class="row p-4">
                <div class="col-4 d-flex justify-content-center">
                    <div class="card shadow border-0 rounded-3 w-50" style="background-color: #222C65;">
                        <div class="card-body text-center text-white">
                            <i class="bi bi-repeat fs-1"></i>
                            <div class="w-50 d-block mx-auto mb-3" style="height: 4px; background-color: white;"></div>
                            <p class="fw-light" style="font-size: 1em;">Proses</p>
                            <p class="fw-light" style="font-size: 1em;">{{ $prosesCount }}</p> <!-- Menampilkan count Proses -->
                        </div>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <div class="card shadow border-0 rounded-3 w-50" style="background-color: #222C65;">
                        <div class="card-body text-center text-white">
                            <i class="bi bi-check fs-1"></i>
                            <div class="w-50 d-block mx-auto mb-3" style="height: 4px; background-color: white;"></div>
                            <p class="fw-light" style="font-size: 1em;">Lolos</p>
                            <p class="fw-light" style="font-size: 1em;">{{ $lolosCount }}</p> <!-- Menampilkan count Lolos -->
                        </div>
                    </div>
                </div>
                <div class="col-4 d-flex justify-content-center">
                    <div class="card shadow border-0 rounded-3 w-50" style="background-color: #222C65;">
                        <div class="card-body text-center text-white">
                            <i class="bi bi-x fs-1"></i>
                            <div class="w-50 d-block mx-auto mb-3" style="height: 4px; background-color: white;"></div>
                            <p class="fw-light" style="font-size: 1em;">Gagal</p>
                            <p class="fw-light" style="font-size: 1em;">{{ $gagalCount }}</p> <!-- Menampilkan count Gagal -->
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                    <div class="w-100 mt-5 mb-4" style="height: 4px; background-color: orange;"></div>
                </div>
                <div class="col-12">
                    <table class="table table-hover border">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Keahlian Dilamar</th>
                                <th scope="col">Tanggal Input</th>
                                <th scope="col">Email</th>
                                <th scope="col">CV</th>
                                <th scope="col">Hasil</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($hasil as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->customer->nama_lengkap ?? '-' }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                                <td>{{ $item->customer->user->email ?? '-' }}</td>
                                <td>
                                    <a href="{{ Storage::url($item->customer->cv) }}" target="_blank">Lihat CV</a>
                                </td>
                                <td>
                                    @if ($item->status == 'Lulus')
                                    <form action="{{ route('laporan.generate') }}" method="POST" target="_blank">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary">
                                            Cetak Surat
                                        </button>
                                    </form>
                                @else
                                -
                            @endif
                                </td>
                                <td>
                                    @if ($item->status == 'Lulus')
                                        <span class="badge bg-success">Diterima</span>
                                    @elseif ($item->status == 'Gagal')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-warning">Menunggu</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
