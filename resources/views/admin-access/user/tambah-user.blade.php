@extends('admin-access.layouts.main')
@section('container')
<p style="font-size:30px" class="mt-3">Tambah Pegawai</p>
<p class="text-right">
<hr>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
  <div class="card mb-5">
    <div class="container">
      <div class="card-body p-0 m-2">
        <div class=" table-wrapper table-responsive">
          <form class="m-4" autocomplete="off" action="simpan-user" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="nik" class="form-label">NIK</label>
              <input type="number" autofocus value="{{ old('nik') }}" placeholder="Masukkan NIK" class="form-control" id="nik" name="nik">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" autofocus value="{{ old('password') }}" placeholder="Masukkan Password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" value="{{ old('nama') }}" name="nama" id="nama" placeholder="Masukkan Nama Lengkap">
            </div>
            <div class="mb-3">
              <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
              <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
              <option value="Laki-laki" @if ( old('jenis_kelamin')  == "Laki-laki") selected @endif>Laki-laki</option>
              <option value="Perempuan" @if ( old('jenis_kelamin')  == "Perempuan") selected @endif>Perempuan</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="Masukkan Email">
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