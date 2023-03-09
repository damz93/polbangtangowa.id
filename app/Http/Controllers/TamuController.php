<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Tamu;
use App\Http\Requests\StoreTamuRequest;
use App\Http\Requests\UpdateTamuRequest;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){    
        //$tamu = Tamu::all();
        $tamu = Tamu::orderBy('id', 'desc')->paginate(10);
        return view('admin-access.tamu.data-tamu', compact([
            'tamu']),["title"=>"Data Tamu | Polbangtan Gowa"]);
    } 
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->nama;
     //   dd($cari);
     
         // mengambil data dari table pegawai sesuai pencarian data
        $tamu = DB::table('tamus')
        ->where('nama','like',"%".$cari."%")
        ->paginate(10);
     
            // mengirim data pegawai ke view index
        return view('admin-access.tamu.data-tamu',[
            'tamu' => $tamu,
            "title"=>"Data Tamu | Polbangtan Gowa"
        ]);
     
    }
    public function detail($id){
        $det_tamu = Tamu::find($id);        
        return view('admin-access.tamu.detail-tamu',[
            "title"=>"Detail Tamu | Buku Tamu Polbangtan-Gowa",
            "active"=>"login",
            'det_tamu'=>$det_tamu
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTamuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTamuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function show(Tamu $tamu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function edit(Tamu $tamu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTamuRequest  $request
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTamuRequest $request, Tamu $tamu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tamu $tamu)
    {
        //
    }
    public function hapus($id){
        $tamu = Tamu::find($id);
        $tamu->delete();
        return redirect('admin-access/tamu');
    }
}
