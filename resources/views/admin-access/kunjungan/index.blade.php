@extends('admin-access.layouts.main')
@section('container')
<p style="font-size:30px" class="mt-3">Data Kunjungan</p>
<hr>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
	<div class="container">
		<div class=" table-wrapper table-responsive">
			<div style="width:100%;">
				<form autocomplete="off" action="/admin-access/kunjungan/cari" method="GET">
					<div class="input-group mb-3">
					<input type="text" class="form-control" type="text" autofocus name="kode_kunjungan" placeholder="Cari Kunjungan: Kode Kunjungan" value="{{ old('kode_kunjungan') }}">
					<div class="input-group-append">
					&nbsp; <button class="btn btn-outline-success" type="submit">Cari</button>
					<a href="/admin-access/kunjungan" class="btn btn-outline-warning">Reset</a>
					</div>
				</div>

				</form>

			</div>
			<table id="table_kunjungan" class="table table-hover table-bordered">
				<thead class="text-center bg-light header">
					<tr>
						<th>
							Tanggal Kunjungan
						</th>
						<th>
							Kode Kunjungan
						</th>
						<th>
							NIK
						</th>
						<th>
							Nama
						</th>
						<th>
							Bertemu Dengan
						</th>
						<th>
							Jenis Keperluan
						</th>
						<th>
							Status
						</th>
						<th>
							Foto Selfie
						</th>
						<th>
							Aksi
						</th>
					</tr>
				</thead>
				<?php $a=1;?>
				@foreach ($kunjungan as $kunjung)
				<tbody>
					<tr>
						<td class="text-center">
							{{ date('d-m-Y', strtotime($kunjung->created_at)); }}
						</td>
						<td class="text-center">
							{{ $kunjung->kode_kunjungan }}
						</td>
						<td class="text-center">
							{{ $kunjung->nik }}
						</td>
						<td>
							{{ $kunjung->nama }}
						</td>
						<td>
							{{ $kunjung->bertemu_dengan }}
						</td>
						<td class="text-center">
							{{ $kunjung->jenis_keperluan }}
						</td>
						<td class="text-center">
							{{ $kunjung->status }}
						</td>
						<td class="text-center">
							<a target="_blank" href="{{ asset('storage/'.$kunjung->foto) }}"><img width="40"src="{{ asset('storage/'.$kunjung->foto) }}"></a>
						</td>
						<td class="text-center">
							<?php
								if ($kunjung->status != 'Done'){
								
							?>
								<a onclick="return confirm('Update status ke DONE??')"  title="Update Status User" href="/admin-access/kunjungan/update-kunjungan/{{ $kunjung->id }}" method="GET"><i class="bi bi-check-square"></i></a>
							<?php
								}
								else{
							?>
								<a href="#" title="Done"><i class="bi bi-check-square"></i></a>
							<?php }
							?>

						</td>
					</tr>
				</tbody>
				<?php $a++; ?>
				@endforeach
			</table>
			{{ $kunjungan->links() }}
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    

@endsection