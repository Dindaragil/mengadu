@extends('layout/main')

@section('title', 'Daftar Pengaduan | Mengadu | Pelayanan Pengaduan Masyarakat')

@section('content')

                <section id="aduan" class="content-section">
                
                <div id="aduan-content">
                    <div class="section-heading">
                    <h1>Daftar<br><em>Pengaduan</em></h1>
                        <p>Lihat daftar pengaduan anda di sini. 
                        <br>Anda dapat melihat apakah pengaduan anda sudah diproses atau sudah selesai diajukan.</p>
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
                    <td>{{$adu->tanggal}}</td>
                    <td>{{$adu->subjek}}</td>
                    <td>
                        <!-- Example split danger button -->
<div class="btn-group">
  <button type="button" class="btn disabled">{{$adu->status}}</button>
  <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <span class="visually-hidden">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li>
    <form action="{{url('/aduan_proses', $adu->id)}}" method="post">
  @csrf 
  @method('put')
  <input type="hidden" name="status" value="diproses"><button class="status btn btn-light" type="submit">Proses</button>
  </form>
</li>
<li>
    <form action="{{url('/aduan_terima', $adu->id)}}" method="post">
  @csrf 
  @method('put')
  <input type="hidden" name="status" value="diterima"><button class="status btn btn-light" type="submit">Terima</button>
  </form>
</li>
<li>
    <form action="{{url('/aduan_tolak', $adu->id)}}" method="post">
  @csrf 
  @method('put')
  <input type="hidden" name="status" value="ditolak"><button class="status btn btn-light" type="submit">Tolak</button>
  </form>
</li>
    
  </ul>
</div>
                    </td>
                    <td>
                    <form action="{{ url('/aduan_destroy', $adu->id )}}" method="post">
                            @csrf
                            @method('delete')
                            <a href="{{url('/aduan_detail', $adu->id)}}">Detail</a>
                            <button type="submit" class="btn delete" onclick="return confirm('Are you Sure?')">Delete</button>
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