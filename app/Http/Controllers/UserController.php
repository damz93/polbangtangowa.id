<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index(){       
       $user = User::orderBy('id', 'desc')->paginate(10);
        return view('admin-access.user.data-user', compact('user'),[
            "title"=>"User | Buku Tamu Polbangtan-Gowa",
            "active"=>"login",
        ]);
/*


        $user = DB::table('users')->paginate(2);
 
		return view('admin-access.user.data-user',[
            'user' => $user,
            "title"=>"User | Buku Tamu Polbangtan-Gowa",
        ]);
 
*/
/*
        $user = User::all();
        return view('admin-access.user.data-user',compact([
            'user'
        ]),[
            "title"=>"User | Buku Tamu Polbangtan-Gowa",
            "active"=>"login",
        ]);*/
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->email;
     //   dd($cari);
     
         // mengambil data dari table pegawai sesuai pencarian data
        $user = DB::table('users')
        ->where('email','like',"%".$cari."%")
        ->paginate(10);
     
            // mengirim data pegawai ke view index
        return view('admin-access.user.data-user',[
            'user' => $user,
            "title"=>"Data User | Polbangtan Gowa"
        ]);
     
    }
    public function create(){
        return view('admin-access.user.tambah-user',[
            "title"=>"Tambah User | Buku Tamu Polbangtan-Gowa",
            "active"=>"login",
        ]);
    }
    public function store(Request $request){
        $email = session('email');
        $count = DB::table('users')
            ->where('email', '=', $request->email)
            ->count();
        if ($count > 0) {
            return redirect()->back()->withInput()->with('pesan', 'Email sudah ada..');
        }
        else {
                $pas = bcrypt($request->password);
                User::create(array_merge($request->except('password','_token','simpan'),[
                    'input_by'=>$email,
                    'level'=>'tes',
                    'password'=>$pas,
                ]));
            //    dd($request->all());
            return redirect('admin-access/user');
        }
    }
    public function edit($id){
        $user = User::find($id);        
        
        return view('admin-access.user.edit-user',[
            "title"=>"Edit User | Buku Tamu Polbangtan-Gowa",
            "active"=>"login",
            'user'=>$user,
        ]);
    }

    
    public function update($id, Request $request){
        $pas = bcrypt($request->password);
        $user = User::find($id);
        
        
        $user->update(array_merge($request->except('_token','update'),[
            'password'=>$pas,
        ]));
        return redirect('admin-access/user');
    }
    
    public function hapus($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin-access/user');
    }
}