<?php

namespace App\Http\Controllers;

use App\Models\Keperluan;
use Illuminate\Support\Str;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Kunjungan;
use App\Models\Pegawai;
use App\Models\Pekerjaan;
use App\Models\Tamu;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use LengthException;

class KunjunganController extends Controller
{
    
    public function index(){
        $kunjungan = Kunjungan::orderBy('id', 'desc')->paginate(10);
        return view('admin-access.kunjungan.index', compact([
            'kunjungan']),["title"=>"Data Kunjungan | Polbangtan Gowa"]);
    }
    public function create(){
        $pekerjaan = Pekerjaan::all();
        $pegawai = Pegawai::all();
        $keperluan = Keperluan::all();
        return view('kunjungan',compact(['pekerjaan','keperluan','pegawai']),["title"=>"Buku Tamu | Polbangtan Gowa"]);        
    }
    public function store(Request $request){

        $tahun = date("Y");
        $total_kunjungan_pertahun_ini = DB::table('kunjungans')->whereyear('created_at',$tahun)->count();
        if ($total_kunjungan_pertahun_ini == 0){
            $kode = 'TAMU-0000001';
        }
        else{
            $total_kunjungan_pertahun_ini++;
             if(Str::length($total_kunjungan_pertahun_ini) == 1){
                $kode = 'TAMU-000000';
             }
             if(Str::length($total_kunjungan_pertahun_ini) == 2){
                $kode = 'TAMU-00000';
             }
             if(Str::length($total_kunjungan_pertahun_ini) == 3){
                $kode = 'TAMU-0000';
             }
             if(Str::length($total_kunjungan_pertahun_ini) == 4){
                $kode = 'TAMU-000';
             }
             if(Str::length($total_kunjungan_pertahun_ini) == 5){
                $kode = 'TAMU-00';
             }
             if(Str::length($total_kunjungan_pertahun_ini) == 6){
                $kode = 'TAMU-0';
             }
             if(Str::length($total_kunjungan_pertahun_ini) == 7){
                $kode = 'TAMU-';
             }
             $kode = $kode.$total_kunjungan_pertahun_ini;
        }        
        


        /**
         * take picture
         */
        {
            $img = $request->image;
            $folderPath = "foto-upload/";
            
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            
            $image_base64 = base64_decode($image_parts[1]);
            //$fileName = uniqid() . '.png';
            $fileName = $kode . '.png';
            
            $file = $folderPath . $fileName;
            Storage::put($file, $image_base64);
            
        }
        
        Kunjungan::create(array_merge($request->except('image','_token','simpan'),[
            'kode_kunjungan' => $kode,
            'foto'=>$file,
            'status'=>'Data Kunjungan Dibuat'
        ]));
        $orders = DB::table('kunjungans')                
                ->orderByDesc('id')
                ->limit(1)        
                ->get();
        
        $idx=$orders[0]->id;

      
        $count = DB::table('tamus')
            ->where('nik', '=', $request->nik)
            ->count();
        if ($count < 1) {
            $data = [
                'nik' => $request->nik,
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'pekerjaan' => $request->pekerjaan,
                'asal_instansi' => $request->asal_instansi,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'created_at' => now(),
                'updated_at' => now()
            ];

             // Menyimpan data ke database per field
                Tamu::insert([
                    'nik' => $data['nik'],
                    'nama' =>$data['nama'],
                    'jenis_kelamin' => $data['jenis_kelamin'],
                    'pekerjaan' => $data['pekerjaan'],
                    'asal_instansi' =>$data['asal_instansi'],
                    'alamat' => $data['alamat'],
                    'email' => $data['email'],
                    'created_at' => $data['created_at'],
                    'updated_at' => $data['updated_at']
                ]);
        }
        
        return redirect('cetak-tiket/'.$idx);


    }

    
    public function cetak($id){
        $tiket = DB::table('kunjungans')->where('id', $id)->first();
        return view('tickettamu', [
            'tiket_tamu'=>$tiket,
            'title'=>"Cetak Tiket | Polbangtan Gowa",
        ]);
    }
    
    public function cari_apa(){
        return ('cari apa?');
    }


    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->kode_kunjungan;
     //   dd($cari);
     
         // mengambil data dari table pegawai sesuai pencarian data
        $kunjungan = DB::table('kunjungans')
        ->where('kode_kunjungan','like',"%".$cari."%")
        ->paginate(10);
     
            // mengirim data pegawai ke view index
        return view('admin-access.kunjungan.index',[
            'kunjungan' => $kunjungan,
            "title"=>"Data Kunjungan | Polbangtan Gowa"
        ]);
     
    }
    public function update($id, Request $request){
        $status ='Done';
        $kunjungan = Kunjungan::find($id);
        $nama = $kunjungan->nama;
        $id = $kunjungan->id;
       // dd($id);
        $email = $kunjungan->email;        
        
        $kunjungan->update(array_merge($request->except('_token','update'),[
            'status'=>$status,
        ]));
        // return redirect('admin-access.send-email',[
        //     'nama'=>$nama,
        //     'email'=>$email,
        // ]);

        // return redirect('/admin-access/send-email'
        //  ,['nama'=>$nama,
        //      'email'=>$email,
        //      'link'=>$id,])
        //     ->with('success', 'Data berhasil disimpan');

        return redirect('/admin-access/send-email?nama=' . $nama . '&email=' . $email . '&link=' . $id)
            ->with('success', 'Data berhasil disimpan');

    }
    public function updatea(Request $request, $id){        
        $status = 'Done';
        $cek_valid = $request->validate([
            'status'=>$status,
        ]);
        $data = Kunjungan::findOrFail($id);
        
        $data->update($cek_valid);
        //dd($dastatusta);
        return redirect('admin-access/kunjungan');        
    }
    
}