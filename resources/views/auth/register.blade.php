<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daftar | Mengadu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/css/templatemo-style.css')}}">
</head>

<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-4" style="margin-bottom: 30px">
                <div class="card  border-light text-center">
                    <div class="card-header">
                        <h4>Daftar</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            @if(session('errors'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Ada yang salah:
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

                            <div class="mb-3">
                                <label for="nik" class="form-label">
                                    <p>NIK</p>
                                </label>
                                <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">
                                    <p>Nama</p>
                                </label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label">
                                    <p>Email</p>
                                </label>
                                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="email" placeholder="Masukkan email" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label">
                                    <p>Password</p>
                                </label>
                                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Buat password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">
                                    <p>Konfirmasi Password</p>
                                </label>
                                <input type="password" name="password_confirmation" class="form-control" id="confirmPassword" placeholder="Tulis ulang password" required>
                            </div>
                            <div class="mb-3">
                                <label for="telp" class="form-label">
                                    <p>Nomor Telepon</p>
                                </label>
                                <input type="text" class="form-control" id="telp" name="telp" placeholder="Contoh : 08xxxxxxxxxx" required>
                            </div>



                            <button type="submit" class="btn">Daftar</button>
                        </form>
                        <div class="mt-2">
                            <p>Sudah punya akun?</p>
                            <a href="{{ route('login') }}" class="ml-2">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
