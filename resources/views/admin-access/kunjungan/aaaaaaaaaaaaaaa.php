@extends('layout.master')
@section('content')
<a class="btn btn-info" href="/admin-access/dashboard">Kembali ke Dashboard</a>
<div class="container">
	<div class="text-center mb-3">
		<img src="/img/logo_tamuku.png" width="180" class="mb-10" height="180" alt="logo">
	</div>
	<table id="table_kunjungan" class="table table-hover table-bordered">
		<thead class="text-center bg-light header">
			<tr>
				<td>
					NIK
				</td>
				<td>
					Nama
				</td>
				<td>
					Bertemu Dengan
				</td>
				<td>
					Jenis Keperluan
				</td>
				<td>
					Gambar
				</td>
			</tr>
		</thead>
		<?php $a=1;?>
		@foreach ($kunjungan as $kunjung)
		<tbody>
			<tr>
				<td>
					<?php echo $a; ?>
				</td>
				<td>
					{{ $kunjung->nik }}
				</td>
				<td>
					{{ $kunjung->nama }}
				</td>
				<td>
					{{ $kunjung->bertemu_dengan }}
				</td>
				<td>
					{{ $kunjung->jenis_keperluan }}
				</td>
				<td>
					<a target="_blank" href="{{ asset('/storage/'.$kunjung->foto) }}"><img width="40"src="{{ asset('/storage/'.$kunjung->foto) }}"></a>
				</td>
			</tr>
		</tbody>
		<?php $a++; ?>
		@endforeach
	</table>
</div>



<script>
	$(document).ready(function() {
		window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove();
			});
		}, 3000);
		$('#table_kunjungan').DataTable({
			'paging':false,
			'searching':false,
			'info':false,
			'order':[]
		});
	}); 
	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
	  return new bootstrap.Tooltip(tooltipTriggerEl)
	})
	</script>
@endsection