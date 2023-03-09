@extends('layout.master')
@section('content')
<script type="text/javascript">
	function getProfile() {          
	  // Get the value of the first field
	  var nik = document.getElementById('nik').value;
	    if (nik != '') {
	        $.ajax({
	            url: '/get-profile',
	            type: 'GET',
	            data: {nik: nik},
	            success: function(data) {
	                $('#nama').val(data.nama);
	                $('#email').val(data.email);
	                $('#asal_instansi').val(data.asal_instansi);
	                $('#alamat').html(data.alamat);
	                document.getElementById("jenis_kelamin").value=data.jenis_kelamin;
	                document.getElementById("pekerjaan").value=data.pekerjaan;
	                if (document.getElementById("nama").value != ''){
	                  $('#bertemu_dengan').focus();
	                  alert('data ditemukan, silahkan pilih bertemu dengan');
	                }
	            }
	            
	        });
	        
	    }
	}
	
	function cek_dulu() {
	  var teks = "Yakin Ingin Simpan?";
	  var bertemu = document.getElementById("bertemu_dengan").value;
	  var jenkel = document.getElementById("jenis_kelamin").value;
	  var imageInput = document.querySelector('input[type=hidden][name=image].image-tag');
	  var pekerja = document.getElementById("pekerjaan").value;
	  var jenis_kep = document.getElementById("jenis_keperluan").value;
	  if(bertemu == '0'){
	    $('#bertemu_dengan').focus();
	    alert('Pilih Bertemu terlebih dahulu');            
	    return false;
	  }
	  else if(jenkel == '0'){
	    $('#jenis_kelamin').focus();
	    alert('Pilih Jenis Kelamin terlebih dahulu');            
	    return false;
	  }
	else if(pekerja == '0'){
	    $('#pekerjaan').focus();
	    alert('Pilih Pekerjaan terlebih dahulu');            
	    return false;
	  }
	  else if(jenis_kep == '0'){
	    $('#jenis_keperluan').focus();
	    alert('Pilih Jenis Keperluan terlebih dahulu');
	    return false;
	  }
	  else if (imageInput.value === ''){
	    alert('Selfie terlebih dahulu');
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
					<!--   <form class="m-4" action=" route('kunjungan.store') }}" method="POST" enctype="multipart/form-data">-->
					<form class="m-4" autocomplete="off" action="simpan-kunjungan" onsubmit="return cek_dulu();" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="mb-3">
							<label for="nik" class="form-label">NIK</label>
							<input type="number" onchange="getProfile()" autofocus placeholder="Masukkan NIK" required class="form-control" id="nik" name="nik">
						</div>
						<div class="mb-3">
							<label for="nama" class="form-label">Nama Lengkap</label>
							<input type="text" class="form-control" name="nama" id="nama" required placeholder="Masukkan Nama Lengkap">
						</div>
						<div class="mb-3">
							<label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
							<select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required >
								<option value="0" selected>Pilih Jenis Kelamin</option>
								<option value="LAKI-LAKI">Laki-laki</option>
								<option value="PEREMPUAN">Perempuan</option>
							</select>
						</div>
						<div class="mb-3">
							<label for="pekerjaan" class="form-label">Pekerjaan</label>
							<select class="form-select" id="pekerjaan" name="pekerjaan" required>
								<option value="0" selected>Pilih Pekerjaan</option>
								@foreach ($pekerjaan as $pekerja)
								<option value="{{ $pekerja->nama_pekerjaan }}">{{ $pekerja->nama_pekerjaan  }}</option>
								@endforeach
							</select>
						</div>
						<div class="mb-3">
							<label for="asal_instansi" class="form-label">Asal Instansi</label>
							<input type="text" class="form-control" id="asal_instansi" required name="asal_instansi" placeholder="Masukkan Asal Instansi">
						</div>
						<div class="mb-3">
							<label for="alamat" class="form-label">Alamat</label>
							<textarea class="form-control" placeholder="Masukkan Alamat Lengkap" required id="alamat" name="alamat"></textarea>
						</div>
						<div class="mb-3">
							<label for="email" class="form-label">Email</label>
							<input type="email" class="form-control" id="email" name="email" required placeholder="Masukkan Email">
						</div>
						<div class="mb-3">
							<label for="bertemu_dengan" class="form-label">Bertemu Dengan</label>
							<select class="form-select" id="bertemu_dengan" required name="bertemu_dengan">
								<option value="0" selected>Pilih Pegawai</option>
								@foreach ($pegawai as $pega)
								<option value="{{ $pega->nama }}">{{ $pega->nama  }}</option>
								@endforeach
							</select>
						</div>
						<div class="mb-3">
							<label for="jenis_keperluan" class="form-label">Jenis Keperluan</label>
							<select class="form-select" id="jenis_keperluan" required name="jenis_keperluan">
								<option value="0" selected>Pilih Keperluan</option>
								@foreach ($keperluan as $keperlua)
								<option value="{{ $keperlua->keperluan }}">{{ $keperlua->keperluan  }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-md-6-ml-10  mb-10">
							<div id="my_camera"></div>
							<br/>
							<input type=button class="btn btn-danger" value="Klik di Sini untuk Selfie" onClick="take_snapshot()">
							<input type="hidden" name="image" class="image-tag">
						</div>
						<div class="col-md-6">
							<div id="results">Your captured image will appear here...</div>
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
<script language="JavaScript">
	Webcam.set({
	    width: 200,
	    height: 160,
	    image_format: 'jpeg',
	    jpeg_quality: 200
	});
	
	Webcam.attach( '#my_camera' );
	
	function take_snapshot() {
	    Webcam.snap( function(data_uri) {
	        $(".image-tag").val(data_uri);
	        document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
	    } );
	}
</script>
@endsection