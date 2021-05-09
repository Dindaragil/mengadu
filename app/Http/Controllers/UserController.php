<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where('type', '=', 'user')->get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $users = User::where('id', $id)->get();
        return view('user.edit', compact('users'));
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
        $users->email = $request->email;
        $users->telp = $request->telp;
        $simpan = $users->save();

        if($simpan){
            Session::flash('success', 'Berhasil mengubah data user');
            return redirect('/user');
        } else {
            Session::flash('error', ['' => ' Gagal mengubah data user! Mohon coba langi nanti']);
            return redirect('/user_edit');
        }
    }

    public function destroy($id)
    {
        $users = User::where('id', $id)->first();

        if($users != null) {
            $users->delete();
            return redirect('/user')->with('status', 'Berhasil menghapus data user!');
        }
        return redirect('/user')->with('status', 'ID tidak ditemukan!');
    }
}
