<?php
    session_start();
    include_once('../DBConexion.php');
    $h=0;
    if(isset($_POST['AgregarMunicipio'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $stmt=$db->prepare("INSERT INTO Municipio(Nombre_Municipio,Descripcion) VALUES (:Nombre_Municipio,:Descripcion)");
            $_SESSION["message"]=($stmt->execute(array(":Nombre_Municipio"=>$_POST['Nombre_Municipio'],":Descripcion"=>$_POST['Descripcion'])))?"Usuario agregado correctamente":"Algo salio mal";   
            $h=1;         
        }
        catch
        (PDOException $e){
            $_SESSION["message"] = $e->getMessage();
        }
        $database->close();        
    }
    else if(isset($_POST['Editar'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $id=$_GET["id"];
            $Nombre=$_POST["nom"];
            $Descripcion=$_POST["des"];
            $sql="UPDATE Municipio SET Nombre_Municipio='$Nombre', Descripcion='$Descripcion' WHERE ID_Municipio='$id'";
            $_SESSION["message"]=($db->exec($sql))?'Se modifico el municipio correctamente':'Ocurrio un error al actualizar los datos';
            $h= 2;
        }
        catch
        (PDOException $e){
            $_SESSION["message"] = $e->getMessage();
        }
        $database->close();
    }
    else if(isset($_GET["id"])) {
        $database = new Connection();
        $db =$database->open();
        try{
            $sql = "DELETE FROM Municipio WHERE ID_Municipio = '".$_GET["id"]."'";
            $_SESSION['message']=( $db -> exec($sql)) ? 'Municipio eliminado correctamente' :'No se a eliminado, revisa los datos';
            $h=2;
        }catch(Exception $e){
            $_SESSION['message']= $e->getMessage();
        }
        $database->close();
    }
    else{
        $_SESSION["message"] = "Llene completamente el Formulario";
    }

    if($h==1){
        header("location: ../../RegistroMunicipio.php");
    }
    else if($h==2){
        header("location: ../../Probando.php");
    }

?>