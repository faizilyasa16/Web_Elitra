@extends('backend.layout')

@section('content')
<div class="card mt-5 ms-3">
    <div class="card-header">
        <h3>Edit Lowongan</h3>
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
        <form action="{{ route('backend.content7.update', $lowongan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select" required>
                    <option value="" disabled>-- Pilih Status --</option>
                    <option value="Blok" {{ $lowongan->status == 'Blok' ? 'selected' : '' }}>Blok</option>
                    <option value="Public" {{ $lowongan->status == 'Public' ? 'selected' : '' }}>Public</option>
                </select>
                
            </div>
            @if ($lowongan->img)
                <label for="img" class="form-label">Banner</label>
                <div class="mb-3">
                    <img src="{{ Storage::url($lowongan->img) }}" alt="Current Banner" class="img-fluid mb-2" style="max-height: 150px;">
                </div>
            @endif
                <input type="file" name="img" id="img" class="form-control" accept="image/*">
        
            
            <div class="mb-3">
                <label for="posisi" class="form-label">Posisi</label>
                <input type="text" name="posisi" id="posisi" class="form-control" value="{{ $lowongan->posisi }}" required>
            </div>
            <div class="mb-3">
                <label for="perusahaan" class="form-label">Perusahaan</label>
                <input type="text" name="perusahaan" id="perusahaan" class="form-control" value="{{ $lowongan->perusahaan }}" required>
            </div>
            <div id="job_description-section" class="mb-3">
                <h4>Job Description</h4>
                @foreach ($job_description as $desc)
                    <div class="mb-2 deskripsi-item">
                        <div class="input-group">
                            <input type="text" name="deskripsi[]" class="form-control" value="{{ $desc }}" placeholder="Job Description" required>
                            <button type="button" class="btn btn-danger btn-sm" onclick="hapusDeskripsi(this)">Hapus</button>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <button type="button" class="btn btn-outline-secondary mb-3" onclick="tambahDeskripsi()">+ Tambah Job Description</button>
            
            <div id="kualifikasi-section" class="mb-3">
                <h4>Kualifikasi</h4>
                @foreach ($kualifikasi as $kual)
                    <div class="mb-2">
                        <input type="text" name="kualifikasi[]" class="form-control" value="{{ $kual }}" placeholder="Kualifikasi" required>
                    </div>
                @endforeach
            </div>
            
            <button type="button" class="btn btn-outline-secondary mb-3" onclick="tambahKualifikasi()">+ Tambah Kualifikasi</button>
            
            <div id="benefit-section" class="mb-3">
                <h4>Benefit</h4>
                @foreach ($benefit as $b)
                    <div class="mb-2">
                        <input type="text" name="benefit[]" class="form-control" value="{{ $b }}" placeholder="Benefit" required>
                    </div>
                @endforeach
            </div>
            
            <button type="button" class="btn btn-outline-secondary mb-3" onclick="tambahBenefit()">+ Tambah Benefit</button>
            

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $lowongan->alamat }}" required>
            </div>

            <div class="mb-3">
                <label for="tipe" class="form-label">Tipe Pekerjaan</label>
                <select name="tipe" id="tipe_pekerjaan" class="form-select" required>
                    <option value="fulltime" {{ $lowongan->tipe == 'fulltime' ? 'selected' : '' }}>Full Time</option>
                    <option value="parttime" {{ $lowongan->tipe == 'parttime' ? 'selected' : '' }}>Part Time</option>
                    <option value="freelance" {{ $lowongan->tipe == 'freelance' ? 'selected' : '' }}>Freelance</option>
                </select>
                
            </div>
            <div class="mb-3">
                <label for="pendidikan" class="form-label">Pendidikan Minimal</label>
                <select name="pendidikan" id="pendidikan" class="form-select" required>
                    <option value="" disabled>-- Pilih Pendidikan --</option>
                    <option value="SMA/SMK" {{ $lowongan->pendidikan == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                    <option value="D3" {{ $lowongan->pendidikan == 'D3' ? 'selected' : '' }}>D3</option>
                    <option value="S1" {{ $lowongan->pendidikan == 'S1' ? 'selected' : '' }}>S1</option>
                    <option value="S2" {{ $lowongan->pendidikan == 'S2' ? 'selected' : '' }}>S2</option>
                    <option value="S3" {{ $lowongan->pendidikan == 'S3' ? 'selected' : '' }}>S3</option>
                </select>                
            </div>
            

            <div class="mb-3">
                <label for="gaji" class="form-label">Gaji</label>
                <input type="text" name="gaji" id="gaji" class="form-control" value="{{ $lowongan->gaji }}" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('backend.content7') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>


@endsection