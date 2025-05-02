@extends('frontend.layout')

@section('content')

<!-- Tambahkan padding pada konten utama -->
<div class="content" style="padding-top: 100px;">
  <div class="card text-bg-dark">
    <img src="https://storage.googleapis.com/a1aa/image/dmr7qhKEDaYPHlnFQ4miS7SQVTfA1aTzBDzXbr1bO0e4sMrTA.jpg" class="card-img opacity-50" alt="..." style="width: 100%; height: 810px; object-fit: cover">
    <div class="card-img-overlay text-center d-flex align-items-center justify-content-center flex-column">
      <h1 class="card-title fs-1 text-warning">"Karier Hebat Dimulai di Sini"</h1>
      <h3 class="card-text">Mulai peluang karirmu dari sini dengan cara paling ampuh</h3>
    </div>
  </div>

  <div class="d-flex align-items-center justify-content-center mx-auto" style="margin-top: 50px; width: 100%; ">
    <div style="width: 70%;" class="ms-5" data-aos="fade-right" data-aos-duration="2000">
        <h2 class="mb-4">Berkomitmen Menjadi Penyedia Tenaga Kerja IT Sementara No. 1 di Indonesia</h2>
        <p>Elitra adalah penyedia lowongan dan tenaga kerja IT di Indonesia Staffing Talenta IT di Indonesia yang fokus pada penyediaan tenaga kerja IT berpengalaman untuk proyek pengembangan perangkat lunak dan transformasi digital. Elitra menawarkan layanan outsourcing talenta IT dengan kontrak jangka pendek mulai dari 3 bulan. Jika Anda membutuhkan informasi lebih lanjut, jangan ragu untuk menghubungi kami. Bersama Elitra, dapatkan talenta IT sementara yang berkualitas serta siap membantu mewujudkan kesuksesan perusahaan Anda.</p>
    </div>
    <img src="{{ asset('img/buatabout.png') }}" alt="" style="width: 30%; margin-left: 100px;" class="me-5" data-aos="fade-up" data-aos-duration="3000">
  </div>  
  <div class="ms-5 mt-5">
    <h4 class="fs-2">Outsourcing Tenaga Kerja IT</h4>
    <div class="bg-warning" style="height: 4px; width: 5%;"></div>
  </div>
<div class="container-fluid mt-5"> 
  <div class="row justify-content-center align-items-center">
    <!-- Left Image Column -->
    <div class="col-12 col-md-2">
      <img src="{{ asset('img/left-image.png') }}" alt="Left Image" style="width: 100%; max-width: 300px; height: 200px; margin-bottom: -100px;" data-aos="fade-down" data-aos-duration="2000">
    </div>

    <!-- Main Card Columns -->
    <div class="col-12 col-md-8">
      <div class="row">
        <div class="col-6 col-md-3 d-flex justify-content-center">
          <div class="card" style="width: 100%;">
            <img src="{{ asset('img/abugaga.jpg') }}" class="card-img-top" alt="..." >
            <div class="card-body">
              <h3 class="card-title text-center">Web Developer</h3>
              <div class="bg-warning mt-3" style="height: 4px; width: 100%;"></div>
              <p class="card-text mt-3 text-center">React, Next.JS, PHP, CSS, JavaScript, Laravel, Node.JS</p>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3 d-flex justify-content-center">
          <div class="card" style="width: 100%;">
            <img src="{{ asset('img/abugaga.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h3 class="card-title text-center">UI / UX Design</h3>
              <div class="bg-warning mt-3" style="height: 4px; width: 100%;"></div>
              <p class="card-text mt-3 text-center">Figma, Adobe XD, Sketch, InVision, Axure RP</p>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3 d-flex justify-content-center">
          <div class="card" style="width: 100%;">
            <img src="{{ asset('img/abugaga.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h3 class="card-title text-center">Software Developer</h3>
              <div class="bg-warning mt-3" style="height: 4px; width: 100%;"></div>
              <p class="card-text mt-3 text-center">Python, Java, C#, C++, Ruby, Swift dan Kotlin, GO (Golang)</p>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3 d-flex justify-content-center">
          <div class="card" style="width: 100%;">
            <img src="{{ asset('img/abugaga.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h3 class="card-title text-center">Cyber Security</h3>
              <div class="bg-warning mt-3" style="height: 4px; width: 100%;"></div>
              <p class="card-text mt-3 text-center">Python, C dan C++, Javascript, SQL, Ruby, Assembly</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Image Column -->
    <div class="col-12 col-md-2">
      <img src="{{ asset('img/right-image.png') }}" alt="Right Image" style="width: 100%; max-width: 300px; height: 200px; margin-top: -200px;" data-aos="fade-up" data-aos-duration="3000">
    </div>
    
  </div>
</div>

  </div>
  <div class="ms-5 mt-5">
    <h4 class="fs-2">Perusahaan yang Bekerja Sama</h4>
    <div class="bg-warning" style="height: 4px; width: 5%;"></div>
  </div>
</div>

