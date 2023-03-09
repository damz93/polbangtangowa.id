@extends('admin-access.layouts.main')
@section('container')
<p style="font-size:30px" class="mt-3">Data Pekerjaan</p>
<p class="text-right">
<hr>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	<div class="container">
    <a href="/admin-access/pekerjaan/tambah-pekerjaan" class="btn btn-success mb-3">+ Pekerjaan</a>
		<div class=" table-wrapper table-responsive">

			<div style="width:100%;">
				<form autocomplete="off" action="/admin-access/pekerjaan/cari" method="GET">
					<div class="input-group mb-3">
					<input type="text" class="form-control" type="text" autofocus name="pekerjaan" placeholder="Cari Pekerjaan: Pekerjaan" value="{{ old('pekerjaan') }}">
					<div class="input-group-append">
					&nbsp; <button class="btn btn-outline-success" type="submit">Cari</button>
					<a href="/admin-access/pekerjaan" class="btn btn-outline-warning">Reset</a>
					</div>
				</div>

				</form>

			</div>
			<table id="tabel1" class="table table-hover table-bordered">
				<thead class="text-center bg-light header">
					<tr>						
						<th>
							Nama Pekerjaan
						</th>
						<th>
							Input By
						</th>
						<th>
							Aksi
						</th>
					</tr>
				</thead>
				<?php $a=1;?>
				@foreach ($pekerjaan as $pek)
				<tbody>
					<tr>
						<td>
							{{ $pek->nama_pekerjaan }}
						</td>
						<td>
							{{ $pek->input_by }}
						</td>
						<td class="text-center">
							<a title="Edit Pekerjaan" href="pekerjaan/edit-pekerjaan/{{ $pek->id }}"><i class="bi bi-pen"></i></a>
							|
							<a title="Hapus Pekerjaan" onclick="return confirm('Anda yakin menghapus??')"  href="/admin-access/pekerjaan/hapus-pekerjaan/{{ $pek->id }}" method="GET"><i class="bi bi-trash3-fill"></i></a>
						</td>
					</tr>
				</tbody>
				<?php $a++; ?>
				@endforeach
			</table>
			{{ $pekerjaan->links() }}
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endsection