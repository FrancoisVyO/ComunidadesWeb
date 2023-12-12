<?php
session_start();
include_once("./include/DBConexion.php");
$database = new Connection();
$db = $database->open();
$IDC = 0;
$IDM = 0;
if (isset($_POST['Ingreso'])) {
    $IDC = $_POST['id_c'];
    $IDM = $_POST['id_m'];
    $sql = "SELECT * FROM comunidad WHERE ID_Comunidad=$IDC";
    foreach ($db->query($sql) as $row) {
        $Nombre = $row['Nombre_Comunidad'];
        $Descripcion=$row['Descripcion'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/materialize.css">
    <link rel="stylesheet" href="./public/css/templatemo.css">
    <link rel="stylesheet" href="./public/css/custom.css">
    <title><?php echo $Nombre ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-success logo h3 " ">
                <?php echo $Nombre; ?>
            </a>
            <div class="nav-link"  >                
                <a href="Municipio.php" style="text-decoration: none;"> Regresar</a>               
            </div>
        </div>
       
    </nav>

    <main class="container py-4">
        <header>
            <div class="row row-cols-2">
                <div class="col-md-8">
                    <div>
                        <h3 class="display-5 ">
                            <?php echo $Nombre; ?>
                        </h3>
                        <p>
                        <?php 
                            echo $Descripcion;
                        ?>    
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="./public/images/<?php echo($IDC).($IDM) ?>C.jpeg" width="500px" height="500px" alt="">
                </div>
            </div>                        
        </header>
        
        <div>
            <div class="col-4">
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarModal">
                    Agregar Festividad/Municipio
                </a>                
            </div>
        </div>


    </main>


    <div class="modal fade" id="AgregarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Agregar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="./include/Municipio/Comunidad/Edificio/crearedificio.php" method="post">
                    <input name="ID_Comunidad" value="<?php echo$IDC?>" hidden>
                    <div class="modal-body">                        
                        <div>
                            <label for="form-label">Nombre</label>
                            <input type="text" name="Nombre" required autofocus>
                        </div>
                        <div>
                            <label for="form-label">Descripcion</label>
                            <textarea class="form-control" name="Descripcion" id="" cols="30" rows="10" required autofocus></textarea>                           
                        </div>                        
                        <div>
                            <button type="submit" class="btn btn-success" name="AgregarFestividad">
                                Subir informacion
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
            $sql2="SELECT * FROM Celebracion WHERE ID_Comunidad='$IDC'";
            foreach ($db->query($sql2) as $row1) {
                ?>                                
                <div class="row justify-content-center align-items-center">                
                    <div class="col-md-8">
                        <h4 class="display-5 text-center">
                            <?php echo $row1['Nombre'];?>
                        </h4>
                        <p>
                            <?php echo $row1['Descripcion'];?>
                        </p>
                    </div>
                </div>
                <?php
            }
            
        ?>
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:469-697-85-67">469-697-85-67</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:comunidadesWeb@hotmail.com">comunidadesWeb@hotmail.com</a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>                            
            </div>
        </div>
       
        

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2023 Comunidades 
                            | Designed by <a class="text-decoration-none" href="mailto:comunidadesWeb@hotmail.com">comunidadesWeb@hotmail.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>


    <script src="./public/js/bootstrap.min.js"></script>

</body>

</html>