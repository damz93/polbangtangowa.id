<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Foundation\Auth\User as Authenticatablea;
use Session;
use App\Models\User;
class LoginController extends Controller

{    
    //    
    public function index(){
        return view('admin-access.login',[
            "title"=>"Login | Buku Tamu Polbangtan-Gowa",            
        ]);
    }


    public function authenticate(Request $request){           
       $cre = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($cre)){ 
            session(['Berhasil_Login'=> true]);
            session(['email'=> $request->email]);
            $request->session()->regenerate();                    
            return redirect()->intended('admin-access/dashboard');            
        }
        return back()->with('LoginError','login failed!');        
    } 
    

    public function logout(Request $request)
    {
        Auth::logout(); 
        request()->session()->invalidate(); 
        request()->session()->regenerateToken(); 
        return redirect('admin-access/login');
    }
}
