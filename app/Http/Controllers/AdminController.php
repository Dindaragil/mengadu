<?php

namespace App\Http\Controllers;
use App\Aduan;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function tertunggu() 
    {
        $aduan  = Aduan::where('status', '=', 'menunggu')->get();
        return view('petugas.index', compact('aduan'));
    }

    public function terproses() 
    {
        $aduan  = Aduan::where('status', '=', 'diproses')->get();
        return view('petugas.index', compact('aduan'));
    }

    public function terterima() 
    {
        $aduan  = Aduan::where('status', '=', 'diterima')->get();
        return view('petugas.index', compact('aduan'));
    }

    public function tertolak() 
    {
        $aduan  = Aduan::where('status', '=', 'ditolak')->get();
        return view('petugas.index', compact('aduan'));
    }

    public function proses(Request $request, $id)
    {
        $aduan = Aduan::where('id', $id)->first();
        $aduan->status = $request->status;
        $aduan->update();
        return redirect('/aduan');
    }

}
