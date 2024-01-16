<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Meta tags requeridos -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

   <!-- Tu archivo CSS personalizado -->

   <style>
    /* Estilo para establecer la imagen de fondo en el cuerpo */
    body {
           display: flex;
           flex-direction: column;
           align-items: center;
           justify-content: center;
           min-height: 100vh; /* Asegura que el contenido se ajuste al menos al 100% de la altura de la ventana */
           margin: 0; /* Elimina el margen predeterminado del cuerpo */
           background-image: url("IMAGENES/fondo-pedido.png");
           background-size: cover;
           background-repeat: no-repeat;
       }

       /* Estilos para el formulario */
       form {
           background-color: rgba(255, 255, 255, 0.8); /* Fondo semitransparente para el formulario */
           padding: 20px;
           border-radius: 10px;
           box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
       }
       h1, h2 {
           text-align: center;
       }
       label {
           display: flex;
           justify-content: center;
           align-items: center;
           margin-bottom: -20px; /* Elimina el margen inferior */
       }
  
    button {
      background-color: rgb(198, 218, 16);
    }
     
    h1 {
      color: rgb(13, 14, 13);
    }
    th {
      color: rgb(8, 11, 8);
    }

    .cancel-button {
      background-color: red;
      color: white;
      padding: 10px;
      border: none;
      cursor: pointer;
    }
    
    .submit-button {
      background-color: green;
      color: white;
      padding: 10px;
      border: none;
      cursor: pointer;
    }
    .cart-notification {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgb(255, 255, 255);
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    display: none;
    max-width: 600px;
    text-align: center;
}
        /* Estilos para la animación del botón */
        .showing-summary {
            background-color: #ff1100 !important;
        }
      
       /* Otros estilos personalizados aquí */
    /* Animación para cambiar el tipo de letra del encabezado*/
    @keyframes changeFont {
        0% { font-family: 'Arial', sans-serif; }
        25% { font-family: 'Times New Roman', serif; }
        50% { font-family: 'Courier New', monospace; }
        75% { font-family: 'Georgia', serif; }
        100% { font-family: 'Impact', sans-serif; }
    }

    h1 {
        animation: changeFont 5s infinite alternate; /* 5 segundos, animación alternada */
    }

    p {
    font-family: 'Impact', sans-serif; /* Cambia aquí el tipo de letra deseado */
    color: #000000;
    font-size: 20px;
    margin: 5px 0;
}
input::placeholder {
    font-size: 14px; /* Tamaño de fuente deseado */
    /* Otros estilos personalizados */
}
  </style>
  <title>PEDIDO</title>
</head>
<body>
<!-- Contenido principal -->
<header class="jumbotron jumbotron-fluid">
    <!-- Contenido del encabezado -->
</header>

<section class="container mt-5">
    <h1>Rellene todos sus datos para su pedido</h1>
    <form action="pedido2.php" method="post">
        <!-- Detalles de entrega -->
       
        <h2>Detalles de Entrega</h2>
        <label><p>Nombres:   </p><input type="text" name="nombre" placeholder="Nombres" required></label><br>
        <label><p>Apellidos: </p><input type="text" name="apellido" placeholder="Apellidos" required></label><br>
        <label><p>Correo:    </p><input type="text" name="correo" placeholder="Correo" required></label><br>
        <label><p>Telefono:  </p><input type="text" name="telefono" placeholder="Telefono" required></label><br>
        <label><p>Dirección: </p><input type="text" name="direccion" placeholder="Dirección" required></label><br>
        <label><p>Ciudad:    </p><input type="text" name="ciudad" placeholder="Ciudad" required></label><br>
        <input type="hidden" name="cedula" placeholder="Cedula" minlength="10" maxlength="10"
        value="<?php 
            include 'conexion.php';
            $user = $_SESSION["user"];
            $sql1 = "SELECT cedula FROM usuarios WHERE usuario = '$user'";
            $result1 = mysqli_query($conexion, $sql1);

            if ($result1) {
                // Verifica si la consulta tuvo éxito antes de intentar obtener el resultado
                $row = mysqli_fetch_assoc($result1);
                
                // Ahora, verifica si se encontró un registro y luego almacena la cédula en la sesión
                if ($row) {
                    echo $row["cedula"];
                } else {
                    echo $user;
                }
            } else {
                echo "Error en la consulta: " . mysqli_error($conexion);
            }
        
        ?> ">
        <label><p>Codigo Postal: </p> <input type="text" name="zip" placeholder="Codigo postal" required></label><br>
        <label><p>Metodo de Pago: </p>
            <select name="metodo">
                <option value="tarjeta">Tarjeta de crédito</option>
                <option value="tarjeta">Tarjeta de débito</option>
                <option value="paypal">PayPal</option>
                <option value="efectivo">Paga al recibir</option>
            </select>
        </label><br>

        <!-- Elementos del pedido -->
        
        <h2>Productos</h2>
        <?php
            include 'conexion.php';
            $sql = "SELECT * FROM comidas";
            $result = mysqli_query($conexion, $sql);
            while ($linea = mysqli_fetch_assoc($result))
                {
        ?>
            <label>
            <p>Producto: <?php echo $linea['nombre']; echo '$ ', $linea['precio']; ?> </p>
            <input type="number" id="productos[<?php echo $linea['comidaID']; ?>]" name="productos[<?php echo $linea['comidaID']; ?>]" placeholder="Cantidad"
            max="<?php echo $linea['cantidad']; ?>"></td>
            </label><br>
        <?php } ?>
        <div class="container text-center">
            <!-- Botones -->
            <input type="submit" value="Enviar Orden" class="submit-button">
            
        </div>
        <!-- ... Agrega más elementos aquí si es necesario -->
    </form>
        <!-- Resumen del carrito -->
        <div class="container text-center">
            <form action="index.php">
                <td colspan="2"><input type="submit" value="Cancelar Orden" class="cancel-button"></td>
            </form>
        </div>
</section>
<footer class="container mt-5">
    <div class="container text-center">
        <p1>&copy; 2023 Delicias Express. Todos los derechos reservados.</p1>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>

</body>
</html>