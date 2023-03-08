<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/verify.css') }}">

    <title>Verificar Correo Electronico</title>
  </head>
  <body>

    <div class="content-principal">

        <div class="content-title">

            <div class="title">
                <h1>¡Te has registrado con éxito!</h1>
            </div>
    
            <div class="line-separator">
                <hr>
            </div>
    
        </div>

        <div class="section-description">
            <p>
                Te hemos enviado un email al correo que ingresaste para que actives tú cuenta y puedas disfrutar
                de nuestros servicios.
            </p>
            <p>Para poder iniciar sesión, puedes hacerlo dando click <a href="http://localhost:8000/login">Aquí</a></p>
            <p>Para enviar nuevamente la confirmación, da click <a href="{{ url('verification.send') }}"> Aquí</a></p>
        </div>


    </div>

    <div class="section-footer">
        <footer>
            <p>Copyright © Todos los derechos reservados - 2023</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>