<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
  <link rel="stylesheet" href="public/css/materialize.css">
  <link rel="stylesheet" href="./public/css/templatemo.css">
  <link rel="stylesheet" href="./public/css/custom.css">
  <title>Municipios</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">
      <a class="navbar-brand text-success logo h3 " href="index.php">
        Comunidades WEB
      </a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
        <div class="flex">
          <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
            <li class="nav-item">
              <a class="nav-link" href="Municipio.php" style="text-decoration: none;">Municipios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">Saber mas</a>
            </li>
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

        <a class="nav-icon position-relative text-decoration-none" href="#">
          <i class="fa fa-fw fa-user text-dark mr-3"></i>
        </a>
      </div>
    </div>
  </nav>



  <div class="row justify-content-center">
    <?php
    include('./include/DBConexion.php');
    $database = new Connection();
    $db = $database->open();
    try {
      $sql = 'SELECT * FROM municipio';
      foreach ($db->query($sql) as $row) { ?>
        <div class="card col-11">
          <div class="card-title">
            <h5 class="text-center">
              <?php echo $row['Nombre_Municipio']; ?>
            </h5>
          </div>
          <div class="card-body col">
            <div class="card-text col " style="text-align: justify;">
              <p class="card-text col">
                <?php echo $row['Descripcion'] ?>
              </p>
              <p class="card-text col-1">
                <img src="./public/images/M<?php echo $row['ID_Municipio'] ?>.jpeg" height="300px" width="300px" alt="">
              </p>
            </div>
            <div class="col-1">

            </div>
          </div>
          <footer class="card-footer mt-4">
            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#VerComunidad_<?php echo $row['ID_Municipio'] ?>">
              Ver comunidades
            </a>
            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarComunidad_<?php echo $row['ID_Municipio'] ?>">
              Agregar comunidades
            </a>
            <div class="modal fade" id="AgregarComunidad_<?php echo $row['ID_Municipio']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5>Agregar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="./include/Municipio/Comunidad/BDComunidad.php" method="post">
                    <input name="ID_Municipio" value="<?php echo $row['ID_Municipio'] ?>" hidden>
                    <div class="modal-body">
                      <div>
                        <label for="form-label">Nombre</label>
                        <input type="text" name="Nombre_Comunidad" required autofocus>
                      </div>
                      <div>
                        <label for="form-label">Descripcion</label>
                        <textarea class="form-control" name="Descripcion" id="" cols="30" rows="10" required autofocus></textarea>
                      </div>
                      <div>
                        <button type="submit" class="btn btn-success" name="AgregarComunidad">
                          Agregar Comunidad
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="modal fade" id="VerComunidad_<?php echo $row['ID_Municipio']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5>
                      Municipio de <?php echo $row['Nombre_Municipio'] ?>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                  </div>
                  <div class="modal-body">
                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner">
                        <?php
                        $j = 0;
                        ?>
                        <?php
                        try {
                          $i = $row["ID_Municipio"];
                          $sqlC = "SELECT * FROM Comunidad INNER JOIN Municipio WHERE Comunidad.ID_Municipio={$i}";
                          foreach ($db->query($sqlC) as $rowC) {
                            if ($j == 0) {
                        ?>
                              <div class="carousel-item active">
                                <h5>
                                  <?php echo $rowC['Nombre_Comunidad']; ?>
                                </h5>
                                <div class="col-12">
                                  <img class="img-thumbnail" height="1600px" width="1200px" src="./public/images/<?php echo ($rowC['ID_Comunidad']) . ($row['ID_Municipio']) ?>C.jpeg" alt="">
                                </div>
                                <div class="card-footer">
                                  <form action="Comunidad.php" method="post">
                                    <input name="id_c" hidden value="<?php echo $rowC['ID_Comunidad'] ?>"></input>
                                    <input name="id_m" hidden value="<?php echo $row['ID_Municipio'] ?>"></input>
                                    <button class="btn btn-success" name="Ingreso" type="submit">Ver mas detalles</button>
                                  </form>
                                </div>
                              </div>
                            <?php
                            } else {
                            ?>
                              <div class="carousel-item">
                                <h5>
                                  <?php echo $rowC['Nombre_Comunidad']; ?>
                                </h5>
                                <div class="col-12">
                                  <img class="img-thumbnail" height="1600px" width="1200px" src="./public/images/<?php echo ($rowC['ID_Comunidad']) . ($row['ID_Municipio']) ?>C.jpeg" alt="">
                                </div>
                                <div class="card-footer">
                                  <form action="Comunidad.php" method="post">
                                    <input name="id_c" hidden value="<?php echo $rowC['ID_Comunidad'] ?>"></input>
                                    <input name="id_m" hidden value="<?php echo $row['ID_Municipio'] ?>"></input>
                                    <button class="btn btn-success" name="Ingreso" type="submit">Ver mas detalles</button>
                                  </form>
                                </div>
                              </div>
                        <?php }
                            $j = $j + 1;
                          }
                        } catch (\Throwable $th) {
                        }
                        ?>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden-focusable">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Siguiente</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </footer>

        </div>


    <?php
        $j = 0;
      }
    } catch (Exception $e) {
      echo "Error en la conexion" . $e->getMessage() . "Error";
    }


    ?>
  </div>

  </div>
  <script src="./public/js/bootstrap.min.js">
  </script>
</body>

</html>