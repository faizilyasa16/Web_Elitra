@extends('backend.layout')

@section('content')
<div class="card mt-5 ms-3">
    <div class="card-header">
        <h3>Tambah Lowongan</h3>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body">
        <form action="{{ route('backend.content7.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="status" value='Blok'>
            <div class="mb-3">
                <label for="img" class="form-label">Banner</label>
                <input type="file" name="img" id="img" class="form-control" accept="image/*">
            </div>
            
            <div class="mb-3">
                <label for="posisi" class="form-label">Posisi</label>
                <input type="text" name="posisi" id="posisi" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="perusahaan" class="form-label">Perusahaan</label>
                <input type="text" name="perusahaan" id="perusahaan" class="form-control" required>
            </div>
            <div id="job_description-section" class="mb-3">
                <h4>Job Description</h4>
                <div class="mb-2 deskripsi-item">
                    <input type="text" name="deskripsi[]" class="form-control" placeholder="Job Description" required>
                </div>
            </div>
            <button type="button" class="btn btn-outline-secondary mb-3" onclick="tambahDeskripsi()">+ Tambah Job Description</button>
            
            <div id="kualifikasi-section" class="mb-3">
                <h4>Kualifikasi</h4>
                <div class="mb-2 kualifikasi-item">
                    <input type="text" name="kualifikasi[]" class="form-control" placeholder="Kualifikasi" required>
                </div>
            </div>
            <button type="button" class="btn btn-outline-secondary mb-3" onclick="tambahKualifikasi()">+ Tambah Kualifikasi</button>
            
            <div id="benefit-section" class="mb-3">
                <h4>Benefit</h4>
                <div class="mb-2 benefit-item">
                    <input type="text" name="benefit[]" class="form-control" placeholder="Benefit" required>
                </div>
            </div>
            <button type="button" class="btn btn-outline-secondary mb-3" onclick="tambahBenefit()">+ Tambah Benefit</button>
            

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe Pekerjaan</label>
                <select name="tipe" id="tipe" class="form-select" required>
                    <option value="fulltime">Full Time</option>
                    <option value="parttime">Part Time</option>
                    <option value="freelance">Freelance</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="pendidikan" class="form-label">Pendidikan Minimal</label>
                <select name="pendidikan" id="pendidikan" class="form-select" required>
                    <option value="" disabled selected>-- Pilih Pendidikan --</option>
                    <option value="SMA/SMK">SMA/SMK</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
            

            <div class="mb-3">
                <label for="gaji" class="form-label">Gaji</label>
                <input type="text" name="gaji" id="gaji" class="form-control" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('backend.content7') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>


@endsection