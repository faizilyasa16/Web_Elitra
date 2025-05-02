@extends('backend.layout')

@section('content')
<div class="card mt-5 ms-3">
    <div class="card-header">
        <h3>Soal</h3>
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
        <form action="{{ route('backend.content7.tambahSoal', $lowongan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div id="soal-section" class="mb-3">
                <h4>Tambah Soal</h4>
                <div class="mb-2 soal-item">
                    <input type="text" name="soal[]" class="form-control" placeholder="Isi Soal" required>
                </div>
            </div>
            <button type="button" class="btn btn-outline-secondary mb-3" onclick="tambahSoal()">+ Tambah Soal</button>
            

            <div class="d-flex justify-content-between">
                <a href="{{ route('backend.content7') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection