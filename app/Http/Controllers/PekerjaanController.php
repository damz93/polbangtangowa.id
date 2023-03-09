<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    // 
    public function index(){    
        $pekerjaan = Pekerjaan::orderBy('id', 'desc')->paginate(10);
        return view('admin-access.pekerjaan.data-pekerjaan', compact([
            'pekerjaan']),["title"=>"Data Pekerjaan | Polbangtan Gowa"]);
    } 
   
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->pekerjaan;
     //   dd($cari);
     
         // mengambil data dari table pegawai sesuai pencarian data
        $pekerjaan = DB::table('pekerjaans')
        ->where('nama_pekerjaan','like',"%".$cari."%")
        ->paginate(10);
     
            // mengirim data pegawai ke view index
        return view('admin-access.pekerjaan.data-pekerjaan',[
            'pekerjaan' => $pekerjaan,
            "title"=>"Data Pekerjaan | Polbangtan Gowa"
        ]);
     
    }

    public function create(){
        return view('admin-access.pekerjaan.tambah-pekerjaan',[
            "title"=>"Tambah Pekerjaan | Buku Tamu Polbangtan-Gowa",
            "active"=>"login",
        ]);
    }
  
    public function store(Request $request){
        $email = session('email');
        Pekerjaan::create(array_merge($request->except('_token','simpan'),[
            'input_by'=>$email
        ]));
        return redirect('admin-access/pekerjaan');
        //dd($request->all());
    }
 
    public function edit($id){
        $pekerjaan = Pekerjaan::find($id);        
        return view('admin-access.pekerjaan.edit-pekerjaan',[
            "title"=>"Edit Pekerjaan | Buku Tamu Polbangtan-Gowa",
            "active"=>"login",
            'pekerjaan'=>$pekerjaan,
        ]);
    }
    
    public function update($id, Request $request){
        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan->update($request->except('_token','update'));
        return redirect('admin-access/pekerjaan');
    }

    public function hapus($id){
        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan->delete();
        return redirect('admin-access/pekerjaan');
    }
}
