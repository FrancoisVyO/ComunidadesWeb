<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="public/css/templatemo.css">
    <link rel="stylesheet" href="public/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="public/css/fontawesome.min.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <!--  jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="./public/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

    <title>Registro</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow ">
        <div class="container-fluid ">
            <a class="navbar-brand text-success">Comunidades WEB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <dir class="row row-cols-2">
        <div class="col bg-success-subtle" >
            <h1 class="s">Inicio de sesion</h1>
            <form class="" action="index.php" method="POST" autocomplete="off">
                <div class="form-group mb-3">
                    <input type="text" name="Correo" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <input type="password" name="contrasena" class="form-control">
                </div>
                <div class="form-group mb-3 col-2">
                    <button type="submit" name="iniciosesion" class="form-control btn bg-info">
                        Acceder
                    </button>
                </div>
            </form>
        </div>
        <div class="col bg-danger-subtle">
            <div class="col-12 text-center">
                <h1 class="fw-bold">Registro</h1>
            </div>
            <form action="include/Usuario/BDCUsuario.php" method="POST">
                <div class="col-12">
                    <label for="form-label">Nombre:</label>
                    <div class="input-group">
                        <input type="text" name="Nombre" class="form-control" required autofocus>
                    </div>
                    <div class="row row-cols-2">
                        <div class="col-6">
                            <label for="form-label">Apellido Paterno:</label>
                            <input type="text" name="ApellidoP" class="form-control" required autofocus>
                        </div>
                        <div class="col-6">
                            <label for="form-label">Apellido Materno:</label>
                            <input type="text" name="ApellidoM" class="form-control" required autofocus>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="row row-cols-3">
                    <div class="col">
                        <h5>
                            <label for="">Usuario:</label>
                        </h5>
                        <div class="input-group">
                            <input type="text" name="Usuario" class="form-control" required autofocus>
                        </div>
                    </div>
                    <div class="col-2">
                        <h5>
                            <label for="">@</label>
                        </h5>
                        <div class="input-group">
                            <input class="form-control" type="text" value="@" readonly name="simbolo">
                        </div>
                    </div>
                    <div class="col">
                        <h5>
                            <label for="">Dominio:</label>
                        </h5>
                        <div class="input-group">
                            <input type="text" name="dominio" class="form-control" required autofocus>
                        </div>
                    </div>                    
                </div>
                <div class="col-4">
                        <h5>
                            <label for="">Contraseña:</label>
                        </h5>
                        <div class="input-group">
                            <input type="password" name="contrasena" class="form-control" required autofocus>
                        </div>
                    </div>
                <div class="row row-cols-3">
                    <div class="col-12 text-center">
                        <div class="bootstrap-iso">
                            <!-- Form code begins -->
                            <h3>
                                Fecha de nacimiento
                            </h3>
                            <div class="form-group"> <!-- Date input -->
                                <input class="form-control" id="date" name="FechaNacimiento" placeholder="YYY/MM/DD" type="text" autocomplete="off" />
                            </div>
                            <div class="form-group"> <!-- Submit button -->
                                <!-- Form code ends -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn bg-success  bg-subtle" name="RegistroUsuario">
                            Registrar
                        </button>
                    </div>
            </form>
            <?php
            if (isset($_GET['dato']) != null) {
            ?>
                <div class="row text-center">
                    <div class="col-12">
                        <h1><?php echo $_GET['dato'] ?></h1>
                    </div>
                </div>

            <?php
            } else { ?>
                <div class="row text-center">
                    <div class="col-12">
                    </div>
                </div>
            <?php
            }


            ?>
        </div>
    </dir>



    <script src="public/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            var date_input = $('input[id="date"]'); //our date input has the name "date"
            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
            var options = {
                format: 'yyyy-mm-dd',
                container: container,
                todayHighlight: true,
                autoclose: true,
            };
            date_input.datepicker(options);
        })
    </script>
</body>

</html>