
<?php
    include 'conexion.php';
    session_start();

    if (empty($_POST["login_usuario"])){
        $login_usuarioErr = "Ingrese su usuario.";
    }else{
        $usuario_user = $_POST["login_usuario"];
    }

    if (empty($_POST["login_contrasenia"])){
        $login_contraseniaErr = "Ingrese su contraseña.";
    }else{
        $contrasenia_user = $_POST["login_contrasenia"];
    }

    
    $sql = "SELECT * FROM usuarios WHERE usuario= '$usuario_user' AND contrasenia= '$contrasenia_user'";
    $result = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($result) === 1) {
        $_SESSION["user"] = $usuario_user;
        $_SESSION["user_pass"] = $contrasenia_user;
        header("Location: index.php");
    } else {
        
        header("Location: acceso_fallido.html");


    }
    
?>
