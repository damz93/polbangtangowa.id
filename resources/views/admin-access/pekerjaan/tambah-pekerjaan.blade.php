@extends('admin-access.layouts.main')
@section('container')
<p style="font-size:30px" class="mt-3">Tambah Pekerjaan</p>
<p class="text-right">
<hr>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	<div class="card mb-5">
		<div class="container">
			<div class="card-body p-0 m-2">
				<div class=" table-wrapper table-responsive">
					<form class="m-4" autocomplete="off" action="simpan-pekerjaan" method="POST" enctype="multipart/form-data">						
						@csrf
						<div class="mb-3">
							<label for="nama" class="form-label">Pekerjaan</label>
							<input type="text" autofocus class="form-control" name="nama_pekerjaan" id="nama_pekerjaan" placeholder="Masukkan Nama Pekerjaan">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endsection