<?php
    session_start();
    include_once('../../DBConexion.php');
    $h=0;
    $B=false;
    if(isset($_POST['AgregarComunidad'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $stmt=$db->prepare("INSERT INTO Comunidad(Nombre_Comunidad,Descripcion,ID_Municipio) VALUES (:Nombre_Comunidad,:Descripcion,:ID_Municipio)");
            $_SESSION["message"]=($stmt->execute(array(":Nombre_Comunidad"=>$_POST['Nombre_Comunidad'],":Descripcion"=>$_POST['Descripcion'],":ID_Municipio"=>$_POST['ID_Municipio'])))?$B=true:"Algo salio mal";   
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
        header("location: ../../../Municipio.php");
    }
    else if($h==2){
        header("location: ../../../Municipio.php");
    }

?>