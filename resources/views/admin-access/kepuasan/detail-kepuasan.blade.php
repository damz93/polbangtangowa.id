@extends('admin-access.layouts.main')
@section('container')
<p style="font-size:28px" class="mt-3">Detail Kepuasan - NIK: {{ $kepuasan->nik }}</p>
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
							<span>:{{ $kepuasan->nama }}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							Tingkat Kepuasan
						</div>
						<div class='col'>
							<span>:{{ $kepuasan->tingkat_kepuasan }}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							Pesan
						</div>
						<div class='col'>
							<span>:{{ $kepuasan->pesan }}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							Kesan
						</div>
						<div class='col'>
							<span>:{{ $kepuasan->kesan }}</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							Kritik
						</div>
						<div class='col'>
							<span>:{{ $kepuasan->kritik }}</span>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection