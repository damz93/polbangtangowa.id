<?php

namespace App\Http\Controllers;

use App\Models\Kepuasan;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function index(){
        $kepuasan = Kepuasan::paginate(10);
        return view('admin-access.kunjungan.index', compact([
            'kepuasan']),["title"=>"Data Kunjungan | Polbangtan Gowa"]);
    }
   
}

