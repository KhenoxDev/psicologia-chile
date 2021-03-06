<!doctype html>
<html lang="en">

<head>
    <title>Voluntario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row m-4">
            <div class="col-md-6 m-auto text-center">
                <img src="{{ env('APP_URL') }}/img/navbar/logo.png" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-sm-12 m-auto">
                <h3 class="text-center"> ¡Gracias por suscribirte al Newsletter! </h3>
                <p> Hola, </p>
                <p> Te mantendremos al día con todas las promociones, temas de interes, novedades relacionadas con
                    psicología chile. </p>
                <span><strong>¡Gracias por confiar en nosotros!</strong></span>
                <br>
                <hr>
                <small>Si usted no realizó esta suscripción, puede anularla en el siguiente enlace <a target="_blank"
                        href="{{ route('mailing.inactive.newsletter', $id) }}">Anular
                        suscripción</a></small>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
