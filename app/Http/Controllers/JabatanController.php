<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::all();
        return view('admin.jabatan.index', compact('jabatans'));
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required|string|max:255']);
        Jabatan::create(['nama' => $request->nama]);

        return redirect()->route('jabatan.index')->with('success', 'Jabatan created successfully.');
    }

    public function update(Request $request, $id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $request->validate(['nama' => 'required|string|max:255']);
        $jabatan->update(['nama' => $request->nama]);

        return redirect()->route('jabatan.index')->with('success', 'Jabatan updated successfully.');
    }

    public function destroy($id)
    {
        Jabatan::findOrFail($id)->delete();
        return redirect()->route('jabatan.index')->with('success', 'Jabatan deleted successfully.');
    }
}
