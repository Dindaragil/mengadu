<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | Mengadu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{url('/css/templatemo-style.css')}}">
</head>

<body>
    <div class="container login">
        <div class="row">

            <div class="col-md-3"></div>
            <div class="col-md-6">

                <div class="card text-center border-light">
                    <div class="card-header">
                        <h4>Masuk</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('login_cek') }}" method="post">
                            @csrf
                            @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                            @endif
                            @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                            @endif

                            <div class="mb-3">
                                <label for="inputEmail1" class="form-label">
                                    <p>Email</p>
                                </label>
                                <input type="email" autocomplete="current-email" class="form-control" id="inputEmail1" name="email" placeholder="Masukkan email" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword1" class="form-label">
                                    <p>Password</p>
                                </label>
                                <input type="password" autocomplete="current-password" class="form-control" id="inputPassword1" name="password" placeholder="Masukkan password" required>
                            </div>
                            <button type="submit" class="btn">Masuk</button>
                        </form>

                        <div class="mt-3">
                            <p>Belum memiliki akun?</p>
                            <a href="{{ route('register') }}" class="ml-2">Daftar</a>

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
