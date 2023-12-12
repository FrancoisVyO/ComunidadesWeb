<?php
    session_start();
    include_once('../DBConexion.php');
    if(isset($_POST['RegistroUsuario'])){
        $database = new Connection();
        $db = $database->open();
        $Correo=$_POST['Usuario'].$_POST['simbolo'].$_POST['dominio'];
        $password= $_POST['contrasena'];
        $hashed_password=hash('sha256',$password);
        $sql="SELECT * FROM Usuario WHERE Correo='$Correo'";
        foreach ($db->query($sql) as $row) {
            $TF=$row['Correo'];
        }
        if ($TF!=$Correo) {
            if (strlen($password)>=8) {
                try{
                    $stmt=$db->prepare("INSERT INTO Usuario(Nombre,ApellidoP,ApellidoM,FechaNacimiento,Correo,contrasena) VALUES (:Nombre,:ApellidoP,:ApellidoM,:FechaNacimiento,:Correo,:contrasena)");
                    $_SESSION["message"]=($stmt->execute(array(":Nombre"=>$_POST['Nombre'],":ApellidoP"=>$_POST['ApellidoP'],":ApellidoM"=>$_POST['ApellidoM'],":FechaNacimiento"=>date($_POST['FechaNacimiento']),":Correo"=>$Correo,":contrasena"=>$hashed_password)))?$r=1:$r=0;      
                    header("Location: ../../Registro.php?dato=Te has registrado con exito.");                    
                }
                catch
                (PDOException $e){
                    $_SESSION["message"] = $e->getMessage();
                }
            }else{
                header("Location: ../../Registro.php?dato=Necesitas que tu contraseña contenga por lo menos 8 letras.");
            }            
        }
        else {
            header("Location: ../../Registro.php?dato=Ese correo esta en uso por favor usa otro correo.");
        }                
    }
    else{
        $_SESSION["message"] = "Llene completamente el Formulario";
    }
    

    

    $database->close();
    
?>