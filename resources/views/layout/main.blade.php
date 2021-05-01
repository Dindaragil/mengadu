<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title')</title>

    <!--

Sentra Template

https://templatemo.com/tm-518-sentra

-->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="{{url('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" href="{{url('/css/fontAwesome.css')}}">
    <link rel="stylesheet" href="{{url('/css/light-box.css')}}">
    <link rel="stylesheet" href="{{url('/css/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{url('/css/templatemo-style.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3685b669fe.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <script src="{{url('/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
</head>

<body>
    <header class="nav-down responsive-nav hidden-lg hidden-md">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!--/.navbar-header-->
        <div id="main-nav" class="collapse navbar-collapse">
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="{{url('home')}}">Home</a></li>
                    <li><a href="{{url('/aduan_create')}}">Tulis Pengaduan</a></li>
                    <li><a href="{{url('/aduan')}}">Daftar Pengaduan</a></li>
                    <li><a href="{{url('/petugas')}}">Daftar Petugas</a></li>
                    <li><a href="#featured">Featured</a></li>
                    <li><a href="#projects">Recent Projects</a></li>
                    <li><a href="#video">Presentation</a></li>
                    <li><a href="#blog">Blog Entries</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="sidebar-navigation hidde-sm hidden-xs">
        <div class="logo">
            <a href="{{url('home')}}">MENGADU</a>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="{{url('home')}}" class="menu">
                        <span class="circle"></span>
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{url('/aduan_create')}}" class="menu">
                        <span class="circle"></span>
                        Tulis Pengaduan
                    </a>
                </li>
                <li>
                    <a href="{{url('/aduan')}}" class="menu">
                        <span class="circle"></span>
                        Daftar Pengaduan
                    </a>
                </li>
                <li>
                    <a href="{{url('/petugas')}}" class="menu">
                        <span class="circle"></span>
                        Daftar Petugas
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="menu" onclick="return confirm('Are you Sure?')">
                        <span class="circle"></span>
                        Keluar
                    </a>
                </li>
                <li>

            </ul>
        </nav>
        <!-- <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul> -->
    </div>

    @yield('content')

    <section class="footer fixed-bottom">
        <p>Copyright &copy; 2019 Mari Mengadu

            . Design: TemplateMo</p>
    </section>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="{{url('/js/vendor/bootstrap.min.js')}}"></script>

    <script src="{{url('/js/plugins.js')}}"></script>
    <script src="{{url('/js/main.js')}}"></script>



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>
