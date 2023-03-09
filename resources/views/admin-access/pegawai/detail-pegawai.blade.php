@extends('admin-access.layouts.main')
@section('container')
<p style="font-size:28px" class="mt-3">Detail Pegawai - NIK: {{ $det_pegawai->nik }}</p>
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
							<span>:{{ $det_pegawai->nama }}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							Jabatan
						</div>
						<div class='col'>
							<span>:{{ $det_pegawai->jabatan }}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							Pangkat
						</div>
						<div class='col'>
							<span>:{{ $det_pegawai->pangkat }}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							Jenis Kelamin
						</div>
						<div class='col'>
							<span>:{{ $det_pegawai->jenis_kelamin }}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							Tempat, Tanggal Lahir
						</div>
						<div class='col'>
							<span>:{{ $det_pegawai->tempat_lahir }}, {{ $det_pegawai->tgl_lahir }}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							Jenis Kelamin
						</div>
						<div class='col'>
							<span>:{{ $det_pegawai->jenis_kelamin }}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							Alamat
						</div>
						<div class='col'>
							<span>:{{ $det_pegawai->alamat }}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							Email
						</div>
						<div class='col'>
							<span>:{{ $det_pegawai->email }}</span>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-3">
							Ditambahkan oleh
						</div>
						<div class='col'>
							<span>:{{ $det_pegawai->input_by }}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection