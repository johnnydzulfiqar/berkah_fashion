<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index (){

        return view('user.login');
    }

    function login (Request $request){
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ], [
                'email.required' => 'Email harus diisi',
                'email.email' => 'Format email tidak valid',
                'password.required' => 'Password harus diisi',
                'password.min' => 'Password harus lebih atau minimal 6 karakter',
            ]);

            $infoLogin = [
                'email' =>$request->email,
                'password' =>$request->password,
            ];

            // Verifikasi/cek data apakah benar atau tidak
        if (Auth::attempt($infoLogin)) {
            // Redirect sesuai role
            if (Auth::user()->role == 'pemilik') {
                return redirect()->route('pemilik.home');
            } elseif (Auth::user()->role == 'cutting') {
                return redirect()->route('cutting.home');
            } elseif (Auth::user()->role == 'jahit') {
                return redirect()->route('jahit.home');
            } else {
                return redirect()->route('packing.home');
            }
        } else {
            // Jika salah, periksa alasan kegagalan
            $errors = new \Illuminate\Support\MessageBag(['email' => ['Email dan/atau password salah.']]);

            if ($errors->has('email')) {
                // Jika email salah, tambahkan notifikasi
                $errors->add('password', 'Password salah.');
            }

            return redirect()->route('login')->withErrors($errors)->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}