@extends('admin-access.layouts.main')
@section('container')
<p style="font-size:28px" class="mt-3">Edit Pekerjaan - {{ $keperluan->keperluan }}</p>
<hr>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	<div class="card mb-5">
		<div class="container">
			<div class="card-body p-0 m-2">
				<div class=" table-wrapper table-responsive">
					<form class="m-4" autocomplete="off" action="/admin-access/keperluan/update-keperluan/{{ $keperluan->id }}" method="POST" enctype="multipart/form-data">
						@method('put')
						@csrf
						<div class="mb-3">
							<label for="nama" class="form-label">Keperluan</label>
							<input type="text" autofocus class="form-control" value="{{ $keperluan->keperluan }}" name="keperluan" id="keperluan" placeholder="Masukkan Keperluan">
						</div>
						<div class="mb-3">
							<input type="submit" name="update" value="Update" class="btn btn-success btn-lg"></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endsection