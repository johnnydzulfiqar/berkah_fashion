<?php

namespace App\Http\Controllers;

use App\Models\ManajemenUser;
use App\Models\User;
use Illuminate\Http\Request;

class ManajemenUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at','desc')->get();
    
        return view('manajemen-user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambahPenggunaForm()
    {
        return view('manajemen-user.create');
    }

    public function simpanPengguna(Request $request)
    {
        try {
            // Validasi data yang diterima dari formulir
            $request->validate([
                'name' => 'required|string|regex:/^[a-zA-Z]+$/',
                'password' => 'required|string|min:6',
                'email' => 'required|email|unique:users',
                'role' => 'required|in:cutting,jahit,packing,pemilik',
            ],[
                'name.required' => 'nama  harus diisi',
                'name.string' => 'nama harus huruf',
                'password.min' => 'password minimal 6 karakter',
                'role.required' => 'silahkan pilih bagiannya',
            ]);
    
            // Simpan pengguna ke basis data menggunakan model User
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'role' => $request->input('role'),
            ]);
    
            return redirect()->route('lihat-pengguna.index')->with('success', 'Pengguna berhasil ditambahkan.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangkap kesalahan validasi dan kembalikan ke formulir dengan pesan kesalahan
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Tangkap kesalahan umum dan berikan respons sesuai kebutuhan
            return redirect()->back()->with('error', 'Gagal menambahkan pengguna. Silakan coba lagi.');
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('manajemen-user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = [
            'name' => $request->input('name'),
            'role' => $request->input('role'),
            'email' => $request->input('email'),
        ];
    
        // Tambahkan data password jika diisi
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->input('password'));
        }
        //dd($user);
        $user->update($data);
        return redirect()->route('lihat-pengguna.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
    
        return redirect()->route('lihat-pengguna.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
