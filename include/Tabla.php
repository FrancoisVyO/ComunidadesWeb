<?php
    function generarTabla() {
        $servername="localhost";
        $username= "root";
        $password= "";
        $dbname= "comunidadweb";
        $conexion=new mysqli($servername, $username, $password, $dbname);   
        if ($conexion->connect_error) { 
            die("Conexionfallida". $conexion->connect_error);
          }
        $consulta="SELECT * FROM usuario";
        $resultado= $conexion->query($consulta);
        $tablaHTML = '
            <div class="col-md-12">
                <table border="1">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                    <th>Fecha</th>                    
                    </tr>
            </div>
            ';

    // Agregar filas con datos de MySQL
    while ($fila = $resultado->fetch_assoc()) {
        $tablaHTML .= '<tr>
                        <td>' . $fila['ID_Usuario'] . '</td>
                        <td>' . $fila['Nombre'] . '</td>
                        <td>' . $fila['FechaNacimiento'] . '</td>
                        <!-- Agrega más celdas según tu estructura de tabla -->
                    </tr>';
    }
    $tablaHTML .= '</table>';

    // Cerrar la conexión a la base de datos
    $conexion->close();

    return $tablaHTML;
}
?>