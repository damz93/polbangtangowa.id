<?php

use App\Http\Controllers\CekNikController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\KeperluanController;
use App\Http\Controllers\TerimakasihController;
use App\Http\Controllers\KepuasanController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WebcamController;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailTamu;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/a', function () {
    return view('index','KunjunganController@index',[
        "title"=>"Halaman Utamanya ini gess",

    ]);
});
*/
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
    
Route::get('/admin-access/dashboard',function(){
    if(session('Berhasil_Login')){
        return response()->view('admin-access.dashboard',[
            "title"=>"Dashboard | Buku Tamu Polbangtan-Gowa"
        ]);
    }
    else{
        return redirect('/');
    }

});

    Route::put('/review/simpan-review/{id}', [KepuasanController::class,'simpan']);
    Route::get('/terimakasih', [TerimakasihController::class,'index']);
    Route::get('/review/{id}', [KepuasanController::class,'input']);

    Route::get('/', [KunjunganController::class,'create'])->name('kunjungan'); 
    Route::post('/simpan-kunjungan', [KunjunganController::class,'store']);
    Route::get('/cetak-tiket', [KunjunganController::class,'cari_apa']);
    Route::get('/cetak-tiket/{id}', [KunjunganController::class,'cetak']);
    Route::get('/qrcode', [QrCodeController::class, 'index']);
    Route::get('webcam', [WebcamController::class, 'index']);
    Route::post('webcam', [WebcamController::class, 'store'])->name('webcam.capture');
    
    // Route::get('/send-email', function () {
    //     $details = [
    //         'title' => 'Ini adalah judul email',
    //         'body' => 'Ini adalah isi pesan email'
    //     ];
    
    //     Mail::to('dedy.alimmuzawwir@gmail.com')->send(new EmailTamu($details));
    
    //     return 'Email berhasil dikirim';
    // });
    Route::get('/admin-access/send-email', [MailController::class,'send']);

Route::group(['middleware' => 'CekLoginMiddleware'],function(){
    //kunjungan
    Route::get('/admin-access/kunjungan', [KunjunganController::class,'index'])->name('kunjungan');
    Route::get('/admin-access/kunjungan/update-kunjungan/{id}', [KunjunganController::class,'update'])->name('kunjungan');
    Route::get('/admin-access/kunjungan/cari', [KunjunganController::class,'cari']);

    //pegawai
    Route::get('/admin-access/pegawai', [PegawaiController::class,'index'])->name('pegawai');
    Route::get('/admin-access/pegawai/tambah-pegawai', [PegawaiController::class,'create'])->name('pegawai');
    Route::post('/admin-access/pegawai/simpan-pegawai', [PegawaiController::class,'store']);
    Route::get('/admin-access/pegawai/edit-pegawai/{id}', [PegawaiController::class,'edit'])->name('pegawai');
    Route::get('/admin-access/pegawai/detail-pegawai/{id}', [PegawaiController::class,'detail'])->name('pegawai');
    Route::put('/admin-access/pegawai/update-pegawai/{id}', [PegawaiController::class,'update'])->name('pegawai');
    Route::get('/admin-access/pegawai/cari', [PegawaiController::class,'cari']);
    Route::get('/admin-access/pegawai/hapus-pegawai/{id}', [PegawaiController::class,'hapus'])->name('pegawai');

    //keperluan
    Route::get('/admin-access/keperluan', [KeperluanController::class,'index'])->name('keperluan');
    Route::get('/admin-access/keperluan/tambah-keperluan', [KeperluanController::class,'create'])->name('keperluan');
    Route::post('/admin-access/keperluan/simpan-keperluan', [KeperluanController::class,'store']);
    Route::get('/admin-access/keperluan/cari', [KeperluanController::class,'cari']);
    Route::get('/admin-access/keperluan/edit-keperluan/{id}', [KeperluanController::class,'edit'])->name('keperluan');
    Route::put('/admin-access/keperluan/update-keperluan/{id}', [KeperluanController::class,'update'])->name('keperluan');
    Route::get('/admin-access/keperluan/hapus-keperluan/{id}', [KeperluanController::class,'hapus'])->name('keperluan');

    //pekerjaan
    Route::get('/admin-access/pekerjaan', [PekerjaanController::class,'index'])->name('pekerjaan');
    Route::get('/admin-access/pekerjaan/tambah-pekerjaan', [PekerjaanController::class,'create'])->name('pekerjaan');
    Route::post('/admin-access/pekerjaan/simpan-pekerjaan', [PekerjaanController::class,'store']);
    Route::get('/admin-access/pekerjaan/edit-pekerjaan/{id}', [PekerjaanController::class,'edit'])->name('pekerjaan');
    Route::get('/admin-access/pekerjaan/cari', [PekerjaanController::class,'cari']);
    Route::put('/admin-access/pekerjaan/update-pekerjaan/{id}', [PekerjaanController::class,'update'])->name('pekerjaan');
    Route::get('/admin-access/pekerjaan/hapus-pekerjaan/{id}', [PekerjaanController::class,'hapus'])->name('pekerjaan');

    //kepuasan
    Route::get('/admin-access/kepuasan', [KepuasanController::class,'index'])->name('kepuasan');
    Route::get('/admin-access/kepuasan/cari', [KepuasanController::class,'cari']);
    Route::get('/admin-access/kepuasan/detail-kepuasan/{id}', [KepuasanController::class,'detail'])->name('kepuasan');
    
    //tamu
    Route::get('/admin-access/tamu', [TamuController::class,'index'])->name('tamu');
    Route::get('/admin-access/tamu/detail-tamu/{id}', [TamuController::class,'detail'])->name('tamu');
    Route::get('/admin-access/tamu/hapus-tamu/{id}', [TamuController::class,'hapus'])->name('tamu');
    Route::get('/admin-access/tamu/cari', [TamuController::class,'cari']);

    //user
    Route::get('/admin-access/user', [UserController::class,'index'])->name('user');
    Route::get('/admin-access/user/tambah-user', [UserController::class,'create'])->name('user');
    Route::post('/admin-access/user/simpan-user', [UserController::class,'store']);
    Route::get('/admin-access/user/edit-user/{id}', [UserController::class,'edit'])->name('user');
    Route::put('/admin-access/user/update-user/{id}', [UserController::class,'update'])->name('user');
    Route::get('/admin-access/user/cari', [UserController::class,'cari']);
    Route::get('/admin-access/user/hapus-user/{id}', [UserController::class,'hapus'])->name('user');

    //dashboard
    
    Route::get('/admin-access/dashboard', [DashboardController::class,'index'])->name('dashboard');
});
//login
    Route::get('/admin-access/login', [LoginController::class,'index']);
    Route::post('/admin-access/login', [LoginController::class,'authenticate']);
    Route::get('/admin-access/logout', [LoginController::class,'logout']);


    Route::get('/get-profile', [CekNikController::class,'getProfile']);
    //Route::resource('/admin-access/kunjungan', DashboardMenu_Controller::class)->middleware('auth');
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
