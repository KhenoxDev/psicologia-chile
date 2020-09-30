<!doctype html>
<html lang="en">

<head>
    <title>Contacto</title>
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
                <h3 class="text-center"> Alguien se ha contactado con Psicología Chile. </h3>
                <br>
                <p> Hola, </p>
                <p> Hay una persona que se ha contactado, estos son sus datos: </p>
                <hr>
                <ul>
					@foreach ($contacto as $item)
						<li>Nombre: {{ $item['name'] }}</li>
						<li>Correo: {{ $item['email'] }}</li>
						<li>Teléfono: {{ $item['telefono'] }}</li>
						<li>Tipo:
						@switch($item['tipo'])
							@case(1)
								Dudas
							@break
							@case(2)
								Sugerencias
							@break
							@case(3)
								Emergencias
							@break
							@default
								Tipo no definido
						@endswitch
						</li>
						<li>Mensaje: {!! $item['mensaje'] !!}</li>
					@endforeach
                </ul>
                <br>
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
