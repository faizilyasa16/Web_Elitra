<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/Bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/Bootstrap-icon/font/bootstrap-icons.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
/* Navbar hover */
.navbar ul li a {
    color: white;
    transition: color 0.3s ease;
}
.navbar ul li a i {
    color: white;
    transition: color 0.3s ease;
}
.navbar ul li a:hover {
    color: orange;
}
.navbar ul li a i:hover {
    color: orange;
}
/* Textarea styling */
textarea.form-control {
    min-height: 100px;
    resize: vertical;
    width: 100%;
}

/* Slider container */
.body-slide {
    display: grid;
    place-items: center;
    overflow: hidden;
}

.slider {
    height: 300px;
    width: 100%;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

/* Track for slides */
.slide-track {
    display: flex;
    width: calc(300px * 20); /* Adjust based on item count */
    animation: scroll 50s linear infinite;
}

.slide-track:hover {
    animation-play-state: paused;
}

/* Keyframes for smooth scrolling */
@keyframes scroll {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(calc(-300px * 5)); /* Half of total width */
    }
}

/* Slide styling */
.img-slide {
    height: 200px;
    width: 300px;
    display: flex;
    align-items: center;
    padding: 15px;
    perspective: 100px;
}

.img-slide img {
    width: 100%;
    transition: transform 0.8s ease;
}

.img-slide img:hover {
    transform: scale(1.1);
}
.no-border .list-group-item {
            border: none;
        }
/* Optional shadow fade on edges */
.slider::before,
.slider::after {
    content: "";
    position: absolute;
    top: 0;
    width: 15%;
    height: 100%;
    z-index: 2;
    pointer-events: none; /* Allow interaction with slides */
}

.slider::after {
    right: 0;
    transform: rotateY(180deg);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .img-slide {
        width: 150px;
    }

    .slide-track {
        width: calc(150px * 20); /* Adjusted for responsive */
        animation: scroll 60s linear infinite;
    }

    @keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(calc(-150px * 10)); /* Adjusted for responsive */
        }
    }
}
        .main-content {
            margin-top: 150px;
        }
        #applyForm {
            display: none; /* Form tidak terlihat secara default */
            margin-top: 20px;
        }
        .container-fluid-about {
    max-width: 1920px;
    margin: 0 auto;
}
.step-wrapper {
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: relative;
      margin: 50px auto 20px;
      max-width: 600px;
    }
    .step-line {
      position: absolute;
      top: 50%;
      left: 0;
      right: 0;
      height: 4px;
      background: #ccc;
      z-index: 0;
      transition: background 0.3s;
    }
    .step {
      position: relative;
      z-index: 1;
      width: 35px;
      height: 35px;
      line-height: 35px;
      border-radius: 50%;
      background-color: #ccc;
      color: #fff;
      text-align: center;
      font-weight: bold;
      flex-shrink: 0;
      transition: background 0.3s;
    }
    .step.active {
      background-color: #FF8B00;
    }
    .step-content {
      display: none;
    }
    .step-content.active {
      display: block;
      margin-top: 20px;
    }
    .cards-wrapper {
  display: flex;
  justify-content: center;
  gap: 1rem;
  flex-wrap: nowrap;
  max-width: 100%;
  overflow: hidden;
  margin: 0 auto;
}
.cards-wrapper .card {
  background: transparent;
  text-align: center;
}
.carousel-inner {
  padding: 1em;
  overflow: hidden;
}

.carousel-control-prev,
.carousel-control-next {
  background-color: #e1e1e1;
  width: 5vh;
  height: 5vh;
  border-radius: 50%;
  top: 50%;
  transform: translateY(-50%);
}

@media (min-width: 768px) {
  .cards-wrapper .card img {
    height: 11em;
    object-fit: cover;
  }
}

@media (max-width: 767px) {
  .cards-wrapper {
    flex-direction: column;
    align-items: center;
  }

  .cards-wrapper .card {
    flex: 1 1 auto;
    width: 90%;
    margin-bottom: 1rem;
  }


}

  </style>
