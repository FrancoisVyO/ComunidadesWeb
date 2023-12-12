<?php
  include_once("./include/Usuario/IniciosesionDB.php");  
  $a= new ID();
  if(isset($_POST['iniciosesion'])){        
    $database = new Connection();        
    $db = $database->open();   
    try{           
        $Correo=$_POST["Correo"];
        $Contrasena=$_POST["contrasena"];
        $hashConstrasena=hash('sha256',$Contrasena);
        $sql="SELECT * FROM Usuario WHERE Correo='$Correo'";            
        $IDs=null;
        foreach ($db->query($sql) as $row) {
            if ($row['Correo']==$Correo) {
                if ($row['contrasena']==$hashConstrasena) {
                    $IDs=$row['ID_Usuario'];
                    $Nombre=$row['Nombre'];
                }                    
            }
            $a->set_Id($IDs);                 
        }               
               
    }   
    catch
    (PDOException $e){
        $_SESSION["message"] = $e->getMessage();
    }          
    
    
    }
    
    
    $IDP=null;      
    if ($a->get_IDc()!==null) {
      session_start();
      $IDP=$a->get_IDc();
      $_SESSION['ID_Usuario']=$IDP;
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
  <title>Inicio</title>
</head>

<body>  
  <nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">
      <a class="navbar-brand text-success logo h2 align-self-center" href="Municipio.php">
        Comunidades WEB
      </a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
        <div class="flex">
          <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
            <li class="nav-item">
              <a class="nav-link" href="Municipio.php">Municipios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">Saber mas</a>
            </li>
            <?php
              if($IDP!=null){
                ?>
                <li>
                <a class="nav-link" style="text-decoration: yellowgreen;" href="Probando.php" >
                  Editar Municipios
                </a> 
                </li>               
                <?php
              }
            ?>

          </ul>
        </div>
      </div>
      <div class="navbar align-self-center d-flex">
        <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
          <div class="input-group">
            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
            <div class="input-group-text">
              <i class="fa fa-fw fa-search"></i>
            </div>
          </div>
        </div>
        <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
          <i class="fa fa-fw fa-search text-dark mr-2"></i>
        </a>
        <a class="nav-icon position-relative text-decoration-none" href="Registro.php">
          <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
          <?php
          if($IDP==null){ ?>
            <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">Iniciar sesion/Registro</span>
          <?php }
          else{ ?>
            <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">Bienvenido <?php echo $Nombre ?></span>
            <?php
          }
          ?>          
        </a>
        <a class="nav-icon position-relative text-decoration-none" href="#">
          <i class="fa fa-fw fa-user text-dark mr-3"></i>
        </a>
      </div>
    </div>
  </nav>

  <div id="template-mo-comunidades-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
      <li data-bs-target="#template-mo-comunidades-hero-carousel" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#template-mo-comunidades-hero-carousel" data-bs-slide-to="1"></li>
      <li data-bs-target="#template-mo-comunidades-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container">
          <div class="row p-5">
            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
              <img class="img-fluid" src="" alt="">
            </div>
            <div class="col-lg-6 mb-0 d-flex align-items-center">
              <div class="text-align-left align-self-center">
                <h1 class="h1 text-success"><b>Festividades </b></h1>
                <p style="text-align: justify;">
                En gran parte de México existen muchos municipios donde existe una gran cantidad de ranchos en los cuales se celebran festividades las cuales atraen a personas cercanas pero un ayuda seria que personas que estan de visita en la zona descubran que se celebrara en fechas proximas.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container">
          <div class="row p-5">
            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
              <img class="img-fluid" src="" alt="">
            </div>
            <div class="col-lg-6 mb-0 d-flex align-items-center">
              <div class="text-align-left align-self-center">
                <h1 class="h1 text-success"><b>Producción</b></h1>
                <p style="text-align: justify;">
                  Para empresas que quieran encontrar o ver que se produce en algunos municipios de tal manera que se ofrezcan servicios en estos, tales como atención al ganado o a los cultivos. Haciendo una mayor producción para la zona y de tal manera atraer mas personas para comprar los productos de la zona.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="container">
          <div class="row p-5">
            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
              <img class="img-fluid" src="" alt="">
            </div>
            <div class="col-lg-6 mb-0 d-flex align-items-center">
              <div class="text-align-left align-self-center">
                <h1 class="h1 text-success"><b>Monumentos </b></h1>
                <p style="text-align: justify;">
                  En estas comunidades existen monumentos u casas las cuales en muchas ocaciones le pertenecieron a personas importantes en la historia de México.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-comunidades-hero-carousel" role="button" data-bs-slide="prev">
      <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-comunidades-hero-carousel" role="button" data-bs-slide="next">
      <i class="fas fa-chevron-right"></i>
    </a>
  </div>




  <section class="container py-5">
    <div class="row text-center pt-3">
      <div class="col-lg-6 m-auto">
        <h1 class="h1">Produccion</h1>
        <p style="text-align: justify;">
          Su produccion se basa en lo que saben hacer y trabajn en ello, como lo es la albañileria,
          a la plomeria, electrisists o en caso de las mujeres a hacer tortillas o vender quesos
          con la leche de su ganado.
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-4 p-5 mt-3">
        <img src="./public/images/Produccion.jpg" class="rounded-circle img-fluid border">
        <h5 class="text-center mt-3 mb-3">Producción</h5>      
      </div>
      <div class="col-12 col-md-4 p-5 mt-3">
        <img src="./public/images/Festividades.jpg" class="rounded-circle img-fluid border">
        <h2 class="h5 text-center mt-3 mb-3">Festividades</h2>        
      </div>
      <div class="col-12 col-md-4 p-5 mt-3">
        <img src="./public/images/Monumentos.jpg" class="rounded-circle img-fluid border">
        <h2 class="h5 text-center mt-3 mb-3">Monumentos</h2>        
      </div>
    </div>
  </section>
  <!-- End Categories of The Month -->


  <!-- Start Featured Product -->



  <!-- Start Footer -->
  <footer class="bg-dark" id="tempaltemo_footer">
    <div class="w-100 bg-black py-3">
      <div class="container">
        <div class="row pt-2">
          <div class="col-12">
            <p class="text-left text-light">
              Copyright &copy; 2023 Comunidades
              | Designed by 
              <a class="navbar-sm-brand  text-light text-decoration-none" href="mailto:ComunidadesWeb@hotmail.com">
                ComunidadesWeb@hotmail.com
              </a>
            </p>
            <d class="text-left">
            <div class="container text-light">
              <div class="w-100 d-flex justify-content-between">
                <div>
                  <i class="fa fa-envelope mx-2"></i>
                  
                </div>
              </div>
            </div>
            </p>
          </div>
        </div>
      </div>
    </div>

  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="public/js/bootstrap.min.js"></script>
  

</body>

</html>