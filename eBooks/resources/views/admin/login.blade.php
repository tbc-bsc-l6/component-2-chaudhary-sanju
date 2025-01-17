<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://badkimaitours.com/uploadedImages/pexels-pixabay-159866.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            position: relative;
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .card {
            background-color: rgba(255, 255, 255, 0.85);
            border-radius: 10px;
        }

        .card-body {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        h4 {
            font-weight: bold;
            color: #333;
        }

        .form-floating input {
            border-radius: 5px;
        }

        .alert {
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <section class="p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card border border-light-subtle rounded-4">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    @if (Session::has('success'))
                                        <div class="alert alert-success">{{ Session::get('success') }} </div>
                                    @endif
                                    @if (Session::has('error'))
                                        <div class="alert alert-danger">{{ Session::get('error') }} </div>
                                    @endif
                                    <div class="mb-5">
                                        <h4 class="text-center">Admin Login Here</h4>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('admin.authenticate') }}" method="POST">
                                @csrf
                                <div class="row gy-3 overflow-hidden">
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="email" value="{{ old('email') }}"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                id="email" placeholder="name@example.com">
                                            <label for="email" class="form-label">Email</label>
                                            @error('email')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating mb-3">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" id="password" value="" placeholder="Password">
                                            <label for="password" class="form-label">Password</label>
                                            @error('password')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-xl btn-primary py-3" type="submit">Log
                                                In</button>
                                        </div>
                                    </div>
                                    <div class="text-center pt-3 home fs-5">
                                        <a href="/">Go to Home</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
