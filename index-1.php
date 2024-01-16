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
    <title>FORMULARIO PRUEBA</title>
</head>

<body>
    <script>
        let cart = [];
    
        function addToCart(productName, price, inputId) {
            const quantityInput = document.getElementById(inputId);
            const quantity = parseInt(quantityInput.value);
    
            if (quantity > 0) {
                const product = {
                    name: productName,
                    price: price,
                    quantity: quantity
                };
                cart.push(product);
    
                // Limpia el campo de cantidad
                quantityInput.value = "";
    
                // Actualiza el carrito
                updateCart();
            }
        }
    
        function updateCart() {
            const cartContainer = document.getElementById("cart-container");
            let cartHTML = "<h3>Carrito de compras</h3><ul>";
    
            let total = 0;
    
            for (const product of cart) {
                const subtotal = product.price * product.quantity;
                cartHTML += `<li>${product.name} - Cantidad: ${product.quantity} - Subtotal: $${subtotal.toFixed(2)}</li>`;
                total += subtotal;
            }
    
            cartHTML += `</ul><p>Total: $${total.toFixed(2)}</p>`;
            cartContainer.innerHTML = cartHTML;
        }
    </script>
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
                            <li class="nav-item">
                                <a class="nav-link active" href="#" aria-current="page" >Home<span
                                        class="visually-hidden">(current)</span></a>
                            </li>
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
                            <li class="nav-item" name="cerrar-sesion">
                                <a class="nav-link" href="cerrarSesion.php">
                                    Cerrar Sesión
                                </a>
                            </li>
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
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="IMAGENES/pizza.png" class="card-img-top" alt="Pizza">
                    <div class="card-body">
                        <h5 class="card-title">Pizza al carbon</h5>
                        <p class="card-text">Deliciosa pizza con tomate, mozzarella y albahaca.</p>
                        <p class="card-price">$14.50</p> <!-- Agrega el precio del producto -->
                        <a href="pedido.html" class="btn btn-primary">Ordenar ahora</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="IMAGENES/hamburguesa.png" class="card-img-top" alt="Hamburguesa">
                    <div class="card-body">
                        <h5 class="card-title">Hamburguesa Clásica</h5>
                        <p class="card-text">Jugosa hamburguesa con queso, lechuga y tomate.</p>
                        <p class="card-price">$4.99</p> <!-- Agrega el precio del producto -->
                        <a href="pedido.html" class="btn btn-primary">Ordenar ahora</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="IMAGENES/Alitas.png" class="card-img-top" alt="Alitas">
                    <div class="card-body">
                        <h5 class="card-title">Alitas de la casa</h5>
                        <p class="card-text">Ricas alitas con salsa bqq o a elección a cualquier salsa.</p>
                        <p class="card-price">$8.50</p> <!-- Agrega el precio del producto -->
                        <a href="pedido.html" class="btn btn-primary">Ordenar ahora</a>
                    </div>
                </div>
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
                    
                    <a href="agregarComida.php">AGREGAR COMIDAS</a>
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
