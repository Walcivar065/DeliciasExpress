<?php 
    session_start();
    $usuario_user = $_SESSION['user'];
    $contrasenia_user = $_SESSION['user_pass'];
    $postA = $_SESSION['datosA'];

    include 'conexion.php';

    $sql = "SELECT * FROM usuarios WHERE usuario= '$usuario_user' AND contrasenia= '$contrasenia_user'";
    $result = mysqli_query($conexion, $sql);


    $nombre = $postA["nombre"];
    $apellido = $postA["apellido"];
    $correo = $postA["correo"];
    $telefono = $postA["telefono"];
    $direccion = $postA["direccion"];
    $ciudad = $postA["ciudad"];
    $cedula = $postA["cedula"];
    $zip - $postA["zip"];

    $comida - $postA["comida"];
    $metodo = $postA["metodo"];
    $total = $_POST['total'];
if (mysqli_num_rows($result) != 1) {
        die(header("Location: login.html"));
        
    }
    // Construir la consulta UPDATE
$sql = "UPDATE usuarios
        SET nombre = '$nombre',
            apellidoPat = '$apellido',
            telefono = '$telefono',
            direccion = '$direccion'
        WHERE cedula = '$cedula'";

$result = mysqli_query($conexion, $sql);
if(!$result){
    echo 'ALGO SALIO MAL AL CREAR LA FACTURA' . mysqli_error($conexion);;
    die;}

$sql = "INSERT INTO facturas(cedula, tipoPago, total) VALUES ('$cedula','$metodo','$total')";
$result = mysqli_query($conexion, $sql);
if(!$result){
    echo 'ALGO SALIO MAL AL CREAR LA FACTURA' . mysqli_error($conexion);;
    die;
}
$facturaID = mysqli_insert_id($conexion);
foreach($postA['productos'] as $comidaID => $cantidad){
    if($cantidad >= 1){
        $sql = "INSERT INTO factcom(comidaID, facturaID, cantidad) VALUES ('$comidaID', '$facturaID', '$cantidad')";
        $result = mysqli_query($conexion, $sql);
        if(!$result){
            echo 'ERROR INGRESANDO FACTCOM' . mysqli_error($conexion);;
            die;
        }
        $cantidad = intval($cantidad);
        $sql2 = "UPDATE comidas SET cantidad = cantidad - '$cantidad' WHERE comidaID ='$comidaID'";
        $result = mysqli_query($conexion, $sql2);
        if(!$result){
            echo 'ERROR HACIENDO UPDATE' . mysqli_error($conexion);;
            die;
        }
    }

}

header("Location: exito.html");