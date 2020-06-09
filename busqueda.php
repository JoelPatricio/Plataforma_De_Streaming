<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>CINEMA</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/x-icon" href="resurce/ICONO_CINEMA.ico" />
</head>

<body>
    <header style="background-color: #ee2b47;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p><br><img src="resurce/LOGO_CINEMA.png" width="100%" height="100%"></p>
                </div>
                <div class="col-8"></div>
                <div class="col"></div>
            </div>
        </div>
    </header>
    <br>

    <div class="container" style="background-color: #2c2e3e;">
            <div class="row">
                <div class="col-11"></div>
                <div class="col">
                    <a href="perfil.php" class="btn btn-secundary" style="background-color: #ee2b47; color:#f6f6f6;">Regresar</a>
                </div>
            </div>
    </div><br>

    <div class="container rounded formularioRegistro p-0" style="background-color: #2c2e3e;">
        <form>
            <div class="row">
                <div class="col-3"></div>
                <div class="col">
                    <!-- Search form -->
                    <input class="form-control" type="text" placeholder="Buscar Pelicula, Series o Generos" aria-label="Search">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-secundary" style="background-color: #ee2b47; color:#f6f6f6;">Buscar</button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-5 p-5 m-5">

        <div class='col mb-5'>
            <div class='card shadow-lg'>
                <div class='card-body'>
                    <img src="resurce/cartelera/peliculas/20.jpg" class="card-img-top">
                    <h2 class='h4 font-weight-light mb-1'>Titulo</h2>
                    <p class='my-0'>Genero: Ciencia-Ficcion</p><br>
                    <p>Clasificación: <span class='badge badge-success mt-0 mb-0'>AA A</span></p>
                    <p>Calificacion: <label for="radio1">★★★★★</label></p>
                    <a href="detalles.php" class='btn btn-outline-info btn-block'>Ver</a>
                </div>
            </div>
        </div>

        <div class='col mb-5'>
            <div class='card shadow-lg'>
                <div class='card-body'>
                    <img src="resurce/cartelera/series/29.jpg" class="card-img-top">
                    <h2 class='h4 font-weight-light mb-1'>Titulo</h2>
                    <p class='my-0'>Genero: Ciencia-Ficcion</p><br>
                    <p>Clasificación: <span class='badge badge-success mt-0 mb-2'>AA A</span></p>
                    <p>Calificacion: <label for="radio1">★★★★★</label></p>
                    <a href="perfil.php" class='btn btn-outline-info btn-block'>Ver</a>
                </div>
            </div>
        </div>

        <div class='col mb-5'>
            <div class='card shadow-lg'>
                <div class='card-body'>
                    <img src="resurce/cartelera/peliculas/19.jpg" class="card-img-top">
                    <h2 class='h4 font-weight-light mb-1'>Titulo</h2>
                    <p class='my-0'>Genero: Ciencia-Ficcion</p><br>
                    <p>Clasificación: <span class='badge badge-success mt-0 mb-2'>AA A</span></p>
                    <p>Calificacion: <label for="radio1">★★★★★</label></p>
                    <a href="perfil.php" class='btn btn-outline-info btn-block'>Ver</a>
                </div>
            </div>
        </div>

        <div class='col mb-5'>
            <div class='card shadow-lg'>
                <div class='card-body'>
                    <img src="resurce/cartelera/peliculas/2.jpg" class="card-img-top">
                    <h2 class='h4 font-weight-light mb-1'>Titulo</h2>
                    <p class='my-0'>Genero: Ciencia-Ficcion</p><br>
                    <p>Clasificación: <span class='badge badge-success mt-0 mb-2'>AA A</span></p>
                    <p>Calificacion: <label for="radio1">★★★★★</label></p>
                    <a href="perfil.php" class='btn btn-outline-info btn-block'>Ver</a>
                </div>
            </div>
        </div>

        <div class='col mb-5'>
            <div class='card shadow-lg'>
                <div class='card-body'>
                    <img src="resurce/cartelera/series/20.jpg" class="card-img-top">
                    <h2 class='h4 font-weight-light mb-1'>Titulo</h2>
                    <p class='my-0'>Genero: Ciencia-Ficcion</p><br>
                    <p>Clasificación: <span class='badge badge-success mt-0 mb-2'>AA A</span></p>
                    <p>Calificacion: <label for="radio1">★★★★★</label></p>
                    <a href="perfil.php" class='btn btn-outline-info btn-block'>Ver</a>
                </div>
            </div>
        </div>

        <div class='col mb-5'>
            <div class='card shadow-lg'>
                <div class='card-body'>
                    <img src="resurce/cartelera/series/4.jpg" class="card-img-top">
                    <h2 class='h4 font-weight-light mb-1'>Titulo</h2>
                    <p class='my-0'>Genero: Ciencia-Ficcion</p><br>
                    <p>Clasificación: <span class='badge badge-success mt-0 mb-2'>AA A</span></p>
                    <p>Calificacion: <label for="radio1">★★★★★</label></p>
                    <a href="perfil.php" class='btn btn-outline-info btn-block'>Ver</a>
                </div>
            </div>
        </div>

    </div>





            <!-- JS, Popper.js, and jQuery -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
                crossorigin="anonymous"></script>
</body>
</html>