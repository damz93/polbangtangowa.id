<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CekNikController extends Controller
{
    //
    public function getProfile(Request $request){
        $nik = $request->input('nik');
        $profile = DB::table('tamus')->select('nama', 'email','pekerjaan', 'asal_instansi','jenis_kelamin','alamat')->where('nik', $nik)->first();
        return response()->json($profile);
    }
}