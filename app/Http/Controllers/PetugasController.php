<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\User;

use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // public function diproses()
    // {
    //     $aduan  = Aduan::where('status', '=', 'diproses')->get();
    //     return view('petugas.index', compact('aduan'));
    // }

    // public function diterima()
    // {
    //     $aduan  = Aduan::where('status', '=', 'diterima')->get();
    //     return view('petugas.index', compact('aduan'));
    // }

    // public function ditolak()
    // {
    //     $aduan  = Aduan::where('status', '=', 'ditolak')->get();
    //     return view('petugas.index', compact('aduan'));
    // }

    // public function terima(Request $request, $id)
    // {
    //     $aduan = Aduan::where('id', $id)->first();
    //     $aduan->status = $request->status;
    //     $aduan->update();
    //     return redirect('/aduan');
    // }

    // public function tolak(Request $request, $id)
    // {
    //     $aduan = Aduan::where('id', $id)->first();
    //     $aduan->status = $request->status;
    //     $aduan->update();
    //     return redirect('/aduan')->with('status', 'Sukses mengubah status');
    // }

    public function index()
    {
        $petugas = User::where('type', '=', 'petugas')->get();
        return view('petugas.index', compact('petugas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.create');
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
            'nama'                  => 'required',
            'email'                 => 'required|unique:users,email',
            'password'              => 'required|confirmed',
            'telp'                  => 'required',

        ];

        $messages = [
            'nama.required'         => 'Nama wajib diisi',
            'email.required'        => 'Email wajib diisi',
            'email.unique'          => 'Email sudah digunakan',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama',
            'telp.required'         => 'Nomor telepon wajib diisi'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $users = new User;
        $users->nama = ($request->nama);
        $users->email= strtolower($request->email);
        $users->password = md5($request->password);
        $users->telp = ($request->telp);
        $users->type = 'petugas';
        $simpan = $users->save();

        if($simpan){
            Session::flash('success', 'Berhasil menambahkan petugas');
            return redirect('/petugas');
        } else {
            Session::flash('errors', ['' => 'Gagal menambahkan petugas! Mohon coba lagi']);
            return redirect('/petugas_create');
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
        $petugas = User::where('id', $id)->get();
        return view('petugas.edit', compact('petugas'));

    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'telp' => 'required',
            'email' => 'required'
        ]);

        $users = User::where('id', $id)->first();
        $users->nama = $request->nama;
        $users->email= $request->email;
        $users->telp = $request->telp;
        $simpan = $users->save();

        if($simpan){
            Session::flash('success', 'Berhasil mengubah data petugas');
            return redirect('/petugas');
        } else {
            Session::flash('errors', ['' => 'Gagal mengubah data petugas! Mohon coba lagi']);
            return redirect('/petugas_edit');
        }
    }

    public function destroy($id)
    {
        $petugas = User::where('id', $id)->first();

        if($petugas != null){
            $petugas->delete();

            return redirect('/petugas')->with('status', 'Berhasil menghapus data petugas!');
        }
        return redirect('/petugas')->with('status', 'ID tidak ditemukan!');

    }
}
