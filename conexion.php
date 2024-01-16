<?php 
    session_start();
?>
<?php 

    $servidor = "10.10.10.19:3306";
    $usuario = "apache";
    $contrasenia = "123456";
    $base_datos = "DB_Arquitectura";
    $conexion = mysqli_connect($servidor, $usuario, $contrasenia, $base_datos);

    if (!$conexion){
        die("La conexión falló" . mysqli_connect_error());
    }
    
?>