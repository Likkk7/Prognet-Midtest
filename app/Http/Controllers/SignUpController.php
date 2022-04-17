<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelaporan;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function index()
    {
        $judul = "Daftar Akun";
        $formdata = [
            'nama' => ['text', "Nama"],
            'alamat' => ['text', "Alamat"],
            'email' => ['text', "Email"],
            'password' => ['password', "Password"],
            'telepon' => ['text', "Telepon"],
        ];
        return view('signup', compact('judul', 'formdata'));
    }

    public function savesignup(Request $request)
    {
        $key = $request->validate([
            'nama' => 'required|min:2|max:255',
            'alamat' => 'required|min:10',
            'email' => 'required|min:5|unique:users|email:dns',
            'password' => 'required|min:5',
            'telepon' => 'required|numeric',
        ]);

        $value = array(
            $nama = 'nama' => $request->input('nama'),
            $alamat = 'alamat' => $request->input('alamat'),
            $email = 'email' => $request->input('email'),
            $password = 'password' => $request->input('password'),
            $telepon = 'telepon' => $request->input('telepon'),
        );

        $key['password'] = bcrypt($key['password']);
        $hashedpass = $key['password'];

        User::create([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'password' => $hashedpass,
            'telepon' => $request->input('telepon'),
        ]);

        return redirect()->route('pelaporan-login')->with('Berhasil', 'Berhasil Daftar! Ayo masuk terlebih dahulu');
    }
}
