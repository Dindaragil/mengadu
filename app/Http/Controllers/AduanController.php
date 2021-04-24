<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Aduan;
use App\User;


class AduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aduan  = DB::table('aduan')
                ->select('users.nik', 'aduan.id', 'aduan.tanggal', 'aduan.subjek', 'aduan.isi', 'aduan.foto', 'aduan.status')
                ->join('users', 'users.nik', '=', 'aduan.nik')
                ->get();
        return view('petugas.index', compact('aduan'));
        
    }

    public function aduanSaya() {
        $aduan = aduan::where('nik', '=', Auth::user()->nik)->get();
        return view('aduan.index', compact('merchant'));
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
    public function create($nik)
    {
        $aduan = User::where(Auth::user()->nik)->get();
        return view('aduan.create', compact('aduan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'tanggal' => 'required',
            'subjek' => 'required',
            'isi' => 'required',
            'foto' => 'required|mimetypes:image/jpeg,image/png,image/jpg'
        ];
        $messages = [
            'tanggal.required' => 'Tanggal wajib diisi',
            'subjek.required' => 'Subjek wajib diisi',
            'isi.required' => 'Isi laporan wajib diisi',
            'foto.required' => 'Foto wajib dilampirkan',
            'foto.mimes' => 'Maaf, format foto tidak didukung'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        
        $gambar = $request->foto->getClientOriginalName() . '-' . time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('image'), $gambar);
        

        $aduan = new Aduan();
        $aduan->nik = $request->nik;
        $aduan->tanggal = $request->tanggal;
        $aduan->subjek = $request->subjek;
        $aduan->foto = $gambar;
        $aduan->isi = $request->isi;
        $simpan = $aduan->save();

        if($simpan){
            Session::flash('success', 'Pengaduan berhasil dibuat!');
            return redirect('/aduan_saya');
        } else {
            Session::flash('errors', ['' => 'Gagal mengirim pengaduan. Mohon coba lagi!']);
            return redirect('/aduan_saya');
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
