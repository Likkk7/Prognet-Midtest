<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Keluhan;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $judul = "Beranda Admin";

        return view('admin.home', compact('judul'));
    }

    public function login()
    {
        $judul = "Masuk Admin";

        return view('admin.login', compact('judul'));
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admins')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/home');
        }
        return back()->with('fail', 'Gagal Masuk!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin-login');
    }

    public function laporan()
    {
        $judul = "List Laporan";
        $keluhans = Keluhan::all();
        return view('admin.listkeluhan', compact('keluhans', 'judul'));
    }

    public function detaillaporan($id)
    {
        $judul = "Admin Detail Laporan";
        $keluhan = Keluhan::find($id);
        return view("admin.detailkeluhan", compact('keluhan', 'judul'));
    }

    public function editlaporan(Request $request, $id)
    {
        $judul = "Edit Laporan";
        $keluhan = Keluhan::find($id);
        $formdata = [
            'balasan_admin' => $request->input('balasan_admin'),
        ];
        return view("admin.editkeluhan", compact('keluhan', 'formdata', 'judul'));
    }

    public function saveeditlaporan(Request $request, $id)
    {
        $key = $request->validate([
            'balasan_admin' => 'required|max:50',
        ]);

        $value = array(
            $balasan_admin = 'judul_keluhan' => $request->input('balasan_admin'),
        );

        $keluhan = Keluhan::find($id);
        $keluhan->balasan_admin = $request->balasan_admin;
        $keluhan->save();

        return redirect()->route('laporan-list');
    }
}
