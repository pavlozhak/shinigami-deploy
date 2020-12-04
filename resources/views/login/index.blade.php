<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">

    {{--  Fontawesome  --}}
    <script src="https://kit.fontawesome.com/e68fdc85c1.js" crossorigin="anonymous"></script>

    <title>
       Login
    </title>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-6 d-none d-sm-none d-md-block login-page-background login-box"></div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 align-self-center">
            <h1 class="display-4 mb-5">Login</h1>

            @include('layouts.error')

            @include('layouts.success')

            <form method="post" action="{{ route('login-handler') }}">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                </div>

                @csrf

                <button type="submit" class="btn btn-primary">Log In</button>
            </form>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
