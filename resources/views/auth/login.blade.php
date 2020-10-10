<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('img/navbar/logo.png') }}">

    <title>{{ __('Psicología Chile') }}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .btn-dark {
            background-color: #323232;
            color: #fff;
        }

    </style>
    @toastr_css
</head>

<body class="text-center">
    <form method="POST" action="{{ route('admin.login') }}" class="form-signin">
        @csrf
        <img class="mb-4" src="{{ asset('img/navbar/logo.png') }}" alt="Psicología Chile">
        <label for="rut" class="sr-only">{{ __('Ingresa tu rut') }}</label>
        <input type="text" id="rut" name="rut" class="form-control" placeholder="{{ __('Rut . . .') }}" required
            autofocus>
        <label for="password" class="sr-only">{{ __('Contraseña') }}</label>
        <input type="password" id="password" name="password" class="form-control"
            placeholder="{{ __('Contraseña . . .') }}" required>
        <button class="btn btn-lg btn-dark btn-block" type="submit">Ingresar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
    @jquery
    @toastr_js
    @toastr_render
</body>

</html>
