<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Http\Requests\StoreTamuRequest;


use Carbon\Carbon;
use App\Http\Requests\UpdateTamuRequest;
use App\Models\Kunjungan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    
    {
        $today = Carbon::now()->toDateString();
        $bulan = date("m");
        $tahun = date("Y");

       // $data_kunjungan = DB::table('kunjungans')->count(); // Sesuaikan dengan kolom yang Anda butuhkan
        $data_kunjungan_hi_perem  = DB::table('kunjungans')
        ->where('jenis_kelamin', 'Perempuan')
        ->count();
        // $data_kunjungan_hi_laki  = DB::table('kunjungans')
        // ->where('jenis_kelamin', 'Laki-laki')
        // ->count();        


        $data_kunjungan_hi_laki = DB::table('kunjungans')
            ->whereDate('created_at', $today)
            ->where('jenis_kelamin', 'LAKI-LAKI')
            ->count();

        $data_kunjungan_hi_perem = DB::table('kunjungans')
            ->whereDate('created_at', $today)
            ->where('jenis_kelamin', 'PEREMPUAN')
            ->count();

    $tgl_hari_ini = date("l, d-M-Y");
    $count_hari_ini = DB::table('kunjungans')
                ->whereDate('created_at', $today)
                ->count();                
    $count_bulan_ini = DB::table('kunjungans')
                ->whereMonth('created_at', $bulan)
                ->count();
    $count_tahun_ini = DB::table('kunjungans')
                ->whereYear('created_at', $tahun)
                ->count();
        return view('admin-access.dashboard',[
            "title"=>"Dashboard | Buku Tamu Polbangtan-Gowa",
            "jumlah_hi"=>$count_hari_ini,
            "jumlah_bi"=>$count_bulan_ini,
            "jumlah_ti"=>$count_tahun_ini,
            "tgl_hari"=>$tgl_hari_ini
        ],compact('data_kunjungan_hi_perem','data_kunjungan_hi_laki'));
    }

}