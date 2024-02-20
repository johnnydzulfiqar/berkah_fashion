<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilControllerr extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profil.show', compact('user'));
    }
}
