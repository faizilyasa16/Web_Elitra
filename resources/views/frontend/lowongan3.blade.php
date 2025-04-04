<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/Bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="css\Bootstrap-icon/font/bootstrap-icons.css">
    <style>
        .navbar ul li a {
            color: white;
            transition: color 0.3s ease;
        }

        .navbar ul li a:hover {
            color: orange;
        }
        .no-border .list-group-item {
            border: none;
        }
        #applyForm {
                    display: none; /* Form tidak terlihat secara default */
                    margin-top: 20px;
                }
    </style>
</head>
<body>
    <div class="w-100 d-flex align-items-center justify-content-between position-fixed top-0" style="height: 100px; z-index: 1000; background-color: #222C65;">
        <ul class="d-flex align-items-center list-unstyled m-0">
            <li class="d-flex position-relative" style="right: 10px; bottom: 5px;">
                <img src="img/logo_elitra.png" alt="" width="150px">
            </li>
        </ul>
        <div class="me-5 navbar">
            <ul class="d-flex gap-4 m-0 list-unstyled align-items-center justify-content-center">
                <li><a href="{{ route('homefrontend') }}" class="text-decoration-none">Home</a></li>
                <li><a href="{{ route('lowonganfrontend') }}" class="text-decoration-none">Lowongan</a></li>
                <li><a href="{{ route('aboutusfrontend') }}" class="text-decoration-none me-2">Tentang Kami</a></li>
            </ul>
        </div>        
    </div>

    {{-- bikin main content --}}

    
    <div class="mt-5 mb-5">
        <div class="container">
            <!-- Konten lowongan pekerjaan -->
            <div id="jobContent" style="margin-top: 150px">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <h1 class="text-start" style="margin-top: 150px">UI/UX DESIGNER</h1>
                <div class="bg-warning mb-4" style="height: 4px; width: 12%;"></div>
                <div class="card">
                    <div class="card text-bg-dark">
                        <img src="img/lowongan3.jpg" class="card-img opacity-50" alt="..." style="width: 100%; height: 400px; object-fit: cover;">
                        <div class="card-img-overlay text-center d-flex align-items-center justify-content-center flex-column mt-5">
                            <!-- Placeholder jika ada konten tambahan di overlay -->
                        </div>
                    </div>
                    <div class="card-body">
                        <h1 class="text-start ms-3">UI/UX Designer</h1>
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
                                <i class="bi bi-cash me-3"></i><p class="d-inline ms-3">Rp. 8.000.000 - 12.000.000</p>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body ms-4">
                        <h5 class="card-title">Job Description :</h5>
                        <ul class="mt-4">
                            <li>Merancang wireframe, mockup, dan prototipe untuk aplikasi web dan mobile.</li>
                            <li>Melakukan riset pengguna untuk memahami kebutuhan dan preferensi mereka.</li>
                            <li>Berkolaborasi dengan tim pengembang dan pemangku kepentingan untuk memastikan implementasi desain yang efektif.</li>
                            <li>Melakukan pengujian dan iterasi desain berdasarkan umpan balik pengguna.</li>
                            <li>Memastikan desain yang dihasilkan sesuai dengan prinsip desain user-centric.</li>
                        </ul>
                    </div>
                    <div class="card-body ms-4">
                        <h5 class="card-title">Kualifikasi :</h5>
                        <ul class="mt-4">
                            <li>Gelar Sarjana di bidang Desain Grafis, Teknologi Informasi, atau bidang terkait dengan IPK minimal 3.0.</li>
                            <li>Pengalaman minimal 2 tahun sebagai UI/UX Designer atau posisi terkait.</li>
                            <li>Menguasai tools desain seperti Figma, Sketch, atau Adobe XD.</li>
                            <li>Memahami prinsip desain responsif dan pengalaman pengguna yang baik.</li>
                            <li>Portofolio desain UI/UX yang menarik merupakan nilai tambah.</li>
                        </ul>
                    </div>
                    <div class="card-body ms-4">
                        <h5 class="card-title">Benefit :</h5>
                        <ul class="mt-4">
                            <li>Asuransi kesehatan dan jiwa</li>
                            <li>Tunjangan transportasi</li>
                            <li>Kesempatan pengembangan karir</li>
                            <li>Bonus tahunan berdasarkan kinerja</li>
                            <li>Lingkungan kerja yang kreatif dan inovatif</li>
                        </ul>
                    </div>
                    <div class="d-flex me-3 pb-3">
                        <button class="btn btn-primary mt-3 ms-auto" onclick="showForm()">Apply</button>
                    </div>
                </div>
            </div>

            <!-- Form yang menggantikan konten lowongan ketika tombol Apply diklik -->
            <div id="applyForm" class="card p-4" style="margin-top: 150px">
                <h2>Apply for UI/UX Designer Position</h2>
                <form action="{{ route('backend.content3.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="posisi_dilamar" name="posisi_dilamar" value="UI/UX">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No. Telepon</label>
                        <input type="tel" id="no_telepon" name="no_telepon" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_ktp" class="form-label">Domisili</label>
                        <input type="text" id="alamat_ktp" name="alamat_ktp" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_tinggal" class="form-label">Alamat lengkap</label>
                        <input type="text" id="alamat_tinggal" name="alamat_tinggal" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="jabatan_sebelumnya">Pengalaman Sebelumnya</label>
                        <input type="text" id="jabatan_sebelumnya" name="jabatan_sebelumnya" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="lama_pengalaman">Lama Pengalaman di bidang ini(Bulan)</label>
                        <input type="text" id="lama_pengalaman" name="lama_pengalaman" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="gaji_diharapkan" class="form-label">Gaji yang diharapkan</label>
                        <input type="text" id="gaji_diharapkan" name="gaji_diharapkan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="cv" class="form-label">Resume/CV</label>
                        <input type="file" id="cv" name="cv" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="linkedin" class="form-label">Linkedin (Opsional)</label>
                        <input type="text" id="linkedin" name="linkedin" class="form-control" >
                    </div>
                       <div class="d-flex me-3 pb-3">
                        <button class="btn btn-secondary mt-3 me-auto" onclick="hideForm()">Kembali</button>
                        <button class="btn btn-primary mt-3 ms-auto" onclick="showForm('UI/UX')">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="w-100" style="height: 200px; background-color: #222C65;">
        <div class="container">
          <div class="row">
            <div class="col-3">
              <img src="{{ asset('img/logo_elitra.png') }}" alt="" style="width: 200px;">
            </div>
            <div class="col-3" style="margin-top: 20px">
              <h4 class="text-white">Tentang Kami</h4>
              <p class="text-white">EIitra adalah layanan outsourcing berbasis software yang fokus pada rekrutmen, mempermudah pencarian pekerjaan dan perekrutan karyawan dengan solusi efisien dan terintegrasi.</p>
            </div>
            <div class="col-3" style="margin-top: 20px;">
              <h4 class="text-white">Follow Us</h4>
              <ul class="list-unstyled d-flex m-0 p-0">
                <li class="me-3">
                  <a href="#" class="text-white" style="display: inline-flex; align-items: center; justify-content: center; background-color: #0d6efd; color: white; border-radius: 50%; width: 40px; height: 40px;">
                    <i class="bi bi-facebook"></i>
                  </a>
                </li>
                <li class="me-3">
                  <a href="#" class="text-white" style="display: inline-flex; align-items: center; justify-content: center; background-color: #0d6efd; color: white; border-radius: 50%; width: 40px; height: 40px;">
                    <i class="bi bi-instagram"></i>
                  </a>
                </li>
                <li>
                  <a href="#" class="text-white" style="display: inline-flex; align-items: center; justify-content: center; background-color: #0d6efd; color: white; border-radius: 50%; width: 40px; height: 40px;">
                    <i class="bi bi-twitter"></i>
                  </a>
                </li>
              </ul>
            </div>
            
            
            
            <div class="col-3" style="margin-top: 20px">
              <h4 class="text-white">Contact Us</h4>
              <ul class=" list-unstyled m-0">
                <li class="d-flex align-items-center">
                  <i class="bi bi-building me-3 text-white"></i>
                  <p class="text-white mb-0">Jl. Cut Mutia No. 88, Kota Bekasi</p>
                </li>
                <li class="d-flex align-items-center">
                  <i class="bi bi-phone me-3 text-white"></i>
                  <p class="text-white mb-0">+6281234567890</p>
                </li>
                <li class="d-flex align-items-center">
                  <i class="bi bi-envelope me-3 text-white"></i>
                  <p class="text-white mb-0">LQl7y@example.com</p>
                </li>
                
              </ul>
            </div>
        </div>
      </div>
      <script>
        // JavaScript untuk menampilkan form ketika tombol "Apply" diklik
        function showForm(posisi) {
            document.getElementById("jobContent").style.display = "none"; // Sembunyikan konten lowongan
            document.getElementById("applyForm").style.display = "block";  // Tampilkan form
            document.getElementById("posisi_dilamar").value = posisi; // Set nilai posisi yang dipilih
        }
        function hideForm() {
            document.getElementById("jobContent").style.display = "block"; // Tampilkan konten lowongan
            document.getElementById("applyForm").style.display = "none";  // Sembunyikan form
        }
    </script>
</body>
</html>