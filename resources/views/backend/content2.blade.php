@extends('backend.layout')
@section('content')
    <h1 class="m-3">Dashboard</h1>
    <div class="mt-5">
      <div class="ms-3 mb-5 text-center">
        <h2>Pendaftar Elitra</h2>
        <div class="bg-warning mt-1 mx-auto" style="height: 4px; width: 10%;"></div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div id="karyawanChartContainer" class="chart-container mb-5 ms-3 pb-5">     
            {!! $chart->container() !!}
          </div>  
        </div>
        <div class="col-md-6">
          <div class="row">
        
            <div class="col-4 mt-4 mb-4">
              <div class="chart-container ms-3 p-3 border rounded shadow-lg" style="height: 170px;">
                <h3 class="text-center text-primary">Pendaftar Lulus</h3>
                <div class="bg-warning mt-3" style="height: 4px; width: 100%;"></div>
                <h1 class="mt-3 text-center">{{ $pendaftarLolos }}</h1>
              </div>
            </div>
            
            <div class="col-4 mt-4 mb-4">
              <div class="chart-container ms-3 p-3 border rounded shadow-lg" style="height: 170px;">
                <h3 class="text-center text-primary">Pendaftar Gagal</h3>
                <div class="bg-warning mt-3" style="height: 4px; width: 100%;"></div>
                <h1 class="mt-3 text-center">{{ $pendaftarGagal }}</h1>
              </div>
            </div>
            
            <div class="col-4 mt-4 mb-4">
              <div class="chart-container ms-3 p-3 border rounded shadow-lg" style="height: 170px;">
                <h5 class="text-center text-primary">Pendaftar dalam Proses</h5>
                <div class="bg-warning mt-4" style="height: 4px; width: 100%;"></div>
                <h1 class="mt-3 text-center">{{ $pendaftarProses }}</h1>
              </div>
            </div>
            
            <div class="col-12 mt-4 mb-4">
              <div class="chart-container ms-3 p-4 border rounded shadow-lg" style="height: 170px;">
                <h3 class="text-center text-primary">Total Pendaftar ke Elitra</h3>
                <div class="bg-warning mt-3" style="height: 4px; width: 100%;"></div>
                <h1 class="mt-3 text-center">{{ array_sum($pendaftarCount) }}</h1>
              </div>
            </div>
            

            

        
          </div>
        </div>
        
      </div>
        <h3 class="ms-4 mb-3">Karyawan Kami</h3>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        <table class="table table-hover ms-4 text-center" style="width: 98%">
            <thead>
              <tr class="border">
                <form method="GET" action="{{ route('backend.content2') }}">
                <th scope="col" colspan="11" style="">
                  <div class="d-flex" style="width: 100%;">
                    <div class="input-group" style="flex: 1;">
                      <span class="input-group-text bg-warning rounded-start bg-transparent">
                        <button type="submit" class="btn"><i class="bi-search"></i></button>
                      </span>
                      <input class="form-control" type="search" placeholder="Cari sesuatu..." aria-label="Search" name="query_pekerja_kontrak">
                    </div>
                    <a class="btn btn-primary ms-2" href="{{ route('backend.content2.create') }}" data-bs-toggle="modal" data-bs-target="#tambahPekerjaModal">Tambah Data</a>
                  </div>
                </th>
                </form>
              </tr>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Posisi Dikontrak</th>
                <th scope="col">Tanggal Mulai</th>
                <th scope="col">Tanggal Akhir</th>
                <th scope="col">PT</th>
                <th scope="col">Status Kontrak</th>    
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($pekerja as $row)
              <tr>
                <th scope="row">{{ $loop->iteration + ($pekerja->currentPage() - 1) * $pekerja->perPage() }}</th>
                <td><a data-bs-toggle="modal" data-bs-target="#detailKaryawan">{{ $row->nama }}</a></td>
                <td>{{ $row->posisi_dikontrak }}</td>
                <td>{{ $row->tanggal_mulai_kontrak }}</td>
                <td>{{ $row->tanggal_akhir_kontrak }}</td>
                <td>{{ $row->pt }}</td>
                <td>
                  @switch($row->status_kontrak)
                    @case('Aktif') <span class="badge bg-success">Aktif</span> @break
                    @case('Selesai') <span class="badge bg-secondary">Selesai</span> @break
                    @default -
                  @endswitch
                </td>
                <td>
                  <form action="{{ route('backend.content2.destroy', ['id' => $row->id]) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                  </form>
                  <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $row->id }}" role="button">Edit</a>
                </td>
              </tr>
          
              <!-- Modal Edit -->
              <div class="modal fade" id="editModal{{ $row->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $row->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
          
                    <div class="modal-header">
                      <h5 class="modal-title" id="editModalLabel{{ $row->id }}">Edit Pekerja</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
          
                    <div class="modal-body">
                      <form action="{{ route('backend.content2.update', [$row->id, $row->status]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
          
                        <div class="mb-3">
                          <label for="nama{{ $row->id }}" class="form-label">Nama</label>
                          <input type="text" name="nama" id="nama{{ $row->id }}" class="form-control" value="{{ $row->nama }}" required>
                        </div>
          
                        <div class="mb-3">
                          <label for="posisi_dikontrak{{ $row->id }}" class="form-label">Posisi</label>
                          <input type="text" name="posisi_dikontrak" id="posisi_dikontrak{{ $row->id }}" class="form-control" value="{{ $row->posisi_dikontrak }}" required>
                        </div>
          
                        <div class="mb-3">
                          <label for="email{{ $row->id }}" class="form-label">Email</label>
                          <input type="email" name="email" id="email{{ $row->id }}" class="form-control" value="{{ $row->email }}" required>
                        </div>
          
                        <div class="mb-3">
                          <label for="tanggal_mulai_kontrak{{ $row->id }}" class="form-label">Tanggal Mulai</label>
                          <input type="date" name="tanggal_mulai_kontrak" id="tanggal_mulai_kontrak{{ $row->id }}" class="form-control" value="{{ $row->tanggal_mulai_kontrak }}">
                        </div>
          
                        <div class="mb-3">
                          <label for="tanggal_akhir_kontrak{{ $row->id }}" class="form-label">Tanggal Akhir</label>
                          <input type="date" name="tanggal_akhir_kontrak" id="tanggal_akhir_kontrak{{ $row->id }}" class="form-control" value="{{ $row->tanggal_akhir_kontrak }}">
                        </div>
          
                        <div class="mb-3">
                          <label for="lama_kontrak{{ $row->id }}" class="form-label">Lama Kontrak (Bulan)</label>
                          <input type="number" name="lama_kontrak" id="lama_kontrak{{ $row->id }}" class="form-control" value="{{ $row->lama_kontrak }}">
                        </div>
          
                        <div class="mb-3">
                          <label for="upah_kontrak{{ $row->id }}" class="form-label">Upah Kontrak</label>
                          <input type="text" name="upah_kontrak" id="upah_kontrak{{ $row->id }}" class="form-control" value="{{ $row->upah_kontrak }}">
                        </div>
          
                        <div class="mb-3">
                          <label for="pt{{ $row->id }}" class="form-label">Perusahaan</label>
                          <input type="text" name="pt" id="pt{{ $row->id }}" class="form-control" value="{{ $row->pt }}">
                        </div>
          
                        <div class="mb-3">
                          <label for="status{{ $row->id }}" class="form-label">Status</label>
                          <select name="status_kontrak" id="status{{ $row->id }}" class="form-select" required>
                            <option value="Aktif" {{ $row->status_kontrak == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Selesai" {{ $row->status_kontrak == 'Selesai' ? 'selected' : '' }}>Selesai</option>                            
                          </select>
                        </div>
                        
                           
                        <div class="mb-3">
                          <label for="cv{{ $row->id }}" class="form-label">CV</label>
                          <input type="file" name="cv" id="cv{{ $row->id }}" class="form-control">
                        </div>
          
                        <div class="d-flex justify-content-between">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
          
                      </form>
                    </div>
          
                  </div>
                </div>
              </div>
              @empty
              <tr>
                <td colspan="11" class="text-center">Tidak ada data kontrak.</td>
              </tr>
              @endforelse
          </tbody>
          

          </table>
          <div class="" style="display: flex; margin-left: 40%;">
            {{ $pekerja->links() }}
          </div>


          <!-- Modal -->
          <div class="modal fade" id="tambahPekerjaModal" tabindex="-1" aria-labelledby="tambahPekerjaModal" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="tambahPekerjaModal">Tambah Kontrak Baru</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('backend.content2.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                      <div class="col-md-6">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                      </div>
                      <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                      </div>
                      <div class="col-md-6">
                        <label for="posisi_dikontrak" class="form-label">Posisi Dikontrak</label>
                        <input type="text" class="form-control" id="posisi_dikontrak" name="posisi_dikontrak" required>
                      </div>
                      <div class="col-md-6">
                        <label for="pt" class="form-label">PT</label>
                        <input type="text" class="form-control" id="pt" name="pt">
                      </div>
                      <div class="col-md-6">
                        <label for="tanggal_mulai_kontrak" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="tanggal_mulai_kontrak" name="tanggal_mulai_kontrak" required>
                      </div>
                      <div class="col-md-6">
                        <label for="tanggal_akhir_kontrak" class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="tanggal_akhir_kontrak" name="tanggal_akhir_kontrak" required>
                      </div>
                      <div class="col-md-6">
                        <label for="lamaProyek" class="form-label">Lama Proyek (Bulan)</label>
                        <input type="number" class="form-control" id="lamaProyek" name="lama_kontrak" min="1">
                      </div>                      
                      <div class="col-md-6">
                        <label for="gaji" class="form-label">Gaji Kontrak (per Bulan)</label>
                        <input type="number" class="form-control" id="upah_kontrak" name="upah_kontrak">
                      </div>
                      <div class="col-md-6">
                        <label for="statusKontrak" class="form-label">Status Kontrak</label>
                        <select class="form-select" id="statusKontrak" name="status_kontrak" required>
                          <option value="pending">Pending</option>
                          <option value="aktif">Aktif</option>
                          <option value="akan_berakhir">Akan Berakhir</option>
                          <option value="diperpanjang">Diperpanjang</option>
                          <option value="selesai">Selesai</option>
                          <option value="dibatalkan">Dibatalkan</option>
                        </select>
                      </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
              </div>
            </div>
          </div>


          
    </div>

@endsection