{{-- membuat slide --}}
<div class="body-slide">
  <div class="slider">
    <div class="slide-track">
      <div class="img-slide">
        <img src="{{ asset('img/tokped.png') }}" alt="">
      </div>
      <div class="img-slide">
        <img src="{{ asset('img/kfc.png') }}" alt="">
      </div>
      <div class="img-slide">
        <img src="{{ asset('img/bca.png') }}" alt="">
      </div>
      <div class="img-slide">
        <img src="{{ asset('img/astra.png') }}" alt="">
      </div>
      <div class="img-slide">
        <img src="{{ asset('img/danone.png') }}" alt="">
      </div>
      <div class="img-slide">
        <img src="{{ asset('img/lion.png') }}" alt="">
      </div>
      <div class="img-slide">
        <img src="{{ asset('img/perta.png') }}" alt="">
      </div>
      <div class="img-slide">
        <img src="{{ asset('img/telkom.png') }}" alt="">
      </div>
      <div class="img-slide">
        <img src="{{ asset('img/unilever.png') }}" alt="">
      </div>
      {{-- nge doublein --}}
      <div class="img-slide">
        <img src="{{ asset('img/indofod.png') }}" alt="">
      </div>
      <div class="img-slide">
        <img src="{{ asset('img/tokped.png') }}" alt="">
      </div>
      <div class="img-slide">
        <img src="{{ asset('img/kfc.png') }}" alt="">
      </div>
      <div class="img-slide">
        <img src="{{ asset('img/bca.png') }}" alt="">
      </div>
      <div class="img-slide">
        <img src="{{ asset('img/astra.png') }}" alt="">
      </div>
      <div class="img-slide">
        <img src="{{ asset('img/danone.png') }}" alt="">
      </div>
      <div class="img-slide">
        <img src="{{ asset('img/lion.png') }}" alt="">
      </div>
      <div class="img-slide">
        <img src="{{ asset('img/perta.png') }}" alt="">
      </div>
      <div class="img-slide">
        <img src="{{ asset('img/telkom.png') }}" alt="">
      </div>
      <div class="img-slide">
        <img src="{{ asset('img/unilever.png') }}" alt="">
      </div>
      {{-- nge doublein --}}
      <div class="img-slide">
        <img src="{{ asset('img/indofod.png') }}" alt="">
      </div>
      
    </div>
  </div>
</div>
<div class="">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
    <path fill="#1C2655" fill-opacity="1" d="M0,64L34.3,74.7C68.6,85,137,107,206,96C274.3,85,343,43,411,42.7C480,43,549,85,617,96C685.7,107,754,85,823,74.7C891.4,64,960,64,1029,53.3C1097.1,43,1166,21,1234,21.3C1302.9,21,1371,43,1406,53.3L1440,64L1440,300L0,100Z"></path>
  </svg>
</div>


<div class="" style="min-height: 600px; width: 100%;  padding-bottom: 20px; background-color: #1C2655">
  <div class="container">
    <div class="row">
      <div class="col-6 text-center d-flex flex-column align-items-center justify-content-center mb-4">
        <div class="me-4">
          <h2 class="text-white mt-5">Hubungi Kami</h2>
          <p class="text-white mt-3">Perusahaan kami selalu membuka pintu untuk kolaborasi strategis dengan organisasi atau individu yang memiliki visi yang sejalan. Kami percaya bahwa kemitraan adalah kunci untuk mencapai hasil yang luar biasa dan menciptakan dampak yang lebih besar. Dengan fokus pada inovasi, integritas, dan profesionalisme, kami berkomitmen untuk membangun hubungan yang saling menguntungkan dan berkelanjutan. Bergabunglah dengan kami untuk bersama-sama menciptakan solusi yang membawa perubahan positif, memperluas peluang, dan membangun masa depan yang lebih cerah. Kami menyambut setiap kesempatan untuk berbagi pengalaman, sumber daya, dan keahlian untuk menghasilkan hasil yang luar biasa.</p>
        </div>
      </div>
      <div class="col-6 bg-white rounded-3  pb-2 mt-5">
        <form action="https://api.web3forms.com/submit" method="POST">
          <input type="hidden" name="access_key" value="dbac2b7d-ddb3-41fe-9e0c-c8465fa68257">
          <p class="mt-2 text-dark">Full Name</p>
          <input type="text" class="form-control" name="name" placeholder="Fathur Rahman">
  
          <!-- Tambahkan row baru untuk Email dan Telephone berdampingan -->
          <div class="row mt-3">
            <div class="col-6">
              <p class="text-dark">Email</p>
              <input type="text" class="form-control" name="email" placeholder="email@example.com">
            </div>
            <div class="col-6">
              <p class="text-dark">Telephone</p>
              <input type="text" class="form-control" name="phone" placeholder="08xxxx">
            </div>
          </div>
  
          <p class="text-dark mt-3">Company Name</p>
          <input type="text" class="form-control" name="company" placeholder="PT. Gacorr jaya jaya">
          <p class="text-dark mt-3">Message</p>
          <textarea class="form-control" name="message" placeholder="Sampaikan kebutuhan"></textarea>
          <button class="btn btn-primary rounded-pill mt-3">Kirim</button>
        </form>
        </div>
      </div>
    </div>
  </div>


</div>
@endsection
