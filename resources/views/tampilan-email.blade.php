{{-- Hello <i>{{ $demo->receiver }}</i>,
<p>This is a demo email for testing purposes! Also, it's the HTML version.</p>
<p><u>Demo object values:</u></p>
<div>
<p><b>Demo One:</b>&nbsp;{{ $demo->demo_one }}</p>
<p><b>Demo Two:</b>&nbsp;{{ $demo->demo_two }}</p>
</div>
<p><u>Values passed by With method:</u></p>
<div>
<p><b>testVarOne:</b>&nbsp;{{ $testVarOne }}</p>
<p><b>testVarTwo:</b>&nbsp;{{ $testVarTwo }}</p>
</div>
Thank You,
<br/>
<i>{{ $demo->sender }}</i> --}}
{{-- <br/>
<i>{{ $demo->sender }}</i>  --}}

<p>Hallo, <b>{{ $demo->penerima }}</b></p>
<br/>
<p><b>Terima kasih</b> telah melakukan pengisian buku tamu melalui aplikasi Tamuku-polbangtangowa.id</p>
<p>Silahkan mengisi formulir kepuasan pelayanan yang kami berikan melalui link di bawah ini :</p>
<br/>
<a href="{{ $demo->link }}" target="_BLANK">Form Kepuasan Pelayanan Informasi</a>
<br/>
<br/>
<p>Terima kasih atas partisipasinya.</p>
<br/>
Salam, 
<br/>
<br/>
<br/>
<b>Admin Tamuku PPID Polbangtan Gowa</b>
<br/>
<br/>
<i>Dapatkan informasi terupdate terkait penyelenggaraan pendidikan Politeknik Pembangunan Pertanian Gowa melalui website www.polbangtan-gowa.ac.id dan akun media sosial resmi kami.</i>