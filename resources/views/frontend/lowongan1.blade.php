@extends('frontend.layout')

@section('content')
{{-- bikin main content --}}
<style>
    .is-invalid {
  border-color: #dc3545;
}

</style>

<div class="mt-5 mb-5">
    <div class="container">
        <!-- Konten lowongan pekerjaan -->
        <div id="jobContent">

            <h1 class="text-start" style="margin-top: 150px">WEB DEVELOPER</h1>
            <div class="bg-warning mb-4" style="height: 4px; width: 12%;"></div>
            <div class="jobContent">
                <div class="card">
                    <div class="card text-bg-dark">
                        <img src="{{ Storage::url($lowongan->img) }}" class="card-img opacity-50" alt="..." style="width: 100%; height: 400px; object-fit: cover;">
                        <div class="card-img-overlay text-center d-flex align-items-center justify-content-center flex-column mt-5">
                            <!-- Placeholder jika ada konten tambahan di overlay -->
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <h1 class="text-start ms-3">{{ $lowongan->posisi }}</h1>
                        <ul class="list-group list-group-flush no-border">
                            <li class="list-group-item">
                                <i class="bi bi-geo-alt-fill me-3"></i><p class="d-inline ms-3">{{ $lowongan->alamat }}</p>
                            </li> 
                            <li class="list-group-item">
                                <i class="bi bi-briefcase-fill me-3"></i><p class="d-inline ms-3">{{ ucwords(str_replace('time', ' Time', $lowongan->tipe)) }}</p>
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-mortarboard-fill me-3"></i><p class="d-inline ms-3">Minimal Pendidikan {{ $lowongan->pendidikan }}</p>
                            </li>
                            <li class="list-group-item">
                                <i class="bi bi-cash me-3"></i><p class="d-inline ms-3">{{ $lowongan->gaji }}</p>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body ms-4">
                        <h5 class="card-title">Job Description :</h5>
                        <ul class="mt-4">
                            @foreach ($deskripsi as $row)
                                <li>{{ $row->deskripsi }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body ms-4">
                        <h5 class="card-title">Kualifikasi :</h5>
                        <ul class="mt-3">
                            @foreach ($kualifikasi as $row)
                                <li>{{ $row->kualifikasi }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body ms-4">
                        <h5 class="card-title">Benefit :</h5>
                        <ul class="mt-3">
                            @foreach ($benefit as $row)
                                <li>{{ $row->benefit }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="d-flex me-3 pb-3">
                        @if (!$isLoggedIn)
                            <button class="btn btn-secondary mt-3 ms-auto" onclick="showLoginWarning()">Apply</button>
                        @elseif (!$hasCompleteProfile)
                            <button class="btn btn-warning mt-3 ms-auto" onclick="showProfileWarning()">Apply</button>
                        @else
                            <button class="btn btn-primary mt-3 ms-auto" onclick="showForm()">Apply</button>
                        @endif
                    </div>
                    
                    
                </div>
            </div>
            </div>
            

        <!-- Form yang menggantikan konten lowongan ketika tombol Apply diklik -->
        <div id="applyForm" class="card" style="margin-top: 150px">
            <div class="card text-bg-dark">
                <img src="img/lowongan.jpg" class="card-img opacity-50" alt="..." style="width: 100%; height: 400px; object-fit: cover;">
                <div class="card-img-overlay text-center d-flex align-items-center justify-content-center flex-column mt-5">
                    <!-- Placeholder jika ada konten tambahan di overlay -->
                </div>
            </div>
            <form action="{{ route('lowongan.tambah', $lowongan->id) }}" class="p-4" method="POST" enctype="multipart/form-data">
                @csrf
                <h4 class="mb-3 text-center" id="stepTitle">Step 1: Upload Resume</h4>

                <div class="step-wrapper">
                  <div class="step-line" id="stepLine"></div>
                  <div class="step active" id="step1">1</div>
                  <div class="step" id="step2">2</div>
                  <div class="step" id="step3">3</div>
                </div>

                    <div id="content1" class="step-content active">
                        <h2 class="mb-3">Apply for Web Developer Position</h2>
                        <div class="card">
                            <div class="card-body p-5">
                                <input type="hidden" id="perusahaan" name="perusahaan" value="{{ $lowongan->perusahaan }}">
                                <div class="mb-3">
                                    <label for="cv" class="form-label">Upload CV</label>
                                    <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv" name="cv">
                                    @if ($customer && $customer->cv)
                                        <div class="mt-2">
                                            <small>File saat ini: 
                                                <a href="{{ asset('storage/cv/' . $customer->cv) }}" target="_blank">Lihat CV</a>
                                            </small>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="letter" class="form-label">Cover Letter</label>
                                    <input type="file" class="form-control @error('letter') is-invalid @enderror" id="letter" name="letter">
                                    @error('letter')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="foto_ktp" class="form-label">Foto KTP</label>
                                    <input type="file" class="form-control @error('foto_ktp') is-invalid @enderror" id="foto_ktp" name="foto_ktp">
                                    @error('foto_ktp')
                                      <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div id="content2" class="step-content">
                        <h2 class="mb-3 mt-5">Apply for Web Developer Position</h2>
                        <div class="card">
                            <div class="card-body p-5">
                                    <input type="hidden" id="posisi_dilamar" name="posisi_dilamar" value="Web Developer">
                                    <div class="mb-3">
                                        <label for="pengalaman" class="form-label">Pengalaman dalam bidang(tahun) </label>
                                        <input type="number" class="form-control @error('pengalaman') is-invalid @enderror" value="{{ $customer->experience }}" id="pengalaman" name="pengalaman" required>
                                        @error('pengalaman')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="harapan_gaji" class="form-label">Gaji yang diharapkan</label>
                                        <input type="text" class="form-control @error('harapan_gaji') is-invalid @enderror" id="harapan_gaji" name="harapan_gaji" required>
                                        @error('harapan_gaji')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="pendidikan" class="form-label">Pendidikan Terakhir</label>
                                        <select id="pendidikan" name="pendidikan" class="form-control @error('pendidikan') is-invalid @enderror" required>
                                          <option value="">-- Pilih Pendidikan --</option>
                                          <option value="SD" >SD</option>
                                          <option value="SMP">SMP</option>
                                          <option value="SMA">SMA/SMK</option>
                                          <option value="D3">D3</option>
                                          <option value="S1">S1</option>
                                          <option value="S2">S2</option>
                                          <option value="S3">S3</option>
                                        </select>
                                        @error('pendidikan')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div id="content3" class="step-content">
                        @foreach ($soalLowongan as $soal)
                        <div class="mb-3">
                            <label for="jawaban[{{ $soal->id }}]">{{ $soal->soal }}</label>
                            <input type="text" id="jawaban[{{ $soal->id }}]"  name="jawaban[{{ $soal->id }}]" class="form-control mt-2" required>
                        </div>
                    @endforeach
                    </div>
                  
                    <!-- Tombol navigasi -->
                    <div class="d-flex justify-content-end gap-3 mt-4 p-4">
                      <button class="btn btn-secondary" onclick="prevStep()">Back</button>
                      <button id="nextButton" class="btn btn-primary" onclick="nextStep()">Next</button>
                    </div>
                <!-- Isi konten tiap step -->
            </form>
                
        </div>
    </div>
</div>


<script>
    function submitForm() {
  alert('Form berhasil dikirim! 🎉');
  // Bisa lanjut redirect, kirim data via AJAX atau reset di sini
}
function showLoginWarning() {
        alert("Silakan login terlebih dahulu untuk melamar.");
        window.location.href = "{{ route('backend.login') }}"; // arahkan ke halaman login
    }

    function showProfileWarning() {
        alert("Lengkapi data diri Anda terlebih dahulu sebelum melamar.");
        window.location.href = "{{ route('profile') }}"; // ganti sesuai route profil customer
    }
</script>
@endsection