@extends('layout/main')

@section('title', 'Daftar User | Mengadu | Pelayanan Pengaduan Masyarakat')

@section('content')

<section id="aduan" class="content-section">

    <div id="aduan-content">
        <div class="section-heading">
            <h1>Daftar<br><em>User</em></h1>
            <p>Lihat daftar user di sini.
                <br>Anda dapat mengubah data dari user apabila dibutuhkan.
            </p>
        </div>
        <div class="section-content">
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
        
            <table class="table table-bordered">
                <thead class="table-dark">
                    <td>#</td>
                    <td>NIK</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Telepon</td>
                    <td>Opsi</td>
                </thead>
                <tbody>
                <tbody>
                    @foreach( $users as $us )
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$us->nik}}</td>
                        <td>{{$us->nama}}</td>
                        <td>{{$us->email}}</td>
                        <td>{{$us->telp}}</td>
                        <td>
                            <form action="{{ url('/user_destroy', $us->id )}}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{url('/user_edit', $us->id)}}">Ubah</a>
                                <button type="submit" class="btn delete" onclick="return confirm('Are you Sure?')">Hapus</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
