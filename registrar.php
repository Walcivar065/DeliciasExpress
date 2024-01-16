<?php 
    session_start();
?>
<?php 
    include 'conexion.php';

    $usuario_user = $_POST["reg_usuario"];
    $contrasenia_user = $_POST["reg_contrasenia"];
    $cedula = $_POST["cedula"];
    
    
    $sql = "INSERT INTO usuarios(cedula, contrasenia, usuario) VALUES('$cedula','$contrasenia_user','$usuario_user')";
    $result = mysqli_query($conexion, $sql);
    
    if ($result) {
        header("Location: index.php");

    } else {
    echo "Error al insertar el registro: " . mysqli_error($conexion);
    }
    exit()
    
?>