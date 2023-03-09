@extends('layout.master')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-5">
			@if(session()->has('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('success') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			@endif
			@if(session()->has('LoginError'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				{{ session('LoginError') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			@endif
			<main class="form-signin w-100 m-auto">
				<form autocomplete="off" action="/admin-access/login" method="POST">
					@csrf
					<div class="row justify-content-center mt-4">
						<div class="card" style="width: 500px;">
							<div class="text-center m-3">
								<img src="/img/logo_tamuku.png" width="180" class="mb-10" height="180" alt="logo">
							</div>
							<div class="card-body">
								<p class="h3 fw-normal text-center">Silahkan login</p>
								<div class="form-floating">
									<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autofocus required placeholder="Masukkan Email" value={{ old('email') }}>
									<label for="floatingInput">Email</label>
									@error ('email')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
									@enderror
								</div>
								<div class="form-floating">
									<input type="password" class="form-control" id="floatingPassword" id="password" required name="password" placeholder="Password">
									<label for="floatingPassword">Password</label>
								</div>
								<div hidden class="checkbox mb-3">
									<label>
									<input type="checkbox" value="remember-me"> Remember me
									</label>
								</div>
								<button class="w-100 btn btn-lg btn-success" type="submit">Login</button>
								<button hidden class="w-100 btn btn-lg btn-danger" type="reset">Cancel</button>
							</div>
						</div>
					</div>
				</form>
			</main>
		</div>
	</div>
</div>
<div class="footer">
	<img src="/img/logo_tamuku.png" width="20" height="20" alt="logo">
	<small class="text-muted">support  by: </small>
	<a class="text-reset fw-bold" href="/">tamuku-ppigowa.id</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
@endsection