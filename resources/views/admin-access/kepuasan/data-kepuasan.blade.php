@extends('admin-access.layouts.main')
@section('container')
<p style="font-size:30px" class="mt-3">Data Review</p>
<hr>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
	<div class="container">
		<div class=" table-wrapper table-responsive">
			<div style="width:100%;">
				<form autocomplete="off" action="/admin-access/kepuasan/cari" method="GET">
					<div class="input-group mb-3">
					<input type="text" class="form-control" type="text" autofocus name="kode_kunjungan" placeholder="Cari Review: Kode Kunjungan" value="{{ old('kode_kunjungan') }}">
					<div class="input-group-append">
					&nbsp; <button class="btn btn-outline-success" type="submit">Cari</button>
					<a href="/admin-access/kepuasan" class="btn btn-outline-warning">Reset</a>
					</div>
				</div>

				</form>

			</div>
			<table id="tabel1" class="table table-hover table-bordered">
				<thead class="text-center bg-light header">
					<tr>
						<th>
							Tanggal
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
							Tingkat Kepuasan
						</th>
						<th>
							Aksi
						</th>
					</tr>
				</thead>
				<?php $a=1;?>
				@foreach ($kepuasan as $t)
				<tbody>
					<tr>
						<td class="text-center">
							<?php echo $t->created_at; ?>
						</td>
						<td class="text-center">
							{{ $t->kode_kunjungan }}
						</td>
						<td class="text-center">
							{{ $t->nik }}
						</td>
						<td>
							{{ $t->nama }}
						</td>
						<td class="text-center">
							{{ $t->tingkat_kepuasan }}
						</td>
						<td class="text-center">
							<a title="Detail Kepuasan" href="kepuasan/detail-kepuasan/{{ $t->id }}"><i class="bi bi-eye"></i></a>							
						</td>
					</tr>
				</tbody>
				<?php $a++; ?>
				@endforeach
			</table>
			{{ $kepuasan->links() }}
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
</div>
</div>
@endsection