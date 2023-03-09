@extends('admin-access.layouts.main')
@section('container')
<p style="font-size:30px" class="mt-3">Data User</p>
<p class="text-right">
<hr>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	
	<div class="container">
		<a href="/admin-access/user/tambah-user" class="btn btn-success mb-3">+ User</a>
		<div class=" table-wrapper table-responsive">
			<div style="width:100%;">
				<form autocomplete="off" action="/admin-access/user/cari" method="GET">
					<div class="input-group mb-3">
					<input type="text" class="form-control" type="text" autofocus name="email" placeholder="Cari user: Email" value="{{ old('email') }}">
					<div class="input-group-append">
					&nbsp; <button class="btn btn-outline-success" type="submit">Cari</button>
					<a href="/admin-access/user" class="btn btn-outline-warning">Reset</a>
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
							Jenis Kelamin
						</th>
						<th>
							Email
						</th>
						<th>
							Aksi
						</th>
					</tr>
				</thead>
				<?php $a=1;?>
				@foreach ($user as $us)
				<tbody>
					<tr>
						<td class="text-center">
							{{ $us->nik }}
						</td>
						<td>
							{{ $us->nama }}
						</td>
						<td class="text-center">
							{{ $us->jenis_kelamin }}
						</td>
						<td>
							{{ $us->email }}
						</td>
						<td class="text-center">
							<a title="Edit User" href="/admin-access/user/edit-user/{{ $us->id }}"><i class="bi bi-pen"></i></a>
							|
							<a onclick="return confirm('Anda yakin menghapus??')"  title="Hapus User" href="/admin-access/user/hapus-user/{{ $us->id }}" method="GET"><i class="bi bi-trash3-fill"></i></a>
						</td>
					</tr>
					<?php $a++; ?>
				</tbody>
				@endforeach
			</table>
			{{ $user->links() }}
			
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endsection