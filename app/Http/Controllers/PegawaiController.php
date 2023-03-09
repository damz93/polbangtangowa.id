<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Pegawai;
use App\Http\Requests\StorePegawaiRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePegawaiRequest;

class PegawaiController extends Controller
{
    public function index(){
        $pegawai = Pegawai::orderBy('id', 'desc')->paginate(10);
        return view('admin-access.pegawai.data-pegawai',compact([
            'pegawai'
        ]),[
            "title"=>"Data Pegawai | Buku Tamu Polbangtan-Gowa",
            "active"=>"login",
        ]);
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->nik;
     //   dd($cari);
     
         // mengambil data dari table pegawai sesuai pencarian data
        $pegawai = DB::table('pegawais')
        ->where('nik','like',"%".$cari."%")
        ->paginate(10);
     
            // mengirim data pegawai ke view index
        return view('admin-access.pegawai.data-pegawai',[
            'pegawai' => $pegawai,
            "title"=>"Data Pegawai | Polbangtan Gowa"
        ]);
     
    }

    public function create(){
        return view('admin-access.pegawai.tambah-pegawai',[
            "title"=>"Tambah Pegawai | Buku Tamu Polbangtan-Gowa",
            "active"=>"login",
        ]);
    }
    public function store(Request $request){
        $email = session('email');
        Pegawai::create(array_merge($request->except('_token','simpan'),[
            'input_by'=>$email
        ]));
        return redirect('admin-access/pegawai');
        //dd($request->all());
    }
    public function edit($id){
        $id_pegawai = Pegawai::find($id);
        return view('admin-access.pegawai.edit-pegawai',[
            "title"=>"Edit Pegawai | Buku Tamu Polbangtan-Gowa",
            "active"=>"login",
            'det_pegawai'=>$id_pegawai
        ]);
    }
    public function detail($id){
        $det_pegawai = Pegawai::find($id);        
        return view('admin-access.pegawai.detail-pegawai',[
            "title"=>"Detail Pegawai | Buku Tamu Polbangtan-Gowa",
            "active"=>"login",
            'det_pegawai'=>$det_pegawai
        ]);
    }

    
    public function update($id, Request $request){
        $id_pegawai = Pegawai::find($id);
        $id_pegawai->update($request->except('nik','_token','update'));
        return redirect('admin-access/pegawai');
    }
    
    public function hapus($id){
        $id_pegawai = Pegawai::find($id);
        $id_pegawai->delete();
        return redirect('admin-access/pegawai');
    }
}

/*
public function cetak($id){
        $tiket = DB::table('kunjungans')->where('id', $id)->first();
        return view('tickettamu', [
            'tiket_tamu'=>$tiket,
            'title'=>"Cetak Tiket | Polbangtan Gowa",
        ]);
    }
 */