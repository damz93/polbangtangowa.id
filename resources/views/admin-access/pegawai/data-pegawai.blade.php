@extends('admin-access.layouts.main')
@section('container')

<p style="font-size:30px" class="mt-3">Data Pegawai</p><p class="text-right">
<hr>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
	<div class="container">




		<a href="/admin-access/pegawai/tambah-pegawai" class="btn btn-success mb-3">+ Pegawai</a>
		<div class=" table-wrapper table-responsive">
			
				<div style="width:100%;">
					<form autocomplete="off" action="/admin-access/pegawai/cari" method="GET">
						<div class="input-group mb-3">
						<input type="text" class="form-control" type="text" autofocus name="nik" placeholder="Cari Pegawai: NIK" value="{{ old('nik') }}">
						<div class="input-group-append">
						&nbsp; <button class="btn btn-outline-success" type="submit">Cari</button>
						<a href="/admin-access/pegawai" class="btn btn-outline-warning">Reset</a>
						</div>
					</div>
	
					</form>
	
				</div>

			<table id="tabel1" class="table table-hover table-bordered">
				<thead class="text-center bg-light header">
					<tr>
								<th>
									NIK
								</th>
								<th>
									Nama
								</th>
								<th>
									Aksi
								</th>
							</tr>
						</thead>
						<?php $a=1;?>
						@foreach ($pegawai as $pegawa)         
						<tbody>
							<tr>
								<td class="text-center">
									{{ $pegawa->nik }}
								</td>
								<td>
									{{ $pegawa->nama }}
								</td>
								<td class="text-center">              
									<a title="Detail Pegawai" href="pegawai/detail-pegawai/{{ $pegawa->id }}"><i class="bi bi-eye"></i></a>
									|
									<a title="Edit Pegawai" href="pegawai/edit-pegawai/{{ $pegawa->id }}"><i class="bi bi-pen"></i></a>
									|
									<a title="Hapus Pegawai" onclick="return confirm('Anda yakin menghapus??')"  href="/admin-access/pegawai/hapus-pegawai/{{ $pegawa->id }}" method="GET"><i class="bi bi-trash3-fill"></i></a>
								</td>
							</tr>
						</tbody>
						<?php $a++; ?>
						@endforeach
					</table>
					{{ $pegawai->links() }}
				</div>
			</div>
		</div>

	</div>
</div>
@endsection