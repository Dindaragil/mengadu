@extends('layout/main')

@section('title', 'Daftar Pengaduan | Mengadu | Pelayanan Pengaduan Masyarakat')

@section('content')

                <section id="aduan" class="content-section" >

                <div id="aduan-content">
                    <div class="section-heading">
                    <h1>Daftar<br><em>Pengaduan</em></h1>
                        <p>Lihat daftar pengaduan anda di sini.
                        <br>Anda dapat melihat apakah pengaduan anda sudah diproses atau sudah selesai diajukan.</p>
                    </div>
                    <div class="section-content">
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
            <table class="table table-bordered table-hover">
  <thead class="table-dark">
  <td>#</td>
  <td>NIK</td>
  <td>Nama</td>
  <td>Tanggal</td>
  <td>Subjek</td>
  <td>Status</td>
  <td>Opsi</td>
  </thead>
  <tbody>
  <tbody>
                @foreach( $aduan as $adu )
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$adu->nik}}</td>
                    <td>{{$adu->nama}}</td>
                    <td>{{$adu->tanggal}}</td>
                    <td>{{$adu->subjek}}</td>
                    <td>{{$adu->status}}</td>
                    <td><a href="{{url('/aduan_detail', $adu->id)}}">Detail</a></td>

                </tr>
                @endforeach
            </tbody>
  </tbody>
</table>
                    </div>
                </div>
            </section>

@endsection
