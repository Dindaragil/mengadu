<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Aduan;


class AduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aduan  = Aduan::all();
        return view('petugas.index', compact('aduan'));
        
    }

    public function detail($id)
    {
        $aduan = Aduan::where('id', $id)->get();
        return view('aduan.detail', compact('aduan'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->foto) {
            $gambar = $request->foto->getClientOriginalName() . '-' . time()
            . '.' . $request->foto->extension();
           $request->foto->move(public_path('image'), $gambar);
        } else {
            $gambar = null;
        }

        $aduan = new Aduan();
        $aduan->nik = $request->nik;
        $aduan->tanggal = $request->tanggal;
        $aduan->subjek = $request->subjek;
        $aduan->foto = $gambar;
        $aduan->isi = $request->isi;
        $simpan = $aduan->save();

        if($simpan){
            Session::flash('success', 'Pengaduan berhasil dikirim!');
            return redirect('/aduan');
        } else {
            Session::flash('errors', ['' => 'Gagal mengirim pengaduan. Mohon coba lagi!']);
            return redirect('/aduan');
        }

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
        $aduan = Aduan::where('id', $id)->first();

        if($aduan != null){
            $aduan->delete();

            return redirect('/aduan')->with('status', 'Berhasil menghapus aduan!');
        }
        return redirect('/kategori')->with('status', 'ID tidak ditemukan!');
    }
}
