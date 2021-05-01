<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\User;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        // if (Auth::check()) {
        //     return redirect()->route('home');
        // }
        return view('auth.login');
    }

    public function cek_login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        $messages = [
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'password.required' => 'Password is required'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $proses = User::where('email', $request->email)
                      ->where('password', md5($request->password));

        if($proses->count()>0){
            $data = $proses->first();
            Session::put('id', $data->id);
            Session::put('nama', $data->nama);
            Session::put('email', $data->email);
            Session::put('telp', $data->telp);
            Session::put('type', $data->type);
            Session::put('login_status', true);
            return redirect('home');
        } else {
            Session::flash('error', 'Email atau password salah');
            return redirect('login');
        }
        // $data = [
        //     'email' => $request->input('email'),
        //     'password' => Hash::make($request->password),
        // ];

        // Auth::attempt($data);
        // if (Auth::check()) {
        //     return redirect()->route('home');
        // } else {
        //     Session::flash('error', 'Invalid Email or Password');
        //     return redirect()->route('login');
        // }


    }

    public function showFormRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $rules = [
            'nik'                   => 'required|unique:users|min:16|max:16',
            'nama'                  => 'required',
            'email'                 => 'required|unique:users,email',
            'password'              => 'required|confirmed',
            'telp'                  => 'required',

        ];

        $messages = [
            'nik.required'          => 'NIK wajib diisi',
            'nik.unique'            => 'NIK sudah digunakan',
            'nik.min'               => 'NIK tidak valid',
            'nik.max'               => 'NIK tidak valid',
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
        $users->nik = ($request->nik);
        $users->nama = ($request->nama);
        $users->email= strtolower($request->email);
        $users->password = md5($request->password);
        $users->telp = ($request->telp);
        $users->type = 'user';
        $simpan = $users->save();

        if($simpan){
            Session::flash('success', 'Pendaftaran berhasil! Silakan masuk!');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Pendaftaran gagal! Mohon coba lain kali!']);
            return redirect()->route('register');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
