@extends('admin-access.layouts.main')
@section('container')
<p style="font-size:30px" class="mt-3">Tambah Pegawai</p><p class="text-right">
  <hr>
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card mb-5">
      <div class="container">
        <div class="card-body p-0 m-2">
          <div class=" table-wrapper table-responsive">
               <form class="m-4" autocomplete="off" action="simpan-pegawai" method="POST" enctype="multipart/form-data">                
                @csrf
                  <div class="mb-3">
              
                    <label for="nik" class="form-label">NIK</label>
                    <input type="number" autofocus placeholder="Masukkan NIK" class="form-control" id="nik" name="nik">
                  </div>
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama Lengkap">
                  </div>
                  
                  <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Masukkan Jabatan">
                  </div>
                  
                  <div class="mb-3">
                    <label for="pangkat" class="form-label">Pangkat</label>
                    <input type="text" class="form-control" name="pangkat" id="pangkat" placeholder="Masukkan Pangkat">
                  </div>
                  
                  <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  
                  <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" class="form-control" name="phone" id="phone" placeholder="08xxx">
                  </div>
                  
                  <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                  </div>
                  
                  <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                  </div>                  
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" placeholder="Masukkan Alamat Lengkap" id="alamat" name="alamat"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                  </div>
                  <div class="mb-3">
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-success btn-lg"></button>
                        </div>

                  
                </form>
              </div>
        </div>
        </div>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


    
  @endsection