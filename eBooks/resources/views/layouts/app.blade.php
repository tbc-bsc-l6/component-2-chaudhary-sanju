<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Books. The only place for online books.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">


</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('logo.png') }}" alt="E-Books" style="height: 40px;"> <span
                    class="pt-2">E-Books</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mx-auto" id="navbarNav">
                <div class="mx-auto"></div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}"> <span class="fw-bolder"><i
                                    class="fa fa-home"></i></span> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index') }}"><span class="fw-bolder"><i
                                    class="fa fa-book"></i></span> Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news') }}"><i class="bi bi-newspaper"></i> News</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart.view') }}"><i class="bi bi-cart-check-fill"></i>
                                Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('news') }}"><i class="bi bi-bag-plus-fill"></i> Order</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                @if (Auth::check())
                                    <i class="bi bi-person-circle"></i>
                                    Hello, {{ Auth::user()->name }}
                                @else
                                    Hello, Guest
                                @endif
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('account.dashboard') }}"><i
                                            class="bi bi-gear-fill"></i> Setting</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('account.logout') }}"><i
                                            class="bi bi-box-arrow-left"></i> Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('account.login') }}"><i
                                    class="bi bi-box-arrow-right"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('account.register') }}"><i
                                    class="bi bi-person-plus-fill"></i> Signup</a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>

    @if (Session::has('success'))
        <div class="alert alert-success" id="successMessage">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger" id="errorMessage">{{ Session::get('error') }}</div>
    @endif

    @yield('content')

    <div class="text-center mt-5 mb-0 bg-black text-white container-fluid">
        <h5 class="py-5">©2025 E-Books. All right reserved.</h5>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

<script>
    setTimeout(function() {
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');

        if (successMessage) {
            successMessage.style.display = 'none';
        }
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 5000);
</script>

</html>
