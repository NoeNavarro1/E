<?php
session_start();
if (isset($_SESSION['usuario'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="http://localhost/ecovida/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/ecovida/assets/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
        <link rel="preload" href="../css/normalize.css" as="style">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="preload" href="../css/menu-principal.css" as="style">
        <link rel="stylesheet" href="../css/menu-principal.css">
        <title>Menu Principal</title>
    </head>

    <body>
        <div class="main">
            <div class="menu">
                <h2><?php echo "<p>Bienvenido " . $_SESSION['usuario'] . "</p>" ?></h2>
                <a href="#">Principal</a>
                <a href="#">Calendario</a>
                <a href="#">Pacientes</a>
                <a href="#">Medico</a>
                <a href="#">Nuevo Estudio</a>
                <a href="#">Resultados</a>
                <a href="#">Examenes</a>
                <a href="#">Usuarios</a>
                <a href="#">Historial</a>
                <a href="../salir.php">Cerrar sesion</a>
            </div>
            <div class="body">
                <img src="/img/ecovida.jpg" alt="">
                <div class="ubicacion">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="80" height="80" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                        <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                    </svg>
                    <p>Calle Allende Norte 217,<span>,90500 Huamantla,</span><span>Tlaxcala</span></p>
                </div>
            </div>
        </div>
    </body>

    </html>

<?php
} else {
    header("location:login.php");
}
?>