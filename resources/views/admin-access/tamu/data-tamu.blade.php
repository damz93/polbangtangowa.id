@extends('admin-access.layouts.main')
@section('container')
<p style="font-size:30px" class="mt-3">Data Tamu</p>
<hr>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
	<div class="container">
		<div class=" table-wrapper table-responsive">
			<div style="width:100%;">
				<form autocomplete="off" action="/admin-access/tamu/cari" method="GET">
					<div class="input-group mb-3">
					<input type="text" class="form-control" type="text" autofocus name="nama" placeholder="Cari Tamu: Nama" value="{{ old('nama') }}">
					<div class="input-group-append">
					&nbsp; <button class="btn btn-outline-success" type="submit">Cari</button>
					<a href="/admin-access/tamu" class="btn btn-outline-warning">Reset</a>
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
							Asal Instansi
						</th>
						<th>
							Aksi
						</th>
					</tr>
				</thead>
				<?php $a=1;?>
				@foreach ($tamu as $t)
				<tbody>
					<tr>
						<td class="text-center">
							{{ $t->nik }}
						</td>
						<td>
							{{ $t->nama }}
						</td>
						<td>
							{{ $t->asal_instansi }}
						</td>
						<td class="text-center">
							<a title="Detail Tamu" href="/admin-access/tamu/detail-tamu/{{ $t->id }}"><i class="bi bi-eye"></i></a>
							|         
							<a title="Hapus Tamu" onclick="return confirm('Anda yakin menghapus??')"  href="/admin-access/tamu/hapus-tamu/{{ $t->id }}" method="GET"><i class="bi bi-trash3-fill"></i></a>
						</td>
					</tr>
				</tbody>
				<?php $a++; ?>
				@endforeach
			</table>
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
</div>
</div>
@endsection