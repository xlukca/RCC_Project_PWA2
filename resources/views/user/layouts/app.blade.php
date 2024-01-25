<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registration of Coffee Consumption </title>
        <link rel="icon" type="image/x-icon" href="{{ asset('user/assets/coffee.webp') }}" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('user/css/styles.css') }}" rel="stylesheet" />
    </head>
    <body>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-upper text-primary mb-3">I need coffee in an IV.</span>
                <span class="site-heading-lower">Registration of Coffee Consumption </span>
            </h1>
        </header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/">Home</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('coffee') }}">Coffee</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('searchCoffee') }}">Coffee Consumption</a></li>
                        <li class="nav-item px-lg-4">
                            @guest
                                @if (Route::has('login'))
                                        <a class="nav-link text-uppercase" href="{{ route('login') }}">{{ __('Login') }}</a>
                                @endif
                            @else
                                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="/admin/home">Admin</a></li>
                                <li class="nav-item px-lg-4">
                                        <a class="nav-link text-uppercase" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                </li>
                            @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
       
        <div class="container-fluid">
            @include('admin.layouts.errors')
            @yield('content')
        </div>

        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('user/js/scripts.js') }}"></script>
    </body>
</html>
