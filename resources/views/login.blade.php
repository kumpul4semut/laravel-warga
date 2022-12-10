<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Warga</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        body {
            background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
            height: 100vh;
        }
    </style>

</head>

<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card mt-5">
            <div class="card-body">

                <h3 class="text-center">Login Ke Aplikasi Wargaku</h3>
                    <hr>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <b>Opps!</b> {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('actionlogin') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email"
                                required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password"
                                required="">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                        <hr>
                        <p class="text-center">Belum punya akun? <a href="{{ route('register') }}">Register</a>
                            sekarang!
                        </p>
                    </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>


</body>

</html>
