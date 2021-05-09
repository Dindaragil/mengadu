@extends('layout/main')

@section('title', 'Daftar Admin | Mengadu | Pelayanan Pengaduan Masyarakat')

@section('content')

<section id="aduan" class="content-section">

    <div id="aduan-content">
        <div class="section-heading">
            <h1>Daftar<br><em>Admin</em></h1>
            <p>Lihat daftar petugas di sini.
                <br>Anda dapat mengolah data admin apabila dibutuhkan.
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
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Telepon</td>
                    <td>Opsi</td>
                </thead>
                <tbody>
                <tbody>
                    @foreach( $admin as $ad )
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$ad->nama}}</td>
                        <td>{{$ad->email}}</td>
                        <td>{{$ad->telp}}</td>
                        <td>
                            <form action="{{ url('/admin_destroy', $ad->id )}}" method="post">
                                @csrf
                                @method('delete')
                                <a href="{{url('/admin_edit', $ad->id)}}">Ubah</a>
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
