<?php

namespace App\Http\Controllers;
use App\Aduan;

use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function diproses() 
    {
        $aduan  = Aduan::where('status', '=', 'diproses')->get();
        return view('petugas.index', compact('aduan'));
    }
    
    public function diterima() 
    {
        $aduan  = Aduan::where('status', '=', 'diterima')->get();
        return view('petugas.index', compact('aduan'));
    }
    
    public function ditolak() 
    {
        $aduan  = Aduan::where('status', '=', 'ditolak')->get();
        return view('petugas.index', compact('aduan'));
    }
    
    public function terima(Request $request, $id)
    {
        $aduan = Aduan::where('id', $id)->first();
        $aduan->status = $request->status;
        $aduan->update();
        return redirect('/aduan');
    }
    
    public function tolak(Request $request, $id)
    {
        $aduan = Aduan::where('id', $id)->first();
        $aduan->status = $request->status;
        $aduan->update();
        return redirect('/aduan')->with('status', 'Sukses mengubah status');
    }
    
    public function index()
    {
        return view('petugas.tanggapan');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
