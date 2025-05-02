@extends('profile_user.layout')

@section('profile_dashboard')
    <section class=" d-flex" style="padding-top: 100px;">

        <section class="container mt-5">
          @if($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif  
          @if (session('error'))
          <div class="alert alert-danger ">
              {{ session('error') }}
          </div>
          @endif
    
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Hi, {{ Auth::user()->username }}</h3>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="position-relative d-inline-block mb-3" style="width: 200px; aspect-ratio: 1;">
                                            <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="" 
                                                 class="img-fluid rounded-circle w-100 h-100 bg-secondary-subtle" 
                                                 style="object-fit: cover;">
                                            <label for="foto"
                                            class="position-absolute bg-primary text-white rounded-circle p-1 d-flex align-items-center justify-content-center" 
                                            style="bottom: 5px; right: 30px; width: 30px; height: 30px; cursor: pointer;">
                                             <i class="bi bi-pencil-fill"></i></label>
                                             <form action="{{ route('profile.updateFoto', Auth::user()->id) }}" method="POST" id="cvUploadForm" enctype="multipart/form-data">
                                                @csrf  
                                                <input type="file" id="foto" name="foto" class="d-none">
                                             </form>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="mt-5 ms-3">
                                            <h4 class="card-title">{{ Auth::user()->username }}</h4>
                                            <p class="card-text">{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6"> 
                              <div class="mt-5"> 
                                  <div class="d-flex mb-2">
                                      <div style="width: 200px;"><h5 class="card-title">Skill</h5></div>
                                      <div class="ms-2" style="width: 10px;">:</div>
                                      <div>{{ optional(Auth::user()->customer)->skill ?? '-' }}</div>
                                    </div>
                                  
                                  <div class="d-flex">
                                      <div style="width: 200px;"><h5 class="card-title">Experience(tahun)</h5></div>
                                      <div class="ms-2" style="width: 10px;">:</div>
                                      <div>
                                        @if (optional(Auth::user()->customer)->experience)
                                        {{ optional(Auth::user()->customer)->experience }} tahun
                                        @else
                                          -
                                        @endif
                                      </div>
                                  </div>
                              </div> 
                            </div>
                              
                              
                        </div>
                    </div>
                    
                    
                    <div class="container">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <section class="d-flex align-items-center">
                                <h4 class="card-title mb-0">Data Pribadi</h4>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#InfoPendaftar{{ Auth::user()->id }}" class="btn btn-primary ms-auto">Edit</a>
                            </section>
                            
                            <div class="mb-3 mt-3" style="height: 3px; width: 100%; background-color: orange;"></div>
                            <div class="row">
                              <div class="col-6">
                                  <div class="mb-3">
                                      <label class="form-label">Nama Lengkap :</label>
                                      <p>{{ Auth::user()->customer->nama_lengkap ?? '-' }}</p>
                                  </div>
                          
                                  <div class="mb-3">
                                      <label class="form-label">Tempat Lahir :</label>
                                      <p>{{ Auth::user()->customer->tempat_lahir ?? '-' }}</p>
                                  </div>
                          
                                  <div class="mb-3">
                                      <label class="form-label">Tanggal Lahir :</label>
                                      <p>{{ Auth::user()->customer->tanggal_lahir ?? '-' }}</p>
                                  </div>
                          
                                  <div class="mb-3">
                                      <label class="form-label">Jenis Kelamin :</label>
                                      <p>{{ Auth::user()->customer->jenis_kelamin ?? '-' }}</p>
                                  </div>
                          
                                  <div class="mb-3">
                                      <label class="form-label">No HP :</label>
                                      <p>{{ Auth::user()->hp ?? '-' }}</p>
                                  </div>
                              </div>
                          
                              <div class="col-6">
                                  <div class="mb-3">
                                      <label class="form-label">Alamat :</label>
                                      <p>{{ Auth::user()->customer->alamat ?? '-' }}</p>
                                  </div>
                          
                                  <div class="mb-3">
                                      <label class="form-label">CV :</label>
                                      @if(optional(Auth::user()->customer)->cv)
                                          <p><a href="{{ asset(optional(Auth::user()->customer)->cv) }}" target="_blank">Lihat CV</a></p>
                                      @else
                                          <p>-</p>
                                      @endif
                                  </div>
                                
                          
                                  <div class="mb-3">
                                      <label class="form-label">LinkedIn :</label>
                                      <p>{{ Auth::user()->customer->linkedin ?? '-' }}</p>
                                  </div>
                              </div>
                          </div>
                          
                                
                            </div>
                        
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" style="z-index: 9999" id="InfoPendaftar{{ Auth::user()->id }}" tabindex="-1" aria-labelledby="modalLabel{{ Auth::user()->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel{{ Auth::user()->id }}">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
            
                    <div class="modal-body">
                      <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="col-md-6 border-end pe-3">
                            <div class="mb-3">
                              <label for="username" class="form-label">Username</label>
                              <input type="text" name="username" id="username" value="{{ Auth::user()->username }}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="form-control" required>
                            </div>
                              <div class="mb-3">
                                  <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                  <input type="text" name="nama_lengkap" value="{{ Auth::user()->customer->nama_lengkap ?? '' }}" id="nama_lengkap" class="form-control" required>
                              </div>
                              <div class="mb-3">
                                  <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                  <input type="text" name="tempat_lahir" value="{{ Auth::user()->customer->tempat_lahir ?? '' }}" id="tempat_lahir" class="form-control" required>
                              </div>
                              <div class="mb-3">
                                  <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                  <input type="date" name="tanggal_lahir" value="{{ Auth::user()->customer->tanggal_lahir ?? '' }}" id="tanggal_lahir" class="form-control" required>
                              </div>
                              <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                  <option value="" disabled {{ !isset(Auth::user()->customer->jenis_kelamin) ? 'selected' : '' }}>-</option>
                                  <option value="Laki-laki" {{ (Auth::user()->customer->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                  <option value="Perempuan" {{ (Auth::user()->customer->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                              </div>
                              
                              <div class="mb-3">
                                  <label for="hp" class="form-label">No. Handphone</label>
                                  <input type="number" name="hp" id="hp" value="{{ Auth::user()->hp }}" class="form-control" required>
                                </div>
                          </div>
                      
                          <div class="col-md-6 ps-3">
                              <div class="mb-3">
                                  <label for="alamat" class="form-label">Alamat</label>
                                  <textarea rows="4" name="alamat" id="alamat" class="form-control" required>{{ optional(Auth::user()->customer)->alamat }}</textarea>
                                </div>
                                <div class="mb-3">
                                  <label for="skill" class="form-label">Skill</label>
                                  <input type="text" name="skill" id="skill" value="{{ optional(Auth::user()->customer)->skill }}" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                  <label for="experience" class="form-label">Experience</label>
                                  <input type="text" name="experience" id="experience" value="{{ optional(Auth::user()->customer)->experience }}" class="form-control" required>
                                </div>
                              <div class="mb-3">
                                  <label for="cv" class="form-label">CV</label>
                                  <input type="file" name="cv" id="cv"  class="form-control" required>
                                  @if (optional(Auth::user()->customer)->cv)
                                  <div class="mt-2">
                                    <small class="text-muted d-block mb-1">CV saat ini :</small>
                                    <a href="{{ asset('storage/' . Auth::user()->customer->cv) }}" target="_blank">Lihat CV</a>
                                  </div>
                                @endif
                              </div>
                              <div class="mb-3">
                                <label for="linkedin" class="form-label">LinkedIn</label>
                                <input type="text" name="linkedin" value="{{ optional(Auth::user()->customer)->linkedin }}" id="linkedin" class="form-control">
                              </div>
                          </div>
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
        {{-- <div class="modal fade" id="InfoPendaftar" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                
                <div class="modal-header">
                  <h5 class="modal-title" id="modalLabel">Edit Profile</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
        
                <div class="modal-body">
                  <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                
                    <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Nama Lengkap</label>
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
                    <label for="role" class="form-label">Jenis Kelamin</label>
                    <select name="role" id="role" class="form-select" required>
                      <option value="" disabled selected>-</option>
                      <option value="Pria">Laki-laki</option>
                      <option value="Wanita">Perempuan</option>
                    </select>
                  </div>
                
                  
                  <div class="mb-3">
                    <label for="hp" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="hp" id="hp" class="form-control" required>
                </div>
    
                  <div class="mb-3">
                    <label for="username" class="form-label">Alamat</label>
                    <textarea rows="4" cols="50" name="username" id="username" class="form-control" required>
                  </div>

                  <div class="mb-3">
                    <label for="username" class="form-label">Skill</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div> 
                <div class="mb-3">
                    <label for="username" class="form-label">Experience</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div> 
                  <div class="mb-3">
                    <label for="username" class="form-label">CV</label>
                    <input type="file" name="username" id="username" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label for="username" class="form-label">Linkdin</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div> 
    
                  <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                
                  </form>
                </div>
                
        
              </div>
            </div>
          </div> --}}
    </section>
@endsection