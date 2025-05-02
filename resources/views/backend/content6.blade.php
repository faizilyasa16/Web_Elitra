@extends('backend.layout')

@section('content')
    <h1 class="m-4 mt-5">Manage Admin Account</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <table class="table table-hover ms-4 text-center" style="width: 98%">
        <thead>
          <tr class="border">
            <form method="GET" action="{{ route('backend.content4') }}">
            <th scope="col" colspan="8" style="">
              <div class="d-flex" style="width: 100%;">
                <div class="input-group" style="flex: 1;">
                  <span class="input-group-text bg-warning rounded-start bg-transparent">
                    <button type="submit" class="btn"><i class="bi-search"></i></button>
                  </span>
                  <input class="form-control" type="search" placeholder="Cari sesuatu..." aria-label="Search" name="query">
                </div>
                <a class="btn btn-primary ms-2" href="#" data-bs-toggle="modal" data-bs-target="#tambahAdmin" role="button">Tambah Data</a>
              </div>
            </th>
            </form>
          </tr>
            <th scope="col">No</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Email</th>
            <th scope="col">HP</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dataAdmin as $row)
          <tr>
            <th scope="row">{{ $loop->iteration + ($dataAdmin->currentPage() - 1) * $dataAdmin->perPage() }}</th>
            <td>{{ $row->username }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->hp }}</td>
            <td>{{ $row->role }}</td>
            <td>
              <form action="{{ route('backend.content6.destroy', ['id' => $row->id]) }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
              </form>
              <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editAdmin{{ $row->id }}" role="button">Edit</a>
            </td>
          </tr>
          <div class="modal fade" id="editAdmin{{ $row->id }}" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                
                <div class="modal-header">
                  <h5 class="modal-title" id="modalLabel">Edit Admin</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
        
                <div class="modal-body">
                  <form action="{{ route('backend.content6.store', ['id' => $row->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                
                    <div class="mb-3">
                      <label for="username" class="form-label">Nama Admin</label>
                      <input type="text" name="username" id="username" value="{{ $row->username }}" class="form-control" required>
                    </div>
    
                  <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" name="email" id="email" value="{{ $row->email }}" class="form-control" required>
                  </div>
    
                  <div class="mb-3">
                      <label for="hp" class="form-label">No. Handphone</label>
                      <input type="number" name="hp" id="hp" value="{{ $row->hp }}" class="form-control" required>
                  </div>
    
                  <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-select" value="{{ $row->role }}" required>
                      <option value="" disabled selected>Pilih Role</option>
                      <option value="admin">Admin</option>
                    </select>
                  </div>
                  
    
                  <div class="mb-3">
                    <label for="old_password" class="form-label">Old Password</label>
                    <input type="password" name="old_password" id="old_password" class="form-control" required>
                  </div>
                  

                  <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" id="password" class="form-control" required>
                  </div>

                  

    
                  <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                
                  </form>
                </div>
                
        
              </div>
            </div>
          </div>
        @endforeach
        </tbody>
      </table>
      <div class="modal fade" id="tambahAdmin" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            
            <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">Tambah Admin</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
    
            <div class="modal-body">
              <form action="{{ route('backend.content6.useradmin') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="mb-3">
                  <label for="username" class="form-label">Nama Admin</label>
                  <input type="text" name="username" id="username" class="form-control" required>
                </div>

              <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" id="email" class="form-control" required>
              </div>

              <div class="mb-3">
                  <label for="hp" class="form-label">No. Handphone</label>
                  <input type="number" name="hp" id="hp" class="form-control" required>
              </div>

              <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role" id="role" class="form-select" required>
                  <option value="" disabled selected>Pilih Role</option>
                  <option value="admin">Admin</option>
                </select>
              </div>
              

              <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" id="password" class="form-control" required>
              </div>


              <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            
              </form>
            </div>
            
    
          </div>
        </div>
      </div>
      <div class="" style="display: flex; margin-left: 40%;">
        {{ $dataAdmin->links() }}
      </div>
@endsection