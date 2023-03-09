<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Mail\EmailTamu;
use App\Models\Kunjungan;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function send()
    {
       /* $transport = new \Swift_SmtpTransport('smtp.gmail.com', 587, 'tls');
        $transport->setStreamOptions([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ]);        */

        
        $nama=request()->input('nama');
        $email=request()->input('email');
        $lin=request()->input('link');
        $link = "http://127.0.0.1:8000/review/".$lin;
        // $email = "dedy.alimmuzawwir@gmail.com";
        $nama_penerima = "Nama Penerima";
        $objDemo = new \stdClass();

        $objDemo->demo_one = 'Demo One Value';
        $objDemo->demo_two = 'Demo Two Value';
        $objDemo->link = $link;
        $objDemo->sender = 'Polbangtan Gowa';
        $objDemo->penerima =  $nama;
        $objDemo->receiver = $email;
        Mail::to($email)->send(new EmailTamu($objDemo, "Terima Kasih - Tamuku-polbangtangowa.id"));
        
        $otherController = new DashboardController();

        // memanggil function di OtherController
        $otherController->index();

        return redirect('/admin-access/dashboard');
        //return route(get('/admin-access/dashboard', [DashboardController::class,'index']));

    }
}
