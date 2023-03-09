<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Kepuasan;
use App\Models\Kunjungan;
use Illuminate\Http\Request;

class KepuasanController extends Controller{
    //
    public function simpan(Request $request){        
        //dd($request->all());                
        Kepuasan::create(array_merge($request->except('_token','simpan')));
        return redirect('terimakasih');
    }

    public function index(){        
        $kepuasan = Kepuasan::orderBy('id', 'desc')->paginate(10);

        return view('admin-access.kepuasan.data-kepuasan', compact([
            'kepuasan']),["title"=>"Data Kepuasan | Polbangtan Gowa"]);
    }

    public function input($id){
        $kunjungan = Kunjungan::find($id); 
        return view('kepuasan',compact([
            'kunjungan']),["title"=>"Input Review | Polbangtan Gowa"]);
    }

    public function cari(Request $request){
        // menangkap data pencarian
        $cari = $request->kode_kunjungan;
     //   dd($cari);
     
         // mengambil data dari table pegawai sesuai pencarian data
        $kepuasan = DB::table('kepuasans')
        ->where('kode_kunjungan','like',"%".$cari."%")
        ->paginate(10);
     
            // mengirim data pegawai ke view index
        return view('admin-access.kepuasan.data-kepuasan',[
            'kepuasan' => $kepuasan,
            "title"=>"Data Kepuasan | Polbangtan Gowa"
        ]);
     
    }

    public function detail($id){
        $kepuasan = Kepuasan::find($id);        
        $nik = $kepuasan->nik;
        //dd($nik);        

        return view('admin-access.kepuasan.detail-kepuasan',[
            "title"=>"Detail Kepuasan | Buku Tamu Polbangtan-Gowa",
            "active"=>"login",
            'kepuasan'=>$kepuasan
        ]);
    }
}