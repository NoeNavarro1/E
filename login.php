<!DOCTYPE html>
<html lang="en">

<?php
include "../Ecovida/Controller/login/controller_Login.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="http://localhost/ecovida/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/ecovida/assets/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preload" href="css/normalize.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preload" href="css/login.css" as="style">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" href="img/ecovida_peq.ico">
    <title>Login</title>

<body>
    <section>
        <div class="contenido">
            <div class="imagen">
                <img src="img/ecovida.jpg">
            </div>
            <form name="formulario" id="formulario" method="POST" action="login.php">
                <div class="formulario">
                    <h1>Login</h1>
                    <hr>
                    <div class="campo">
                        <i class="bi bi-person icono"></i>
                        <label for="usuario">Usuario:</label>
                        <input id="user" type="text" name="usuario" class="inputs" placeholder="Usuario" required autocomplete="off">
                    </div>
                    <div class="campo container_password">
                        <i class="bi bi-key icono"></i>
                        <label for="pass">Contraseña:</label>
                        <input id="pass" type="password" name="pass" class="inputs pass" placeholder="Contraseña" required autocomplete="off">
                        <img src="img/eye_close.png" class="icon" id="eye">
                        <script>
                            // Agregar el event listener 
                            var eye = document.getElementById('eye');
                            var pass = document.getElementById('pass');

                            eye.addEventListener("click", function() {
                                if (pass.type === "password") {
                                    pass.type = "text";
                                    eye.src = "img/eye.png";
                                } else {
                                    pass.type = "password";
                                    eye.src = "img/eye_close.png";
                                }
                            });
                        </script>
                    </div>
                    <div class="campo">
                        <i class="bi bi-shop icono"></i>
                        <label for="sucursal">Selecciona tu sucursal:</label>
                        <select name="sucursal" id="sucursal" required>
                            <!--Muestra los datos de la columa sucursal de la tabla usuario-->
                            <?php
                            $sucursalesUnicas = array_unique($sucursales); // Eliminar sucursales duplicadas
                            foreach ($sucursalesUnicas as $s) { ?>
                                <option value="<?php echo $s; ?>"><?php echo $s; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="boton">
                        <button id="btn-login" class="enviar" type="submit">INICIAR SESION</button>
                    </div>
                </div>
            </form>
        </div><!--Contenido-->
    </section>

    <!--Scrips de JS-->
    <script src="js/login.js"></script>
    </head>
</body>

</html>
