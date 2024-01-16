<!doctype html>
<html lang="es">

<head>
    <!-- Meta tags requeridos -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" type="text/css" href="style3.css">
    <title>DELICIASXPRESS</title>
</head>

<body>
    <!-- Contenido principal -->
    <header class="jumbotron jumbotron-fluid">
        <div class="container text-center text-background">
            <nav class="navbar navbar-expand-sm navbar-dark bg-transparent">
                <div class="container">
                    <a class="navbar-brand">Express</a>
                    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">                            
                            <li class="nav-item" name="user-login">
                                <a class="nav-link" href="login.html">
                                    <!-- AQUI COMIENZO A VERIFICAR PARA UBICAR EL NOMBRE DLE USUARIO EN VEZ DE INICIAR SESION -->
                                    <?php
                                     session_start();
                                     include 'conexion.php';
                                     $user = $_SESSION['user'];
                                     if(!empty($user)){
                                        echo 'Bienvenido, ', $user;
                                     }else{
                                        echo 'Iniciar Sesión';
                                     }
                                    ?>
                                </a>
                            </li>
                            <?php 
                                $sql = "SELECT * FROM usuarios where usuario = '$user'";
                                $result = mysqli_query($conexion, $sql);

                                if (mysqli_num_rows($result) === 1) 
                                {
                            ?>
                                    <li class="nav-item" name="cerrar-sesion">
                                        <a class="nav-link" href="cerrarSesion.php">
                                            Cerrar Sesión
                                        </a>
                                    </li>
                                <?php } ?>
                        </ul>
                        
                    </div>
                </div>
            </nav>
            
            <h1 class="typewriter display-4 ">Delicias Express</h1>
            <img src="IMAGENES/delicias.png" alt="logo" width="200" height="200" />
            <p class="lead1">Sabor en tu puerta</p>
            </p>
        </div>
    </header>
   
    

    </nav>
    <section class="container mt-5">
        <h2>Menú destacado</h2>
        <div class="card text-center">
            <div class="row">
        <?php 
            $sql = "SELECT * FROM comidas";
            $result = mysqli_query($conexion, $sql);
            $sql2 = "SELECT * FROM usuarios where nivel = 2 AND usuario = '$user'";
            $result2 = mysqli_query($conexion, $sql2);
            while ($linea = mysqli_fetch_assoc($result))
            {
        ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?php echo $linea['imagen']; ?>" class="card-img-top" alt="<?php echo $linea['nombre']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $linea['nombre']; 
                    
                            if (mysqli_num_rows($result2) === 1) 
                            {
                                echo '  ID: ',$linea['comidaID'];
                            }?></h5>
                            <p class="card-text"><?php echo $linea['descripcion']; ?></p>
                            <p class="card-price">$<?php echo $linea['precio']; ?></p> <!-- Agrega el precio del producto -->
                            <p class="card-quantity">Disponibles: <?php echo $linea['cantidad']; ?></p>
                            <a href="pedido.php" class="btn btn-primary">Ordenar ahora</a>
                            
                        </div>
                    </div>
                </div>
        <?php } ?>
            </div>
        </div>
    </section>
    <section class="container mt-5">
        <h2>¿Por qué elegir Delicias Express?</h2>
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="feature-icon">
                    <img src="IMAGENES/fast-delivery.png" alt="Entrega rápida" class="responsive-image">
                </div>
                <h3>Entrega rápida</h3>
                <p>Recibe tu comida en la comodidad de tu hogar en tiempo récord.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="feature-icon">
                    <img src="IMAGENES/quality.png" alt="Calidad" class="responsive-image">
                </div>
                <h3>Ingredientes de calidad</h3>
                <p>Utilizamos solo ingredientes frescos y de alta calidad en nuestros platillos.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="feature-icon">
                    <img src="IMAGENES/restaurant.png" alt="Variedad" class="responsive-image">
                </div>
                <h3>Variedad en el menú</h3>
                <p>Ofrecemos una amplia variedad de platillos para satisfacer todos los gustos.</p>
            </div>
        </div>
    </section>

    <footer class="mt-5 py-3">
        <div class="container text-center">
            <p>&copy; 2023 Delicias Express. Todos los derechos reservados.</p>
            <?php 
                $sql = "SELECT * FROM usuarios where nivel = 2 AND usuario = '$user'";
                $result = mysqli_query($conexion, $sql);

                if (mysqli_num_rows($result) === 1) 
                {
                    
                
                ?>
                    
                   <a href="agregarComida.html">AGREGAR COMIDAS</a>

                    <?php
                        if(isset($_POST['comida_eliminar'])){
                            $id_eliminar = $_POST['id_eliminar'];
                            $sql = "DELETE FROM comidas WHERE comidaID = '$id_eliminar' ";
                            $result = mysqli_query($conexion, $sql);
                            header("Location: index.php");
                        }
                    ?>
                    <form method="POST" style="text-align: center;">
                          <small for="id_eliminar" class="form-label">ID</small>
                          <input type="number"
                            name="id_eliminar" id="id_eliminar" placeholder="0" style="width: 10%;">
                        <input name="comida_eliminar" id="comida_eliminar" class="btn btn-primary" type="submit" value="ELIMINAR COMIDA">
                    </form>
            <?php             
                }                       
            ?>
            
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>



</body>

</html>
