<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::where('type', '=', 'admin')->get();
        return view('admin.index', compact('admin'));
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
        $admin = User::where('id', $id)->get();
        return view('admin.edit', compact('admin'));
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
        $this->validate($request, [
            'nama' => 'required',
            'telp' => 'required',
            'email' => 'required',
        ]);

        $admin = User::where('id', $id)->first();
        $admin->nama = $request->nama;
        $admin->email = $request->email;
        $admin->telp = $request->telp;
        $simpan = $admin->save();

        if($simpan){
            Session::flash('success', 'Berhasil mengubah data admin');
            return redirect('/admin');
        } else {
            Session::flash('error', ['' => ' Gagal mengubah data admin! Mohon coba langi nanti']);
            return redirect('/admin_edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::where('id', $id)->first();

        if($admin != null) {
            $admin->delete();
            return redirect('/admin')->with('status', 'Berhasil menghapus data user!');
        }
        return redirect('/admin')->with('status', 'ID tidak ditemukan!');
    }
}

