@extends('layout.master')
@section('content')
<script type="text/javascript">
	function cek_dulu() {
	  var teks = "Yakin Ingin Simpan?";
	  var tingkat = document.getElementById("tingkat_kepuasan").value;
	  if(tingkat == '0'){
	    $('#tingkat_kepuasan').focus();
	    alert('Pilih Tingkat Kepuasan terlebih dahulu');            
	    return false;
	  }	  
	  else{
	    return confirm(teks);
	  }
	}
</script>
<div class="container">
	<div class="text-center">
		<img src="/img/logo_tamuku.png" width="200" height="200" alt="logo">
	</div>
	<div class="row justify-content-center mt-5">
		<div class="col-12">
			<div class="card mb-5 ">
				<div class="cardbody">
					<p style="font-size:28px" class="m-3">Input Review: {{ $kunjungan->kode_kunjungan }}</p>
					<hr>
					<form class="m-4" autocomplete="off" action="/review/simpan-review/{{ $kunjungan->id }}" onsubmit="return cek_dulu();" method="POST">
						@method('put')
						@csrf
						
					<input hidden type="text" class="form-control" readonly name="kode_kunjungan" id="kode_kunjungan" value="{{ $kunjungan->kode_kunjungan }}">
						<div class="mb-3">
							<label for="nik" class="form-label">NIK</label>
							
							<input type="text" class="form-control" readonly name="nik" id="nik" value="{{ $kunjungan->nik }}">
						</div>
						<div class="mb-3">
							<label for="nama" class="form-label">Nama Lengkap</label>
							<input type="text" class="form-control" readonly name="nama" id="nama" value="{{ $kunjungan->nama }}">
						</div>
						<div class="mb-3">
							<label for="tingkat_kepuasan" class="form-label">Pilih Rating Terkait Pelayanan</label>
							<select autofocus class="form-select" id="tingkat_kepuasan" name="tingkat_kepuasan" required >
								<option value="0" selected>Pilih Rating</option>
								<option value="SANGAT MEMUASKAN">Sangat Memuaskan</option>
								<option value="MEMUASKAN">Memuaskan</option>
								<option value="SANGAT BAIK">Sangat Baik</option>
								<option value="BAIK">Baik</option>
								<option value="CUKUP">Cukup (Memadai)</option>
								<option value="KURANG">Kurang</option>
								<option value="SANGAT KURANG">Sangat Kurang</option>
							</select>
						</div>
						<div class="mb-3">
							<label for="pesan" class="form-label">Pesan</label>
							<textarea class="form-control" placeholder="Masukkan Pesan Anda" required id="pesan" name="pesan"></textarea>
						</div>
						<div class="mb-3">
							<label for="kesan" class="form-label">Kesan</label>
							<textarea class="form-control" placeholder="Masukkan Kesan Anda" required id="kesan" name="kesan"></textarea>
						</div>
						<div class="mb-3">
							<label for="kritik" class="form-label">Kritik</label>
							<textarea class="form-control" placeholder="Masukkan Kritik Anda" required id="kritik" name="kritik"></textarea>
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
<div class="text-center p-4" style="color:#177a3a;background-color: white;">
	<img src="/img/logo_tamuku.png" width="20" height="20" alt="logo">
	support  by: 
	<a class="text-reset fw-bold" href="/">tamuku-ppigowa.id</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endsection