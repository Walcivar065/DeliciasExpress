<?php 
    session_start();
?>
<?php 
    include 'conexion.php';

    $nombre_comida = $_POST["nombre_comida"];
    $descripcion = $_POST["descripcion_comida"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];
    $imagen = $_FILES['imagen']['name'];
    $imagetemp = $_FILES['imagen']['tmp_name'];

    $destino = 'IMAGENES/';
    $destinoBD = 'IMAGENES/' .$imagen;
    $destinoFinal = $destino . basename($imagen);


    if (move_uploaded_file($imagetemp, $destinoFinal)){
        echo 'aaaaaaaaaaaaaaaaaaaa';
    }
    else{
        $error_message = error_get_last();
        echo "Error al subir el archivo: " , $error_message['message'],  sys_get_temp_dir();
        die;
    }

    $sql = "INSERT INTO comidas(cantidad, precio, nombre, imagen, descripcion) 
    VALUES('$cantidad','$precio', '$nombre_comida', '$destinoBD', '$descripcion')";
    $result = mysqli_query($conexion, $sql);
    
    if ($result) {
        header("Location: index.php");

    } else {
        
        echo "Error al insertar el registro: " . mysqli_error($conexion);
        die;
        header("Location: index.php");
    }
    exit()
    
?>
