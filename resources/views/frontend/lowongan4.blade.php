@extends('frontend.layout')

@section('content')
{{-- bikin main content --}}

<div class="mt-5 mb-5">
    <div class="container">
        <!-- Konten lowongan pekerjaan -->
        <div id="jobContent">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h1 class="text-start" style="margin-top: 150px">Software Developer</h1>
            <div class="bg-warning mb-4" style="height: 4px; width: 12%;"></div>
            <div class="card">
                <div class="card text-bg-dark">
                    <img src="img/lowongan4.jpg" class="card-img opacity-50" alt="..." style="width: 100%; height: 400px; object-fit: cover;">
                    <div class="card-img-overlay text-center d-flex align-items-center justify-content-center flex-column mt-5">
                        <!-- Placeholder jika ada konten tambahan di overlay -->
                    </div>
                </div>
                <div class="card-body">
                    <h1 class="text-start ms-3">Software Developer</h1>
                    <ul class="list-group list-group-flush no-border">
                        <li class="list-group-item">
                            <i class="bi bi-geo-alt-fill me-3"></i><p class="d-inline ms-3">Kota Bekasi</p>
                        </li> 
                        <li class="list-group-item">
                            <i class="bi bi-briefcase-fill me-3"></i><p class="d-inline ms-3">Full Time</p>
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-mortarboard-fill me-3"></i><p class="d-inline ms-3">Minimal Sarjana(S1)</p>
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-cash me-3"></i><p class="d-inline ms-3">Rp. 9.000.000 - 14.000.000</p>
                        </li>
                    </ul>
                </div>
                <div class="card-body ms-4">
                    <h5 class="card-title">Job Description :</h5>
                    <ul class="mt-4">
                        <li>Mengembangkan, menguji, dan memelihara aplikasi perangkat lunak.</li>
                        <li>Menulis kode yang efisien, dapat dibaca, dan dapat diandalkan.</li>
                        <li>Berkolaborasi dengan tim untuk merancang solusi teknis yang optimal.</li>
                        <li>Mengidentifikasi dan memperbaiki bug pada aplikasi perangkat lunak.</li>
                        <li>Memastikan aplikasi memiliki performa yang baik dan mudah diakses.</li>
                    </ul>
                </div>
                <div class="card-body ms-4">
                    <h5 class="card-title">Kualifikasi :</h5>
                    <ul class="mt-4">
                        <li>Gelar Sarjana di bidang Teknik Informatika, Ilmu Komputer, atau bidang terkait dengan IPK minimal 3.0.</li>
                        <li>Pengalaman minimal 2 tahun sebagai Software Developer atau posisi serupa.</li>
                        <li>Menguasai bahasa pemrograman seperti Java, Python, atau JavaScript.</li>
                        <li>Familiar dengan framework pengembangan seperti Spring, Django, atau React.</li>
                        <li>Memiliki kemampuan problem-solving dan logika yang baik.</li>
                    </ul>
                </div>
                <div class="card-body ms-4">
                    <h5 class="card-title">Benefit :</h5>
                    <ul class="mt-4">
                        <li>Asuransi kesehatan dan jiwa</li>
                        <li>Kesempatan bekerja dengan teknologi terbaru</li>
                        <li>Tunjangan transportasi</li>
                        <li>Bonus tahunan berdasarkan kinerja</li>
                        <li>Lingkungan kerja yang mendukung pengembangan skill</li>
                    </ul>
                </div>
                <div class="d-flex me-3 pb-3">
                    <button class="btn btn-primary mt-3 ms-auto" onclick="showForm()">Apply</button>
                </div>
            </div>
        </div>

        <!-- Form yang menggantikan konten lowongan ketika tombol Apply diklik -->
        <div id="applyForm" class="card p-4" style="margin-top: 150px">
            <h2>Apply for Software Developer Position</h2>
            <form action="{{ route('backend.content3.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="posisi_dilamar" name="posisi_dilamar" value="Software Developer">
                <div class="mb-3">
                    <label for="cv" class="form-label">Resume/CV</label>
                    <input type="file" id="cv" name="cv" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="letter" class="form-label">Cover Letter</label>
                    <input type="file" id="letter" name="letter" class="form-control" >
                </div>
                   <div class="d-flex me-3 pb-3">
                    <button class="btn btn-secondary mt-3 me-auto" onclick="hideForm()">Kembali</button>
                    <button class="btn btn-primary mt-3 ms-auto" onclick="showForm('Software Developer')">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection