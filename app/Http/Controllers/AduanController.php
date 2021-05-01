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

    public function index($limit = NULL, $offset = NULL)
    {
        $aduan = DB::table('aduan')
               ->select('users.id as id_user', 'users.nik', 'users.nama', 'aduan.id as id_aduan', 'aduan.tanggal', 'aduan.subjek', 'aduan.isi', 'aduan.foto', 'aduan.status')
               ->join('users', 'users.id', '=', 'aduan.id_user');

        if(User::where('type', '=', 'user')){
            $aduan = Aduan::where('id_user', Session::get('id'))->get();

            if($limit == NULL && $offset == NULL){
                $aduan = Aduan::where('id_user', Session::get('id'))
                ->orderBy('tanggal', 'desc')->with('tanggapan', 'user')->get();
            } else {
                $aduan = Aduan::where('id_user', Session::get('id'))
                ->orderBy('tanggal', 'desc')->with('tanggapan', 'user')->take($limit)->skip($offset)->get();
            }
        } else {
            $data = Aduan::count();

            if($limit == NULL && $offset == NULL){
                $aduan = Aduan::select('tanggapan.isi')->orderBy('tanggal', 'desc')
                ->with('tanggapan', 'user')->take($limit)->skip($offset)->get();
            }
        }

        return view('aduan.aduan', compact('aduan'));

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
        $aduan = User::where('id_user', Session::get('id'));
        return view('aduan.create', compact('aduan'));
    }

    public function show($id)
    {
        $aduan = Aduan::where('id', $id)->with(['tanggapan'])->get();
        return view('aduan.aduan', compact('aduan'));
    }

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
        $aduan->id_user = Session::get('id');
        $aduan->tanggal = $request->tanggal;
        $aduan->subjek = $request->subjek;
        $aduan->foto = $gambar;
        $aduan->isi = $request->isi;
        $simpan = $aduan->save();

        if($simpan){
            Session::flash('success', 'Pengaduan berhasil dibuat!');
            return redirect('/aduan');
        } else {
            Session::flash('errors', ['' => 'Gagal mengirim pengaduan. Mohon coba lagi!']);
            return redirect('/aduan');
        }

    }

    public function edit($id)
    {
        //
    }

    public function updateStatus(Request $request, $id)
    {
        $aduan = Aduan::where('id', $id)->first();
        $aduan->status = $request->status;
        $simpan = $aduan->save();

        if($simpan){
            Session::flash('success', 'Status berhasil diubah');
            return redirect('/aduan');
        } else {
            Session::flash('errors', ['' => 'Pengubahan status gagal. Mohon coba lagi!']);
            return redirect('/aduan');
        }

    }

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
