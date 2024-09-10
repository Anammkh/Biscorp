<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Storage;



class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatans = Jabatan::all();
        $pegawai = Pegawai::with('jabatan')->get(); // Eager load jabatan
        return view('admin.pegawai.index', compact('pegawai', 'jabatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:pegawai,email',
            'alamat' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'jabatan_id' => 'required|exists:jabatans,id',
        ]);

        $pegawai = new Pegawai();
        $pegawai->nama = $request->nama;
        $pegawai->email = $request->email;
        $pegawai->alamat = $request->alamat;
        $pegawai->jabatan_id = $request->jabatan_id;

        if ($request->hasFile('gambar')) {
            $imagePath = $request->file('gambar')->store('images', 'public');
            $pegawai->gambar = $imagePath;
        }

        $pegawai->save();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'alamat' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'jabatan_id' => 'required|exists:jabatans,id',
        ]);

        $pegawai = Pegawai::findOrFail($id);
        $pegawai->nama = $request->nama;
        $pegawai->email = $request->email;
        $pegawai->alamat = $request->alamat;
        $pegawai->jabatan_id = $request->jabatan_id;

        if ($request->hasFile('gambar')) {
            if ($pegawai->gambar) {
                Storage::delete('public/' . $pegawai->gambar);
            }
            $imagePath = $request->file('gambar')->store('images', 'public');
            $pegawai->gambar = $imagePath;
        }

        $pegawai->save();

        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil diubah.');
    }

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        if ($pegawai->gambar) {
            Storage::delete('public/' . $pegawai->gambar);
        }
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}
