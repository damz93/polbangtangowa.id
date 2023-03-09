<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TerimakasihController extends Controller
{
    //
    public function index(){
        return view('terimakasih',["title"=>"Terima Kasih | Polbangtan Gowa"]);
    }
}
