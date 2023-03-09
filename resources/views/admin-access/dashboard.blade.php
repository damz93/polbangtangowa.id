@extends('admin-access.layouts.main')
@section('container')
<div class="textright">
	<p style="font-size:30px" class="mt-1">Selamat Datang, 
		@auth {{ auth()->user()->nama }} @endauth
	</p>
</div>
<hr>
<div class="row">
	<p style="font-size:16px;text-align:right" class="mt-2">
		{{ $tgl_hari }}
	</p>
	<div class="col-md-4">
		<div class="service-box" style="">
			<div class="service-content">
				<p style="font-size:14pt" class="text-center">Jumlah Kunjungan Hari ini
				</p>
			</div>
			<div class="service-ico">
				<span class="ico-circle">
					<p style="font-size: 50pt" class="s-description text-center">{{ $jumlah_hi }}</p>
					<i class="ion-monitor"></i>
				</span>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="service-box">
			<div class="service-content">
				<p style="font-size:14pt" class="text-center">Jumlah Kunjungan Bulan ini
				</p>
			</div>
			<div class="service-ico">
				<span class="ico-circle">
					<p style="font-size: 50pt" class="s-description text-center">{{ $jumlah_bi }}</p>
					<i class="ion-monitor"></i>
				</span>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="service-box">
			<div class="service-content">
				<p style="font-size:14pt" class="text-center">Jumlah Kunjungan Tahun ini
        </p>
			</div>
			<div class="service-ico">
				<span class="ico-circle">
					<p style="font-size: 50pt" class="s-description text-center">{{ $jumlah_ti }}</p>
					<i class="ion-monitor"></i>
				</span>
			</div>
		</div>
	</div>
</div>

<div class="row">
  <p style="font-size:20pt" class="text-center"><u>Persentase Kunjungan Hari ini</u>
  </p>
</div>  
<div class="left">
  <canvas id="myChart"></canvas>
</div>



<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'pie',      
      data: {
          labels: ['Laki-laki','Perempuan'],
          datasets: [{
              label: 'Pengunjung',
              data: [
                  {{ $data_kunjungan_hi_laki }},
                  {{ $data_kunjungan_hi_perem }},
              ],
              backgroundColor: [
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
              ],
              borderColor: [
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 99, 132, 1)',
                  'rgba(255, 206, 86, 1)',
              ],
              borderWidth: 1
          }]
      },
      options: {
          responsive: true,
          maintainAspectRatio: false,
      }
  });
</script>
@endsection