@extends('layout/main')

@section('title', 'Tulis Pengaduan | Mengadu | Pelayanan Pengaduan Masyarakat')

@section('content')

                <section id="aduan" class="content-section" style="padding-left: 25%">
                
                <div id="aduan-content">
                    <div class="section-heading">
                    <h1>Tulis<br><em>Pengaduan</em></h1>
                        <p>Tulis pengaduan anda disini. 
                        <br>Pastikan pengaduan anda singkat, padat, dan jelas agar mudah dipahami dan cepat diproses.</p>
                        
                    </div>
                    <div class="section-content">
                        <form id="aduan" action="{{url('/aduan_store')}}" method="post" enctype="multipart/form-data">
                        @csrf
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
                                <div class="col-md-6">
                                <label for="nik" class="h4">NIK</label>
                                  <fieldset>
                                    <input name="nik" type="text" class="form-control" id="nik" placeholder="Masukkan NIK" required="NIK wajib diisi">
                                  </fieldset>
                                </div>
                                 <div class="col-md-6">
                                 <label for="tanggal" class="h4">Tanggal</label>
                                  <fieldset>
                                    <input name="tanggal" type="date" class="form-control" id="tanggal" placeholder="Masukkan tanggal" required="">
                                  </fieldset>
                                </div>
                                
                                <div class="col-md-6">
                                <label for="subjek" class="h4">Subjek</label>
                                <fieldset>
                                    <input name="subjek" type="text" class="form-control" id="subject" placeholder="Masukkan Subjek" required="">
                                  </fieldset>
                                </div>
                                <div class="col-md-6">
                                <label for="foto" class="h4">Foto</label>
                                <fieldset>
                                    <input name="foto" type="file" class="form-control" id="foto" placeholder="Masukkan Foto" required>
                                  </fieldset>
                                </div>
                               
                                
                                <div class="col-md-12">
                                <label for="isi" class="h4">Isi Pengaduan</label>

                                  <fieldset>
                                    <textarea name="isi" rows="6" class="form-control" id="isi" placeholder="Tulis Isi Pengaduan" required=""></textarea>
                                  </fieldset>
                                </div>
                                
                                <div class="col-md-12">
                                  <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Kirim</button>
                                  </fieldset>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </section>
               
@endsection