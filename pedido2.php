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
    <h1>RESUMEN + PAGO</h1>
    <form action="pago.php" method="post">
        <!-- Detalles de entrega -->
        <?php
            include 'conexion.php';
            $_SESSION['datosA'] = $_POST;
            $tipo_pago = $_POST['metodo'];
            if($tipo_pago === 'tarjeta' or $tipo_pago === 'tarjeta_credito')
            {
         ?>
        <div class="text-center">
            <div class="mb-3 text-center">
                <label for="" class="form-label">INGRESE EL NUMERO DE TARJETA</label>
                <input type="text" style="width: 50%; text-align:center;"
                    name="tarjeta" id="tarjeta" aria-describedby="helpId" placeholder="">
            </div>
            <div class="mb-3 text-center">
                <label for="" class="form-label">CVV</label>
                <input type="number" style="width: 25%; text-align:center;"
                    name="cvv" id="cvv" placeholder="CVV">
            </div>
        
            <h5>SU RESUMEN DE COMPRA ES:</h5>
            <?php }
            $total = 0; 
            foreach($_POST['productos'] as $comidaID => $cantidad){
                if($cantidad>=1){
                    $sql = "SELECT nombre, precio FROM comidas WHERE comidaID = '$comidaID'";
                    $result = mysqli_query($conexion, $sql);
                    
                // Verifica si la consulta tuvo éxito
                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $nombre = $row['nombre'];
                        $valor = $row['precio'];
                    
                
            ?>
                <label for=""><?php echo $nombre, ' cantidad: ', $cantidad, ' C/u ', $valor?></label><br>    
            <?php
                $total += $valor * $cantidad;
            } else {
                echo "Error al obtener datos de la base de datos.";
                    }
                }
            }
            ?>
                <label for="">PRECIO TOTAL = <?php echo $total?></label><br><br>
                <input type="hidden" name = 'total' value=" <?php echo $total;?>">
                <button type="submit" class="btn btn-primary">PAGAR</button>
        </div>
        
    </form>
      
    
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