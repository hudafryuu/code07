<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use App\Models\User;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginproses(Request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/');
        }

        return redirect('login');
    }

    public function register(){
        return view('register');
    }

    public function registeruser(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function gantiPassword(){
        return view('gantipassword');
    }

    public function gantiPwproses(Request $request){
        // cek password lama
        if(!Hash::check($request->passwordlama, auth()->user()->password)){
            return back()->with('error', 'Password Lama Salah');
        }
    
        if($request->passwordbaru != $request->repeatpassword) {
            return back()->with('error', 'Password baru tidak cocok');
        }
        // Update password baru
        auth()->user()->update([
            'password' => Hash::make($request->passwordbaru)
        ]);
    
        Auth::logout();
        return redirect('/login')->with('success', 'Password berhasil diubah. Silakan login kembali.');
    }    
    
}
