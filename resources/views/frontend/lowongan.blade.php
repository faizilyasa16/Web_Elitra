@extends('frontend.layout')

@section('content')
<div class="main-content text-center">
  <h1 class="fs-1 text-dark">Yuk!! Menjadi Bagian Elitra</h1>
  <div class="bg-warning d-block mx-auto" style="height: 4px; width: 30%;"></div>
  <p class="fs-5 mt-2 text-dark">Bergabunglah dengan ElitRa dan ciptakan solusi teknologi yang mendorong transformasi digital.</p>
</div> 
@php
    $aosEffects = ['fade-right', 'fade-left'];
@endphp
  <!-- Container with col-6 layout -->
  <div class="container mt-5">
      <div class="row">
        @foreach ($lowongan as $row)
        @php
            $aosEffect = $aosEffects[$loop->index % count($aosEffects)];
        @endphp
            <div class="col-6 mb-4">
                <div class="border rounded-top-4" data-aos="{{ $aosEffect }}" data-aos-duration="2000">
                    <img src="{{ Storage::url($row->img) }}" class="img-fluid rounded-top-4" alt="" style="height: 200px; width: 100%; object-fit: cover;">
                    <h3 class="pt-2 ms-2">{{ $row->posisi }}</h3>
                    <div class="ms-3 d-flex flex-column gap-1">
                        <span class="d-flex align-items-center me-4">
                            <i class="bi bi-geo-alt-fill me-2"></i> {{ $row->alamat }}
                        </span>
                        <span class="d-flex align-items-center me-4">
                            <i class="bi bi-briefcase-fill me-2"></i> {{ ucwords(str_replace('time', ' Time', $row->tipe)) }}
                        </span>
                        <span class="d-flex align-items-center me-4">
                            <i class="bi bi-mortarboard-fill me-2"></i> Minimal Pendidikan {{ $row->pendidikan }}
                        </span>
                        <span class="d-flex align-items-center me-4">
                            <i class="bi bi-cash me-2"></i> {{ $row->gaji }}
                        </span>
                    </div>
                    
                    <div class="d-flex me-3 pb-3">
                        <button class="btn btn-primary ms-auto "><a href="{{ route('lowonganfrontend1', ['id' => $row->id]) }}" class="text-decoration-none text-white">Info Selengkapnya</a></button>
                    </div>
                </div>
            </div>
        @endforeach
      </div>
  </div>
@endsection