@extends('backend.layout')

@section('content')
<div class="">
    <h1 class="ms-4 mt-5">Request Pendaftar ke Perusahaan ELITRA</h1>
    <table class="table table-hover ms-4 text-center" style="width: 98%">
        <thead>
          <tr class="border">
            <form method="GET" action="{{ route('backend.content3.index') }}">
            <th scope="col" colspan="12" style="">
              <div class="d-flex" style="width: 100%;">
                <div class="input-group" style="flex: 1;">
                  <span class="input-group-text bg-warning rounded-start bg-transparent">
                    <button type="submit" class="btn"><i class="bi-search"></i></button>
                  </span>
                  <input class="form-control" type="search" placeholder="Cari sesuatu..." aria-label="Search" name="query">
                </div>
              </div>
            </th>

            </form>
          </tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Posisi Dilamar</th>
            <th scope="col">Email</th>
            <th scope="col">Jawaban</th>
            <th scope="col">Tanggal Submit</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pendaftar as $row)
          <tr>
              <th scope="row">{{ $loop->iteration + ($pendaftar->currentPage() - 1) * $pendaftar->perPage() }}</th>
              <td>{{ $row->customer->nama_lengkap ?? '-' }}</td>
              <td>{{ $row->lowongan->first()->posisi?? '-' }}</td>
              <td>{{ $row->user->email ?? '-' }}</td>
              <td>
                  <a href="#" data-bs-toggle="modal" data-bs-target="#detailModal{{ $row->id }}">Jawaban</a>
              </td>
              <td>{{ $row->created_at }}</td>
              <td>
                <!-- Ubah Status -->
                <form action="{{ route('backend.content3.updateStatus', ['id' => $row->id]) }}" method="post">
                    @csrf
                    @method('patch')
                    <select name="status" class="form-select 
                        {{ $row->status == 'Sedang Di Proses' ? 'bg-warning' : 
                        ($row->status == 'Lulus' ? 'bg-success' : 'bg-danger') }}" 
                        onchange="this.style.backgroundColor = this.options[this.selectedIndex].className == 'bg-warning' ? '#ffc107' : (this.options[this.selectedIndex].className == 'bg-success' ? '#28a745' : '#dc3545'); this.form.submit();">
                        <option class="bg-warning" value="Sedang Di Proses" {{ $row->status == 'Sedang Di Proses' ? 'selected' : '' }}>Sedang Di Proses</option>
                        <option class="bg-success" value="Lulus" {{ $row->status == 'Lulus' ? 'selected' : '' }}>Lulus</option>
                        <option class="bg-danger" value="Gagal" {{ $row->status == 'Gagal' ? 'selected' : '' }}>Gagal</option>
                    </select>
                </form>
            
                <!-- Tombol Terima -->
                @if ($row->status == 'Lulus' && !$row->customer->user->sudahKontrak)
                <form action="{{ route('terima.pendaftar', ['lamaran_id' => $row->id]) }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Yakin ingin terima pendaftar ini jadi karyawan?')">
                        Terima
                    </button>
                </form>
                @endif
            </td>
            
              <td>
                  <form action="{{ route('backend.content3.destroy', ['id' => $row->id]) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
              </td>
          </tr>  
          <div class="modal fade" id="detailModal{{ $row->id }}" tabindex="-1">
            <div class="modal-dialog modal-xl"> <!-- ganti ukurannya di sini -->
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Detail Jawaban</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p class="card-text">Nama : {{ $row->customer->nama_lengkap ?? '-' }}</p>
                  <span>
                    <p class="card-text">Foto Ktp :</p>
                    <img src="{{ Storage::url($row->jawabanSoal->first()->foto_ktp) }}" class="card-img-top mb-3" style="width: 200px; " alt="...">
                  </span>
                  <p class="card-text">Posisi Dilamar : {{ $row->lowongan->first()->posisi?? '-' }}</p>
                  <p class="card-text">Perusahaan yang di tuju : {{ $row->lowongan->first()->perusahaan ?? '-' }}</p>
                  <p class="card-text">Email : {{ $row->user->email ?? '-' }}</p>
                  <p class="card-text">Pengalaman : {{ $row->customer->experience?? '-' }} Tahun</p>
                  <p class="card-text">Pendidikan Terakhir : {{ $row->jawabanSoal->first()->pendidikan ?? '-' }}</p>
                  <p class="card-text">Harapan Gaji : {{ $row->jawabanSoal->first()->harapan_gaji ?? '-' }}</p>
                  <span class="card-text">CV : <a href="{{ asset('storage/cv/' . $row->customer->cv) }}" target="_blank">Lihat CV</a></span>
                  <div class="w-100 mt-3" style="height: 4px; background-color: orange;"></div>
                  <div class="mt-3">
                    @foreach ($row->jawabanSoal as $jawaban)
                        <p><strong>Pertanyaan:</strong> {{ $jawaban->soalLowongan->soal }}</p>
                        <p><strong>Jawaban:</strong> {{ $jawaban->jawaban }}</p>
                    @endforeach
                
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach        
        </tbody>
    </table>
    


    <div class="" style="display: flex; margin-left: 40%;">
      {{ $pendaftar->links() }}
    </div>
    <div class="mt-4 ms-4" style="width: 80%;">
      <h5>Cetak Laporan</h5>
      <form action="{{ route('laporan.generate2') }}" method="POST" target="_blank">
          @csrf
          <div class="row">
              <div class="col-md-5">
                  <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
                  <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" required>
              </div>
              <div class="col-md-5">
                  <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
                  <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" required>
              </div>
              <div class="col-md-2 align-self-end">
                  <button type="submit" class="btn btn-primary mt-3">Cetak Laporan</button>
              </div>
          </div>
      </form>
  </div>
  
</div>
@endsection
