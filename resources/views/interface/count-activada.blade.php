<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/activada.css') }}">

    <title>Cuenta Activada</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #4E6E81;">
        
        <img src="{{ asset('/storage/assets/System SALES.png') }}" alt="">

        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">

                <li class="nav-item dropdown">

                    <div class="btn-group">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                {{auth()->user()->nombres}} {{auth()->user()->primer_apellido}} {{auth()->user()->segundo_apellido}}
                        </button>
                        <div class="dropdown-menu dropdown-menu-start" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="{{ url('login') }}">Cerrar Sesión</a>
                        </div>
                    </div>

                </li>

            </ul>

        </div>
    </nav>


    <div class="content-principal">

        <div class="content-title">

            <div class="title">
                <h1>¡Te damos la bienvenida!</h1>
            </div>

            <div class="subtitle">
                <h3>Ya has activado tú cuenta y la verificaste con éxito</h3>
            </div>

            <div class="line-separator">
                <hr>
            </div>

        </div>

        <div class="content-description">

            <div class="content-text">

                <div class="text">
                    <p>
                        Ahora que te registraste con exito, te invitamos a seguirnos en nuestras redes sociales
                        para que estes al tanto de todas nuestras ofertas y promociones
                    </p>
                </div>

                <div class="sociales">

                    <div class="row">

                        <div class="col">
                            <a href=""> <img src="https://img.icons8.com/color/48/null/facebook.png"/></a>
                        </div>

                        <div class="col">
                            <a href=""> <img src="https://img.icons8.com/color/48/null/twitter-circled--v1.png"/></a>
                        </div>

                        <div class="col">
                            <a href=""> <img src="https://img.icons8.com/fluency/48/null/instagram-new.png"/></a>
                        </div>

                        <div class="col">
                            <a href=""> <img src="https://img.icons8.com/fluency/48/null/youtube-play.png"/></a>
                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>

    <footer class="footer">

        <div class="content-footer">
            <p>Copyright © Todos los derechos reservados - 2023</p>
        </div>

    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
