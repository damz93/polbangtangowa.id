@extends('admin-access.layouts.main')
@section('container')
<p style="font-size:28px" class="mt-3">Edit Pegawai - NIK :{{ $det_pegawai->nik }}</p>
<hr>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	<div class="card mb-5">
		<div class="container">
			<div class="card-body p-0 m-2">
				<div class=" table-wrapper table-responsive">
					<form class="mb-5" autocomplete="off" action="/admin-access/pegawai/update-pegawai/{{ $det_pegawai->id }}" method="POST">
						@method('put')
						@csrf                  
						<div class="mb-3">
							<label for="nama" class="form-label">Nama Lengkap</label>
							<input type="text" autofocus class="form-control" name="nama" id="nama"  value="{{ $det_pegawai->nama }}" placeholder="Masukkan Nama Lengkap">
						</div>
						<div class="mb-3">
							<label for="jabatan" class="form-label">Jabatan</label>
							<input type="text" class="form-control" name="jabatan"  value="{{ $det_pegawai->jabatan }}" id="jabatan" placeholder="Masukkan Jabatan">
						</div>
						<div class="mb-3">
							<label for="pangkat" class="form-label">Pangkat</label>
							<input type="text" class="form-control" name="pangkat" value="{{ $det_pegawai->pangkat }}" id="pangkat" placeholder="Masukkan Pangkat">
						</div>
						<div class="mb-3">
							<label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
							<select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
							<option value="Laki-laki" @if($det_pegawai->jenis_kelamin == "Laki-laki") selected @endif>Laki-laki</option>
							<option value="Perempuan"@if($det_pegawai->jenis_kelamin == "Perempuan") selected @endif>Perempuan</option>
							</select>
						</div>
						<div class="mb-3">
							<label for="phone" class="form-label">Phone</label>
							<input type="number" class="form-control" name="phone" value="{{ $det_pegawai->phone }}" id="phone" placeholder="08xxx">
						</div>
						<div class="mb-3">
							<label for="tempat_lahir" class="form-label">Tempat Lahir</label>
							<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="{{ $det_pegawai->tempat_lahir }}" placeholder="Masukkan Tempat Lahir">
						</div>
						<div class="mb-3">
							<label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
							<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="{{ $det_pegawai->tgl_lahir }}">
						</div>
						<div class="mb-3">
							<label for="alamat" class="form-label">Alamat</label>
							<textarea class="form-control" placeholder="Masukkan Alamat Lengkap" id="alamat" name="alamat">{{ $det_pegawai->alamat }}</textarea>
						</div>
						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="{{ $det_pegawai->email }}">
						</div>
						<div class="mb-5">
							<input type="submit" name="update" value="Update" class="btn btn-success btn-lg"></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
</div>
@endsection