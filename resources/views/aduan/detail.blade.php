@extends('layout/main')

@section('title', 'Detail Pengaduan | Mengadu | Pelayanan Pengaduan Masyarakat')

@section('content')

                <section id="aduan" class="content-section" style="padding-left: 25%; margin-bottom: 150px;">
                
                <div id="aduan-content">
                    <div class="section-heading">
                    <h1>Detail<br><em>Pengaduan</em></h1>
                        <p>Lihat detail pengaduan anda di sini. 
                        <br>Anda dapat melihat kembali detail penduan yang anda ajukan.</p>
                        
                    </div>
                    
                    <div class="section-content">
                    @foreach($aduan as $adu)
                        
                        <div class="card mb-3" style="max-width: 100%">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="/image/{{$adu->foto}}" alt="foto" width="75%" >
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <p class="card-text"><small class="text-muted">{{$adu->tanggal}}</small></p>
        <h5 class="card-title h3">{{$adu->subjek}}</h5>
        <p class="card-text">{{$adu->isi}}</p>
        <a href="{{url('/aduan')}}">Kembali</a>
      </div>
    </div>
  </div>
</div>
                        @endforeach
                    </div>
                    
                </div>
            </section>
               
@endsection