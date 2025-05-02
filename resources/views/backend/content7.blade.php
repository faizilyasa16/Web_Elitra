@extends('backend.layout')

@section('content')
    <h1 class="ms-4 mt-5">Lowongan</h1>
    <table class="table table-hover ms-4 text-center" style="width: 98%">
        <thead>
          <tr class="border">
            <form method="GET" action="#">
            <th scope="col" colspan="12" style="">
              <div class="d-flex" style="width: 100%;">
                <div class="input-group" style="flex: 1;">
                  <span class="input-group-text bg-warning rounded-start bg-transparent">
                    <button type="submit" class="btn"><i class="bi-search"></i></button>
                  </span>
                  <input class="form-control" type="search" placeholder="Cari sesuatu..." aria-label="Search" name="query">
                </div>
                <a class="btn btn-primary ms-2" href="{{ route('backend.content7.create') }}" role="button">Tambah Data</a>
              </div>
            </th>
            </form>
          </tr>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Perusahaan</th>
                <th scope="col">Posisi</th>
                <th scope="col">Tipe</th>
                <th scope="col">Gaji</th>
                <th scope="col">Action</th>
            </tr>              
        </thead>
        <tbody >
            @foreach ($lowongan as $row)
            <tr class="align-middle">
              <th scope="row">{{ $loop->iteration + ($lowongan->currentPage() - 1) * $lowongan->perPage() }}</th>
                <td>
                  @if($row->img)
                    <img src="{{ Storage::url($row->img) }}" class="img-fluid" style="width: 200px; height: 100px; object-fit: cover;" alt="">
                  @else
                  Tidak ada Gambar
                  @endif
                </td>
                <td>{{ $row->perusahaan }}</td>
                <td>{{ $row->posisi }}</td>
                <td>{{ ucwords(str_replace('time', ' Time', $row->tipe)) }}</td>
                <td>{{ $row->gaji}}</td>
                <td>
                    <form action="{{ route('backend.content7.destroy', ['id' => $row->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <a href="{{ route('backend.content7.soal', ['id' => $row->id]) }}" class="btn btn-warning" role="button">Soal</a></a>
                        <a class="btn btn-primary" href="{{ route('backend.content7.edit', ['id' => $row->id]) }}" role="button">Edit</a>
                      </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        {{ $lowongan->links() }}
    </table>
@endsection