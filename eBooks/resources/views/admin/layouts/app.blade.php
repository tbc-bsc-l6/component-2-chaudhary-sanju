<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'E-Books')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
</head>

<body>
    <nav class="navbar navbar-expand-md bg-white shadow-lg bsb-navbar bsb-navbar-hover bsb-navbar-caret">
        <div class="container">
            <a class="navbar-brand" href="#">
                <strong>E-Book Dashboard</strong>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#!" id="accountDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                @if (Auth::guard('admin')->check())
                                    Hello, {{ Auth::guard('admin')->user()->name }}
                                @else
                                    Hello, Admin
                                @endif
                            </a>
                            <ul class="dropdown-menu border-0 shadow bsb-zoomIn" aria-labelledby="accountDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
                <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar"
                    style="height: 100vh; border-right: 1px solid #dee2e6;">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active text-dark border-bottom py-2" href="{{ route('admin.dashboard') }}"
                                    style="border: 1px solid #dee2e6; border-radius: 0.25rem;">
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark border-bottom py-2" href="{{ route('user.index') }}"
                                    style="border: 1px solid #dee2e6; border-radius: 0.25rem;">
                                    Users
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark border-bottom py-2" href="{{ route('author.index') }}"
                                    style="border: 1px solid #dee2e6; border-radius: 0.25rem;">
                                    Author
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark border-bottom py-2" href="{{ route('category.index') }}"
                                    style="border: 1px solid #dee2e6; border-radius: 0.25rem;">
                                    Category
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark border-bottom py-2" href="{{ route('product.index') }}"
                                    style="border: 1px solid #dee2e6; border-radius: 0.25rem;">
                                    Product
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark border-bottom py-2" href="#"
                                    style="border: 1px solid #dee2e6; border-radius: 0.25rem;">
                                    Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark border-bottom py-2" href="{{ route('profile.edit') }}"
                                    style="border: 1px solid #dee2e6; border-radius: 0.25rem;">
                                    Settings
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>


                <!-- Main Content -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
