@extends('layout/main')

@section('title', 'Update Petugas | Mengadu | Pelayanan Pengaduan Masyarakat')

@section('content')

<section id="aduan" class="content-section">
    <div id="aduan-content">
        <div class="section-heading">
            <h1>Update<br><em>Petugas</em></h1>
            <p>Pastikan data petugas yang ditambahkan sudah benar dan sesuai.</p>
        </div>
        <div class="section-content">
        @foreach ($petugas as $pet)
            <form id="aduan" action="{{url('/petugas_update', $pet->id)}}" method="post">
                @csrf
                @method('put')
                @if(session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Something it's wrong:
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="row">

                    <div class="col-md-12">
                        <label for="nama" class="h4">Nama</label>
                        <fieldset>
                                <input name="nama" type="text" class="form-control" id="nama" placeholder="Masukkan nama" value="{{$pet->nama}}" required>
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <label for="telp" class="h4">Nomor Telepon</label>
                        <fieldset>
                            <input name="telp" type="text" class="form-control" id="telp" placeholder="Contoh : 08xxxxxxxxxx" value="{{$pet->telp}}" required>
                        </fieldset>
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="h4">Email</label>
                        <fieldset>
                            <input name="email" type="text" class="form-control" id="subject" placeholder="Masukkan email" value="{{$pet->email}}" required>
                        </fieldset>
                    </div>

                    <div class="col-md-12">
                        <fieldset>
                            <button type="submit" id="form-submit" class="btn">Kirim</button>
                        </fieldset>
                    </div>

                </div>
            </form>
            @endforeach
        </div>
    </div>
</section>

@endsection
