<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <title>Registro de municipio</title>
</head>
<body >   
    <div class=""> 
    <h1 class="text-center">
        Registra tu municipio
    </h1>  
    <div class="container mt-4">        
        <div class="row">                  
            <form class="col-md-4" action="include/Municipio/BDMunicipio.php" method="POST">
                <div class="mb-3">
                    <label for="form-label" class="form-label">Nombre municipio</label>
                    <input type="text" class="form-control" name="Nombre_Municipio" required autofocus>                  
                </div>
                <div class="mb-3">
                    <label for="form-label" class="form-label">Descripcion del municipio</label>
                    <textarea class="form-control" type="text" rows="3" name="Descripcion" required autofocus>

                    </textarea>             
                </div>
                <button type="submit" class="btn btn-dark" name="AgregarMunicipio">
                    Registrar Municipio
                </button>
                <button type="button" class="btn btn-dark">
                    <a href="Probando.php" style="text-decoration: none; color:white">
                    Regresar
                    </a>
                </button>
            </form>
        </div>
    </div>
    </div> 

    <script src="./public/js/bootstrap.min.js"></script>
</body>
</html>