<?php

namespace App\Http\Controllers;

use App\Models\DataBahanBaku;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index (){

        $bahanBaku = DataBahanBaku::where('stok','<',2);
        $pegawais = User::all();
        return view('admin.home',compact('pegawais','bahanBaku'));
    }

    public function pemilik (){
        $bahanBaku = DataBahanBaku::where('stok','<',2);
        $pegawais = User::all();
        return view('admin.home',compact('pegawais','bahanBaku'));
    }

    public function cutting (){
        $bahanBaku = DataBahanBaku::where('stok','<',2);
        $pegawais = User::all();
        return view('admin.home',compact('pegawais','bahanBaku'));
    }

    public function jahit (){
        $bahanBaku = DataBahanBaku::where('stok','<',2);
        $pegawais = User::all();
        return view('admin.home',compact('pegawais','bahanBaku'));
    }

    public function packing (){
        $bahanBaku = DataBahanBaku::where('stok','<',2);
        $pegawais = User::all();
        return view('admin.home',compact('pegawais','bahanBaku'));
    }
}
