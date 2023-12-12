<?php
include_once("DBConexion.php");


class User extends Connection{
  private $Correo;  
  private $nombre;
  private $ID;
  private $apellidop;
  public function ExisteUsuario($Correo,$contrasena){
    $hashcontrasena=hash('sha256',$contrasena);
    $query=$this->open()->prepare('SELECT * FROM usuario WHERE Correo=:correo AND contrasena=:contrasena');
    $query->execute(['Correo'=>$Correo,'contrasena'=>$hashcontrasena])
    ;
    if($query->rowCount()){
      return true;
    }
    else{
      return false;
    }    
  }
  public function DefinirUsuario($Correo){
    $query=$this->open()->prepare("SELECT * FROM Usuario WHERE correo='$Correo'");
    $query->execute(['Correo'=>$Correo]);
    foreach ($query  as $row) {
      $this->nombre=$row['Nombre'];
      $this->Correo=$row['Correo'];
      $this->ID=$row['ID_Usuario'];
    }    
  }
   public function getID(){
      return $this->ID;
   }

}


// Cerrar la conexión a la base de datos

?>
