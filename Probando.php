<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <title>Edicion</title>
</head>
<body>

              
    <?php
        include('./include/DBConexion.php');
        $database =new Connection();
        $db=$database->open();                                    
    ?>
<div class="container text-start" id="Municipio">
    <div class="row">
        <table class="table table-striped">
            <div class="col">                
                <h1>Municipios</h1>
            </div>
                <tbody >
                <?php

                    try{
                        $sql='SELECT * FROM Municipio';
                        foreach($db->query($sql) as $row){?>
                        <tr class="tab-content">
                            <td class="tab-content">                                
                                    <?php echo $row['Nombre_Municipio'];?>                                
                            </td>
                            <td class="tab-content">                                
                                    <?php echo $row['Descripcion'];?>                                
                            </td>
                            <td class="tab-content">
                                <a class="btn " style="background-color: peru;color:white" data-bs-toggle="modal" data-bs-target="#editModal_<?php echo $row['ID_Municipio'];?>">
                                Editar
                                </a>
                            </td>  
                            <td>
                                <a class="btn " style="background-color: red;color:white" data-bs-toggle="modal" data-bs-target="#BorrarModal_<?php echo $row['ID_Municipio'];?>">
                                Borrar
                                </a>
                            </td>    
                            <div class="modal fade" id="editModal_<?php echo$row['ID_Municipio'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5>Editar Municipio</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">                                                                 
                                            </button>
                                        </div>
                                        <div class="modal-body text-start">
                                            <form method="POST" action="include/Municipio/BDMunicipio.php?id=<?php echo $row['ID_Municipio']?>">
                                            <div class="row row-cols-2">
                                                <div class="col">
                                                    <label for="">Nombre</label>
                                                    <input type="text" class="form-control" 
                                                    name="nom" value="<?php echo$row['Nombre_Municipio']?>" >
                                                </div>  
                                                <div class="col">
                                                    <label for="">Descripcion</label>
                                                    <input type="text" class="form-control" value="<?php echo$row['Descripcion']?>" name="des">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sxecondary" data-bs-dismiss="modal">
                                                        Cerrar
                                                    </button>
                                                    <button type="submit" name="Editar" class="btn btn-primary">
                                                        Guardar
                                                    </button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="BorrarModal_<?php echo$row['ID_Municipio'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5>Borrar dato</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">                                                                 
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form  method="POST" action="include/Municipio/BDMunicipio.php?id=<?php echo $row['ID_Municipio'];?>">
                                            <div class="row row-cols-2">
                                                <div class="col">
                                                    <label for="">Nombre</label>
                                                    <p><?php echo$row['Nombre_Municipio']?>                                           
                                                    </p>
                                                </div>  
                                                <div class="col">
                                                    <label for="">Descripcion</label>
                                                    <p ><?php echo$row['Descripcion']?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-sxecondary" data-bs-dismiss="modal">
                                                        Cerrar
                                                    </button>
                                                    <button type="submit" name="borrar" class="btn btn-primary">
                                                        Borrar
                                                    </button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>          
                            <?php      
                            
                            }
                            
                            }
                            catch(Exception $e)
                            {
                                echo "Error en la conexión"
                                . $e->getMessage() ."Error";
                            }                   
                             
                            $database->close();                            
                            ?>                            
                        </tr>                                        
                </tbody>
            </table>
            
        </div>
        
</div>

<div class="text-center">
    <h1>Registrar Muncicipio</h1>
<a href="RegistroMunicipio.php">
    <button type="button" class="btn btn-primary">
      Registrar municipio
    </button>
</a>
</div>

    <script src="./public/js/bootstrap.min.js"></script>
</body>

</html>