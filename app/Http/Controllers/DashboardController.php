<?php

namespace App\Http\Controllers;
use App\Models\Jabatan;
use App\Models\Artikel;
use App\Models\Pegawai;




use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $jabatansCount = Jabatan::count();
        $pegawaiCount = Pegawai::count();
        $artikelsCount = Artikel::count();
    
        return view('admin.dashboard.index', compact('jabatansCount', 'pegawaiCount', 'artikelsCount'));
    }
    
}
