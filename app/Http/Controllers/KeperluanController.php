<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Keperluan;
use Illuminate\Http\Request;

class KeperluanController extends Controller
{
    public function index(){    
            $keperluan = Keperluan::orderBy('id', 'desc')->paginate(10);
        return view('admin-access.keperluan.data-keperluan', compact('keperluan'),[
            "title"=>"Keperluan | Buku Tamu Polbangtan-Gowa",
            "active"=>"login",
        ]);
    } 

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->keperluan;
     //   dd($cari);
     
         // mengambil data dari table pegawai sesuai pencarian data
        $keperluan = DB::table('keperluans')
        ->where('keperluan','like',"%".$cari."%")
        ->paginate(10);
     
            // mengirim data pegawai ke view index
        return view('admin-access.keperluan.data-keperluan',[
            'keperluan' => $keperluan,
            "title"=>"Data Keperluan | Polbangtan Gowa"
        ]);
     
    }
   
    public function create(){
        return view('admin-access.keperluan.tambah-keperluan',[
            "title"=>"Tambah Keperluan | Buku Tamu Polbangtan-Gowa",
            "active"=>"login",
        ]);
    }
  
    public function store(Request $request){
        $email = session('email');
        Keperluan::create(array_merge($request->except('_token','simpan'),[
            'input_by'=>$email
        ]));
        return redirect('admin-access/keperluan');        
    }
 
    public function edit($id){
        $keperluan = Keperluan::find($id);        
        return view('admin-access.keperluan.edit-keperluan',[
            "title"=>"Edit Keperluan | Buku Tamu Polbangtan-Gowa",
            "active"=>"login",
            'keperluan'=>$keperluan,
        ]);
    }
    
    public function update($id, Request $request){
        $keperluan = Keperluan::find($id);
        $keperluan->update($request->except('_token','update'));
        return redirect('admin-access/keperluan');
    }

    public function hapus($id){
        $keperluan = Keperluan::find($id);
        $keperluan->delete();
        return redirect('admin-access/keperluan');
    }
}
