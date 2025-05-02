@extends('backend.layout')

@section('content')
<div class="">
    <h1 class="ms-4 mt-5">Perusahaan dengan Karyawan Elitra</h1>
    <table class="table table-hover ms-4 text-center" style="width: 98%">
        <thead>
          <tr class="border">
            <form method="GET" action="{{ route('backend.content4') }}">
            <th scope="col" colspan="8" style="">
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
            <th scope="col">Perusahaan</th>
            <th scope="col">Jumlah Staff Bekerja Sama</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data4 as $row)
            <tr>
              <th scope="row">{{ $loop->iteration + ($data4->currentPage() - 1) * $data4->perPage() }}</th>
              <td>{{ $row->pt }}</td>
              <td>{{ $row->total }}</td>
            </tr>
                @endforeach
        </tbody>
      </table>
      <div class="modal fade" id="tambahPerusahaan" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">Tambah Perusahaan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
    
            <div class="modal-body">
              <form action="{{ route('backend.content4.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="mb-3">
                  <label for="perusahaan" class="form-label">Nama Perusahaan</label>
                  <input type="text" name="perusahaan" id="perusahaan" class="form-control" required>
              </div>

              <div class="mb-3">
                  <label for="jumlah_staff_bekerja_sama" class="form-label">Jumlah Staff Bekerja Sama</label>
                  <input type="number" name="jumlah_staff_bekerja_sama" id="jumlah_staff_bekerja_sama" class="form-control" required>
              </div>

              <div class="mb-3">
                  <label for="tanggal_terdaftar" class="form-label">Tanggal Terdaftar</label>
                  <input type="date" name="tanggal_terdaftar" id="tanggal_terdaftar" class="form-control" required>
              </div>

              <div class="mb-3">
                  <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir</label>
                  <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="form-control" required>
              </div>

              <div class="mb-3">
                  <label for="email_perusahaan" class="form-label">Email Perusahaan</label>
                  <input type="email" name="email_perusahaan" id="email_perusahaan" class="form-control" required>
              </div>

              <div class="mb-3">
                  <label for="status" class="form-label">Status Perusahaan</label>
                  <select name="status" id="status" class="form-select" required>
                      <option value="Terdaftar">Terdaftar</option>
                      <option value="Berakhir">Berakhir</option>
                  </select>
              </div>

              <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            
              </form>
            </div>
            
    
          </div>
        </div>
      </div>
      <div class="" style="display: flex; margin-left: 40%;">
        {{ $data4->links() }}
      </div>
      {{-- <div class="mt-4 ms-4" style="width: 80%;">
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
    </div> --}}
</div>
@endsection