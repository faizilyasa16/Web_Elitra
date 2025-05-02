@extends('frontend.layout')

@section('content')
    {{-- bikin main content --}}
    <div class="mt-5">
        <div class="container">
            <div class="shadow p-3 mx-auto rounded-5" style="margin-top: 150px; width: 300px; height: 300px; background-color: #222C65; display: flex; justify-content: center; align-items: center;">
                <img src="{{ asset('img/logo_elitra.png') }}" alt="" class="img-fluid" style="width: 100%; height: auto; border-radius: 15px;">
            </div>
            <h1 class="text-center mt-4">Tentang Kami</h1>
            <p class="text-center fs-5">EIitra adalah layanan outsourcing berbasis software yang fokus pada rekrutmen, mempermudah pencarian pekerjaan dan perekrutan karyawan dengan solusi efisien dan terintegrasi.</p>
            <div class="row mt-5">
                <div class="col-12 text-center mt-5">
                    <h4 class="fs-2 fw-bold text-dark">Visi & Misi Kami</h4>
                    <div class="bg-warning mx-auto" style="height: 4px; width: 40%;"></div>
                </div>
                <div class="d-flex justify-content-between mt-5">
                    <!-- Visi Section -->
                    <div class="rounded-4 p-4" style="background-color: #222C65; flex: 1;">
                        <h4 class="text-center text-white fw-semibold mb-3">Visi</h4>
                        <p class="text-center text-white" style="font-size: 1rem; line-height: 1.6;">
                            PT ElitRa bertekad untuk menjadi penyedia layanan outsourcing TI terdepan di Indonesia, dikenal atas keunggulan, inovasi, dan kemampuan kami dalam mendukung transformasi digital bagi bisnis di berbagai sektor industri.
                        </p>
                    </div>
                    <!-- Misi Section -->
                    <div class="rounded-4 p-4 ms-3" style="background-color: #222C65; flex: 1;">
                        <h4 class="text-center text-white fw-semibold mb-3">Misi</h4>
                        <p class="text-center text-white" style="font-size: 1rem; line-height: 1.6;">
                            Kami menyediakan solusi teknologi inovatif yang disesuaikan dengan kebutuhan klien, mengutamakan keamanan data, serta memastikan kepatuhan terhadap standar global seperti GDPR dan ISO 27001 untuk mendukung tujuan strategis klien.
                        </p>
                    </div>
                </div>
            </div>
            
            <img src="{{ asset('img/alam.jpg') }}" alt="" class="img-fluid mt-5 rounded-5" style="width: 100%; height: 500px; object-fit: cover;" data-aos="zoom-in" data-aos-duration="2000">
            <div class="mt-4 ms-2">
                <div class="row">
                    <div class="col-6 mt-3">
                        <div class="mb-4" data-aos="fade-right" data-aos-duration="2000">
                            <h3 class="">Cerita Kami</h3>
                            <div class="bg-warning " style="height: 4px; width: 12%;"></div>
                        </div>
                        <div class="fs-5" data-aos="fade-right" data-aos-duration="1500">
                            <p class="mb-3">Di PT ElitRa, kami bekerja dengan teknologi terkini untuk menyediakan layanan terbaik. Kami ahli dalam AWS, Microsoft Azure, Docker, Kubernetes, dan berbagai alat keamanan siber terdepan guna menjaga sistem klien kami tetap aman dan efisien. Kami selalu mengikuti tren industri untuk memastikan solusi kami siap menghadapi masa depan.</p>
                            <p>Tim ahli bersertifikasi kami terdiri dari pengembang perangkat lunak, spesialis keamanan siber, insinyur jaringan, dan analis data yang memiliki pengalaman bertahun-tahun di industri ini. Dengan keahlian yang beragam, kami mampu menangani proyek dengan berbagai ukuran dan tingkat kompleksitas, memastikan klien kami mendapatkan solusi dan hasil terbaik.</p>
                        </div>
                    </div>
                    <div class="col-6 mt-3">
                        <div class="fs-5" data-aos="fade-left" data-aos-duration="1500">
                            <p class="mb-3">Didirikan pada tahun 2024, PT ElitRa adalah penyedia layanan outsourcing TI terkemuka yang bertujuan untuk memberikan solusi teknologi inovatif dan berkualitas tinggi. Tim kami berdedikasi membantu bisnis untuk mengoptimalkan dan mentransformasi operasional TI mereka, sehingga mereka dapat fokus pada hal yang paling penting mengembangkan bisnis inti mereka. </p>
                            <p>Kami percaya bahwa integritas, perbaikan berkelanjutan, dan komitmen terhadap keunggulan adalah fondasi utama dari setiap layanan yang kami berikan. Di PT Solusi Digital Maju, kami selalu berusaha untuk memberikan layanan yang transparan, jujur, dan dapat dipercaya, sehingga menciptakan hubungan jangka panjang dengan klien kami. </p>
                        </div>
                        <div class="" data-aos="fade-left" data-aos-duration="2000">
                            <h3 class="text-center" style="margin-top: 25px;">Layanan Kami</h3>
                            <div class="bg-warning mx-auto" style="height: 4px; width: 30%;"></div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="row mt-5">
                    <div class="col-6 mb-4">
                        <div class="border rounded-top-4 text-white" style="background-color: #222C65;" data-aos="fade-up" data-aos-duration="2000">
                            <div class="row">
                                <div class="col-2 d-flex justify-content-center align-items-center">
                                    <i class="bi bi-globe ms-3" style="font-size: 80px;"></i>
                                </div>   
                                <div class="col-10">
                                    <h3 class="pt-2 ms-2">Web Developer</h3>
                                    <p class="ms-2">Kami mencari tim Web Developer berpengalaman yang siap membantu Anda membangun dan mengoptimalkan situs web yang responsif, fungsional, dan sesuai kebutuhan bisnis Anda. Lihat info selengkapnya!</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="border rounded-top-4 text-white" style="background-color: #222C65;" data-aos="fade-up" data-aos-duration="2000">
                            <div class="row">
                                <div class="col-2 d-flex justify-content-center align-items-center">
                                    <i class="bi bi-shield-lock ms-3" style="font-size: 80px;"></i>
                                </div>    
                                <div class="col-10">
                                    <h3 class="pt-2 ms-2">Cyber Security</h3>
                                    <p class="ms-2">Kami mencari solusi keamanan digital yang prioritas. Tim Cyber Security kami melindungi data dan sistem Anda dari ancaman siber dengan solusi keamanan yang terkini dan proaktif. Lihat info selengkapnya!"</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="border rounded-top-4 text-white" style="background-color: #222C65;" data-aos="fade-up" data-aos-duration="3000">
                            <div class="row">
                                <div class="col-2 d-flex justify-content-center align-items-center">
                                    <i class="bi bi-pencil-square ms-3" style="font-size: 80px;"></i>
                                </div>                                
                                <div class="col-10">
                                    <h3 class="pt-2 ms-2">UI / UX Designer</h3>
                                    <p class="ms-2">Kami mencari desainer yang paham bahwa desain adalah kunci dalam menciptakan pengalaman pengguna yang menarik. UI/UX Designer kami bekerja keras untuk menghadirkan antarmuka yang intuitif dan menarik bagi audiens Anda. Lihat info selengkapnya!</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="border rounded-top-4 text-white" style="background-color: #222C65;" data-aos="fade-up" data-aos-duration="3000"> 
                            <div class="row">
                                <div class="col-2 d-flex justify-content-center align-items-center">
                                    <i class="bi bi-code-slash ms-3" style="font-size: 80px;"></i>
                                </div>  
                                <div class="col-10">
                                    <div class="row">
                                        <h3 class="pt-2 ms-2">Software Developer</h3>
                                        <p class="ms-2">Kami mencari Software Developer berbakat dengan keahlian dalam pengembangan perangkat lunak. Dengan solusi inovatif dan berorientasi hasil, kami siap mendukung operasional bisnis Anda secara efisien dan optimal. Temukan info selengkapnya dan bergabunglah dengan kami!</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="text-center mt-5 mb-5">
                    <h1 >Berminat Bekerja sama dengan kami?</h1>
                    <p>Kami Menanti Kehadiran anda</p>
                    <button class="btn w-50 rounded-5" style="background-color: #222C65"><a href="{{ route('lowonganfrontend') }}" class="text-white text-decoration-none">Lihat lebih banyak lagi </a></button>
                </div>
        </div>
        
        <div class="px-5 py-5 " style="background-color: #1C2655;">
            <div id="carouselExampleControls" style=" min-width: 100%;" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="mb-3">
                        <h1 class="text-center text-white">What We've Done</h1>
                    </div>
                <div class="carousel-item active">
                  <div class="cards-wrapper">
                    <div class="card d-none d-md-block bg-light">
                      <img src="{{ asset('img/porto1.jpg') }}" class="card-img-top shadow-lg" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                    <div class="card d-none d-md-block bg-light">
                      <img src="{{ asset('img/porto2.png') }}" class="card-img-top shadow-lg" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
                  <div class="card d-none d-md-block bg-light">
                    <img src="{{ asset('img/porto3.png') }}" class="card-img-top shadow-lg" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
                </div>
                </div>
                <div class="carousel-item">
                  <div class="cards-wrapper">
                    <div class="card d-none d-md-block bg-light">
                      <img src="{{ asset('img/porto2.png') }}" class="card-img-top shadow-lg" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                    <div class="card d-none d-md-block bg-light">
                      <img src="{{ asset('img/porto5.png') }}" class="card-img-top shadow-lg" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                    <div class="card d-none d-md-block bg-light">
                      <img src="{{ asset('img/porto6.png') }}" class="card-img-top shadow-lg" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </a>
              
            </div>
        </div>
    </div>


@endsection