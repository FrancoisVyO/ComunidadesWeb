<?php
    session_start();
    include_once('../../../DBConexion.php');
    $h=0;
    $B=false;
    if(isset($_POST['AgregarFestividad'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $IDCOM=$_POST['ID_Comunidad'];
            $stmt=$db->prepare("INSERT INTO Celebracion(Nombre,Descripcion,ID_Comunidad) VALUES (:Nombre,:Descripcion,:ID_Comunidad)");
            $_SESSION["message"]=($stmt->execute(array(":Nombre"=>$_POST['Nombre'],":Descripcion"=>$_POST['Descripcion'],":ID_Comunidad"=>$_POST['ID_Comunidad'])))?$B=true:"Algo salio mal";   
            $h=1;          
        }
        catch
        (PDOException $e){
            $_SESSION["message"] = $e->getMessage();
        }
        $database->close();        
    }
    else{
        $_SESSION["message"] = "Llene completamente el Formulario";
    }

    if($h==1){
        header("location: ../../../../Municipio.php");
    }
    else if($h==2){
        header("location: ../../../../Municipio.php");
    }

?>