</head>
<body data-bs-theme="light">
  <div class="d-flex flex-column min-vh-100">

  <div class="w-100 d-flex align-items-center justify-content-between position-fixed top-0 hide-top" style="height: 100px; z-index: 9999; background-color: #222C65;">
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
              
              <li>
                  @if (Auth::check() && Auth::user()->role === 'customer')
                  <a href="#" class="text-white dropdown-toggle d-flex align-items-center link-underline link-underline-opacity-0" id="dropdownMenuButton" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fs-2 bi-person-circle me-2"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item text-dark" href="{{ route('profile') }}">Profile</a></li>
                            <li><a class="dropdown-item text-dark" href="javascript:void(0)" onclick="confirmLogout()">Logout</a></li>
                        </ul>
                  @elseif(Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'superadmin'))
                  <a href="#" class="text-white dropdown-toggle d-flex align-items-center link-underline link-underline-opacity-0" id="dropdownMenuButton" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa-solid fs-2 bi-person-circle me-2"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item  text-dark py-2" href="{{ route('home') }}">Dashboard</a></li>
                    <li><a class="dropdown-item  text-dark py-2" href="javascript:void(0)" onclick="confirmLogout()">Logout</a></li>                     
                  </ul>
                  @else
                  <a href="{{ route('backend.login') }}" class="text-decoration-none">
                    <i class="bi bi-box-arrow-in-right fs-3"></i>
                  </a>
                  @endif
              </li>
              <li>
                @if (Auth::check() && Auth::user()->role === 'customer')
                <div class="dropdown">
                  <a href="#" class="text-decoration-none " id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    @if($notifikasis->pluck('history')->flatten()->isNotEmpty())
                        <i class="bi bi-bell-fill fs-5"></i> {{-- Ada setidaknya satu notifikasi --}}
                    @else
                        <i class="bi bi-bell fs-5"></i> {{-- Tidak ada notifikasi --}}
                    @endif
                
                  </a>
                
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                    <li class="dropdown-header">
                      <div class="row">
                        <div class="col">
                          <span class="fw-bold">Notifikasi</span>
                        </div>

                      </div>
                    </li>
                    @forelse($notifikasis as $notif)
                    <!-- Check if there's history for the current Pendaftar -->
                    @if($notif->history->isNotEmpty())
                        @foreach($notif->history as $history)
                            <li>
                                <a class="dropdown-item" href="{{ route('history' , ['id' => $history->id]) }}">
                                    <div class="d-flex align-items-center">
                                        <!-- Icon based on the status_baru -->
                                        @if($history->status_baru === 'Sedang Di Proses')
                                            <i class="bi bi-hourglass-split text-warning fs-4 me-3"></i>
                                        @elseif($history->status_baru === 'Lulus')
                                            <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
                                        @else
                                            <i class="bi bi-x-circle-fill text-danger fs-4 me-3"></i>
                                        @endif
                                        
                                        <div class="flex-grow-1">
                                            <div class="fw-bold text-dark">{{ $history->status_baru }}</div>
                                            <small class="text-muted d-block text-truncate" style="max-width: 220px;">
                                                @if($history->status_baru === 'Sedang Di Proses')
                                                    Lamaran kamu ke {{ $notif->lowongan->judul ?? 'Lowongan' }} sedang diproses.
                                                @elseif($history->status_baru === 'Lulus')
                                                    Selamat! Kamu diterima di {{ $notif->lowongan->judul ?? 'Lowongan' }}.
                                                @else
                                                    Maaf, kamu tidak lolos untuk {{ $notif->lowongan->judul ?? 'Lowongan' }}.
                                                @endif
                                            </small>
                                            <small class="text-muted">{{ $history->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    @elseif($notif->history->isEmpty())
                        <li class="dropdown-item text-muted">
                          <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <!-- Icon based on the status_baru -->
                                @if($notif->status === 'Sedang Di Proses')
                                    <i class="bi bi-hourglass-split text-warning fs-4 me-3"></i>
                                @elseif($notif->status === 'Lulus')
                                    <i class="bi bi-check-circle-fill text-success fs-4 me-3"></i>
                                @else
                                    <i class="bi bi-x-circle-fill text-danger fs-4 me-3"></i>
                                @endif
                                
                                <div class="flex-grow-1">
                                    <div class="fw-bold text-dark">{{ $notif->status }}</div>
                                    <small class="text-muted d-block text-truncate" style="max-width: 220px;">
                                        @if($notif->status === 'Sedang Di Proses')
                                            Lamaran kamu ke {{ $notif->lowongan->judul ?? 'Lowongan' }} sedang diproses.
                                        @elseif($notif->status === 'Lulus')
                                            Selamat! Kamu diterima di {{ $notif->lowongan->judul ?? 'Lowongan' }}.
                                        @else
                                            Maaf, kamu tidak lolos untuk {{ $notif->lowongan->judul ?? 'Lowongan' }}.
                                        @endif
                                    </small>
                                    <small class="text-muted">{{ $notif->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                        </li>
                    @else
                        <!-- If no history exists, show this message -->
                        <li class="dropdown-item text-muted">
                            Belum ada status perubahan untuk lamaran kamu di {{ $notif->lowongan->judul ?? 'Lowongan' }}.
                        </li>
                    @endif
                @empty
                    <li class="dropdown-item text-muted">Tidak ada notifikasi.</li>
                @endforelse
                

                
                    <!-- Tambah notifikasi lain -->
                  </ul>
                </div>
                

                  @else
                      <a href="#" class="text-decoration-none"></a>
                  @endif
              </li>
          </ul>
      </div>        
  </div>

      <main class="flex-grow-1">
          @yield('content')
      </main>

  <footer class="w-100 hide-footer" style="height: 200px; background-color: #222C65;">
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
  </footer>
</div>





      
      
    <form id="keluar-app" action="{{ route('backend.logout') }}" method="post">
        @csrf
    </form>


      <script src="{{ asset('css/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script src="{{ asset('js/script.js') }}"></script>
      <script>
        AOS.init();
      </script>
      <script>
        // JavaScript untuk menampilkan form ketika tombol "Apply" diklik
        function showForm(posisi) {
            document.getElementById("jobContent").style.display = "none";
            document.getElementById("applyForm").style.display = "block";
            document.getElementById("posisi_dilamar").value = posisi; // Set nilai posisi yang dipilih
        }

        function hideForm() {
            document.getElementById("jobContent").style.display = "block"; // Tampilkan konten lowongan
            document.getElementById("applyForm").style.display = "none";  // Sembunyikan form
        }
    </script>
      

    
</body>
</html>
