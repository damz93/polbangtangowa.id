<!doctype html>
<html lang="en">
	<head>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ $title }}</title>
		<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
		<link rel="icon" type="image/png" href="/img/logo_tamuku.png">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="/js/dashboard.js"></script>		
		<link href="/css/style.css" rel="stylesheet">	
		
		<link href="/css/dashboard.css" rel="stylesheet">
		<link href="/css/tambahan.css" rel="stylesheet">
		
		

		<link href="/css/Minty.bootstrap.min.css" rel="stylesheet">
		
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">		

		<!--// font google -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
				
		<script src="/js/knoob.js"></script>


		<style>
			.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
			}
			@media (min-width: 768px) {
			.bd-placeholder-img-lg {
			font-size: 3.5rem;
			}
			}
			.b-example-divider {
			height: 3rem;
			background-color: rgba(0, 0, 0, .1);
			border: solid rgba(0, 0, 0, .15);
			border-width: 1px 0;
			box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
			}
			.b-example-vr {
			flex-shrink: 0;
			width: 1.5rem;
			height: 100vh;
			}
			.bi {
			vertical-align: -.125em;
			fill: currentColor;
			}
			.nav-scroller {
			position: relative;
			z-index: 2;
			height: 2.75rem;
			overflow-y: hidden;
			}
			.nav-scroller .nav {
			display: flex;
			flex-wrap: nowrap;
			padding-bottom: 1rem;
			margin-top: -1px;
			overflow-x: auto;
			text-align: center;
			white-space: nowrap;
			-webkit-overflow-scrolling: touch;
			}
			*{
			font-family: 'Poppins', sans-serif;
			}


			body {
			width: auto; /* atur lebar halaman menjadi 800 piksel */
			height: 880px; /* atur tinggi halaman menjadi 600 piksel */
		}
		</style>



	</head>
	<body>
		@include('admin-access/layouts/header')
		
		<div class="container-fluid">
			<div class="row">
				@include('admin-access/layouts/sidebar')
				<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
					@yield('container')

					<footer class="footer section py-6 mt-5">
						<div class="row">
							<div class="col-12 col-lg-6 mb-4 mb-lg-0">
								<p class="mb-0 text-center text-xl-left">作成者 <a class="text-secondary fw-normal" href="https://damz-disini.blogspot.com/" target="_blank"><b>D.A.M.Z</b></a><span class="current-year"></span> </p>								
							</div>
						</div>
					</footer> 

				</main>
			</div>
		</div>
	</body>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>