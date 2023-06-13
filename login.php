<!--Validacion de Usuario y contraseña en la base de datos-->
<?php
if ($_POST) {
    session_start();
    require('Model/Conexion.php');
    $u = $_POST['usuario'];
    $c = $_POST['contraseña'];
    $s = $_POST['sucursal'];
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = $conexion->prepare("SELECT * FROM usuarios WHERE Usuario = :u AND Contraseña = :c");
    $query->bindParam(":u", $u);
    $query->bindParam(":c", $c);
    $query->execute();
    $usuario = $query->fetch(PDO::FETCH_ASSOC);
    if ($usuario) {
        $_SESSION['usuario'] = $usuario["Usuario"];
        $m_exito = 'Bienvenido ' . $_SESSION['usuario'];
    } else {
        $m_error = 'Usuario o contraseña incorrecta';
    }
}
?>

<!--Se concatena el mensaje de la variable y se cierra corchetes de php -->
<script>
    <?php if (isset($m_exito)) : ?>
        setTimeout(function() {
            Swal.fire({
                position: 'top',
                icon: 'success',
                title: 'Usuario correcto',
                text: '<?= $m_exito ?>',
                footer: '',
            }).then(function() {
                window.location.href = "View/V_menuPrincipal.php";
            });
        }, 100);
    <?php endif; ?>
    <?php if (isset($m_error)) : ?>
        setTimeout(function() {
            Swal.fire({
                position: 'top',
                icon: 'error',
                title: 'Usuario y/o contraseña incorrecta',
                showConfirmButton: false,
                timer: 2500,

            });
        }, 100);
    <?php endif; ?>
</script>
<!--Fin del scrip-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/ecovida/assets/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preload" href="css/normalize.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preload" href="http://localhost/ecovida/css/login.css" as="style">
    <link rel="stylesheet" href="http://localhost/ecovida/css/login.css">
    <title>Login</title>

<body>
    <section>
        <div class="contenido">
            <div class="imagen">
                <img src="img/ecovida.jpg">
            </div>
            <form id="login-form" method="POST" action="login.php">
                <div class="formulario">
                    <h1>Login</h1>
                    <hr>
                    <div class="campo">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        </svg>
                        <label for="usuario">Usuario:</label>
                        <input id="user" type="text" name="usuario" class="inputs" placeholder="Usuario">
                    </div>
                    <div class="campo">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z" />
                            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                            <path d="M8 11v-4a4 4 0 1 1 8 0v4" />
                        </svg>
                        <label for="contraseña">Contraseña:</label>
                        <input id="pass" type="password" name="contraseña" class="inputs" placeholder="Contraseña">
                    </div>
                    <div class="campo">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-store" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 21l18 0" />
                            <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
                            <path d="M5 21l0 -10.15" />
                            <path d="M19 21l0 -10.15" />
                            <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                        </svg>
                        <label for="">Selecciona tu sucursal:</label>
                        <select name="sucursal" class="inputs" name="" id="">
                            <option value="">Huamantla</option>
                            <option value="">Cuapiaxtla</option>
                            <option value="">Grajales</option>
                        </select>
                    </div>
                    <div class="boton">
                        <input id="btn-login" class="enviar" type="submit" value="INICIAR SESION" onclick="login(event)">

                    </div>
                </div>
            </form>
        </div><!--Contenido-->
    </section>

    <!--Scrips de JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://localhost/ecovida/assets/js/bootstrap.min.js"></script>
    <script src="../js/login.js"></script>
    </head>
</body>

</html>