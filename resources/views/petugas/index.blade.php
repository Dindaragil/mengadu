@extends('layout/main')

@section('title', 'Daftar Petugas | Mengadu | Pelayanan Pengaduan Masyarakat')

@section('content')

<section id="aduan" class="content-section">

    <div id="aduan-content">
        <div class="section-heading">
            <h1>Daftar<br><em>Petugas</em></h1>
            <p>Lihat daftar petugas di sini.
                <br>Anda dapat mengolah data dari petugas apabila dibutuhkan.
            </p>
        </div>
        <div class="section-content">
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif
            <div class="mb-2">
                <a href="/petugas_create" class="btn btn-outline-danger mb-3" style="float: left">Tambah</a>
            </div>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <td>#</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Telepon</td>
                    <td>Opsi</td>
                </thead>
                <tbody>
                <tbody>
                    @foreach( $petugas as $pet )
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$pet->nama}}</td>
                        <td>{{$pet->email}}</td>
                        <td>{{$pet->telp}}</td>
                        <td>
                            <form action="{{ url('/petugas_destroy', $pet->id )}}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{url('/petugas_edit', $pet->id)}}">Ubah</a>
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
