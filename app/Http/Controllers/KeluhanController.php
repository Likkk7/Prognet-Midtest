<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KeluhanController extends Controller
{
    public function index()
    {
        $judul = "Laporan";
        $keluhans = Keluhan::all();
        return view('listkeluhan', compact('keluhans', 'judul'));
    }

    public function keluhanbaru()
    {
        $judul = "Tambah Laporan";
        $formdata = [
            'judul_keluhan' => ['text', "Keluhan"],
            'keluhan_user' => ['textarea', "Deskripsi Keluhan"],
        ];
        return view('keluhanbaru', compact('formdata', 'judul'));
    }

    public function savekeluhanbaru(Request $request)
    {
        $key = $request->validate([
            'judul_keluhan' => 'required|max:50',
            'keluhan_user' => 'required|min:30|max:255',
        ]);

        $value = array(
            $judul_keluhan = 'judul_keluhan' => $request->input('judul_keluhan'),
            $keluhan_user = 'keluhan_user' => $request->input('keluhan_user'),
        );

        $time = Carbon::now()->format('Y-m-d h:m:s');
        $keluhan = Keluhan::create([
            'judul_keluhan' => $request->input('judul_keluhan'),
            'keluhan_user' => $request->input('keluhan_user'),
            'user_id' => auth()->user()->id,
            'waktu_keluhan' => $time,
        ]);
        return redirect()->route('keluhan-list');
    }

    public function keluhandetail($id)
    {
        $judul = "Detail Keluhan";
        $keluhan = Keluhan::find($id);
        return view("detailkeluhan", compact('keluhan', 'judul'));
    }

    public function keluhanedit(Request $request, $id)
    {
        $judul = "Edit Keluhan";
        $keluhan = Keluhan::find($id);
        $formdata = [
            'judul_keluhan' => $request->input('judul_keluhan'),
            'keluhan_user' => $request->input('keluhan_user'),
        ];
        return view("editkeluhan", compact('keluhan', 'formdata', 'judul'));
    }

    public function saveedit(Request $request, $id)
    {
        $key = $request->validate([
            'judul_keluhan' => 'required|max:50',
            'keluhan_user' => 'required|min:30|max:255',
        ]);

        $value = array(
            $judul_keluhan = 'judul_keluhan' => $request->input('judul_keluhan'),
            $keluhan_user = 'keluhan_user' => $request->input('keluhan_user'),
        );

        $time = Carbon::now()->format('Y-m-d h:m:s');
        $keluhan = Keluhan::find($id);
        $keluhan->judul_keluhan = $request->judul_keluhan;
        $keluhan->keluhan_user = $request->keluhan_user;
        $keluhan->waktu_keluhan = $time;
        $keluhan->save();

        return redirect()->route('keluhan-list');
    }

    public function deletekeluhan($id)
    {
        $judul = "Hapus Laporan";
        $keluhan = Keluhan::find($id);
        $keluhan->is_delete = 1;
        $keluhan->save();
        return redirect()->route('keluhan-list', 'judul');
    }
}
