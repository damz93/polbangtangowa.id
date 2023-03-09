@extends('admin-access.layouts.main')
@section('container')
<p style="font-size:28px" class="mt-3">Detail Tamu - NIK : {{ $det_tamu->nik }}</p>
<hr>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	<div class="card"   style="margin-bottom: 20px;">
		<div class="container">
			<div class="card-body p-0">
				<div class="m-2">
					<div class="row">
						<div class="col-md-3">
							<i class="feather icon-home"></i>
							Nama
						</div>
						<div class='col'>
							<span>:{{ $det_tamu->nama }}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							Jenis Kelamin
						</div>
						<div class='col'>
							<span>:{{ $det_tamu->jenis_kelamin }}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							Pekerjaan
						</div>
						<div class='col'>
							<span>:{{ $det_tamu->pekerjaan }}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							Asal Instansi
						</div>
						<div class='col'>
							<span>:{{ $det_tamu->asal_instansi }}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							Alamat
						</div>
						<div class='col'>
							<span>:{{ $det_tamu->alamat }}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							Email
						</div>
						<div class='col'>
							<span>:{{ $det_tamu->email }}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection