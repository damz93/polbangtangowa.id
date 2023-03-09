<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ $title }}</title>
		<link rel="icon" type="image/png" href="/img/logo_tamuku.png">        
		<meta http-equiv="refresh" content="5; url=/">
		 <!--// font google -->
		 <link rel="preconnect" href="https://fonts.googleapis.com">
		 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
<style>    
    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      height: 5%;
      background-color:white;
      color: #177a3a;
      text-align: center;
      padding: 5px;
   }   
   </style> 
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		<style type="text/css">
			.left    { text-align: left;}
			.right   { text-align: right;}
			.center  { text-align: center;}
			.justify { text-align: justify;}
		</style>
		<style type="text/css" media="print">
			@media screen {
			p.bodyText {font-family:verdana, arial, sans-serif;}
			p.bodyText {font-size:6pt}
			}
			@media print {
			p.bodyText {font-family:georgia, times, serif;}
			p.bodyText {font-size:10pt}
			}
			@media screen, print {
			p.bodyText {font-size:10pt
			size: a4;
    margin:0;}
			}
		</style>
	</head>
	<body>
		<table class="center" style="width:100%">
			<tr class='center'>
				<td colspan='2'>
					<img src="/img/header_.jpg" width='100%'>
          <hr size="4px">
				</td>
			</tr>			
      <tr class='center'>
				<td class="left" style="margin-left:100%">          
          <?php $jam = substr($tiket_tamu->created_at,10,10) ?>
					Pukul: {{ $jam }} WITA
				</td>
				<td class="right" style="margin-left:0px">
          <?php $tgl = substr($tiket_tamu->created_at,0,10);
                $tgl_ = date("l, j/m/Y", strtotime($tgl));
          ?>
					{{ $tgl_ }}
				</td>
			</tr>
			<tr class="center">
				<td colspan='2'>
					<p style="font-size:25pt">NOMOR REGISTRASI ANDA:</p>
				</td>
			</tr>
			</tr>
			<tr class="center">
				<td colspan='2'>
					<p style="font-size:50pt"><b>{{ $tiket_tamu->kode_kunjungan }}</b></p>
				</td>
			</tr>
			<tr class="center">
				<td colspan='2'>
					<p style="font-size:20pt">Nama Pengunjung</p>
					<p style="font-size:25pt"><b>{{ $tiket_tamu->nama }}</b></p>
				</td>
			</tr>
			<tr class="center">
				<td colspan='2'>
					<p style="font-size:20pt">Asal Instansi</p>
          			<p style="font-size:25pt"><b>{{ $tiket_tamu->asal_instansi }}</b></p>
				</td>
			</tr>
			<tr class="center">
				<td colspan='2'>
					<p style="font-size:20pt">Jenis Keperluan</p>
          			<p style="font-size:25pt"><b>{{ $tiket_tamu->jenis_keperluan }}</b></p>
				</td>
			</tr>
    </tr>
			<tr class="center">
				<td colspan='2'>
					<p style="font-size:14pt"><i>Perlihatkan tiket ini kepada petugas PPID untuk mendapatkan pelayanan <br>sesuai dengan jenis keperluan yang dikehendaki. Terima Kasih.</i></p>
				</td>
      </tr>
      <tr class='center'>      
				<td colspan='2'>
          <hr size="4px">
					<img src="/img/footer_.jpg" width='70%'>
				</td>
			</tr>
		</table>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
		<script>
			window.print();
		</script>
	</body>
</html>