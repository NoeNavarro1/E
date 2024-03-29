<?php
session_start();
if (isset($_SESSION['usuario'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link rel="preconnect" href="http://localhost/ecovida/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/ecovida/assets/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
        <link rel="preload" href="http://localhost/ecovida/css/normalize.css" type="text/css" as="style">
        <link rel="stylesheet" href="http://localhost/ecovida/css/normalize.css" type="text/css">
        <link rel="preload" href="http://localhost/ecovida/css/menu_lateral.css" type="text/css" as="style">
        <link rel="stylesheet" href="http://localhost/ecovida/css/menu_lateral.css" type="text/css">
        <link rel="preload" href="http://localhost/ecovida/css/medico.css" type="text/css" as="style">
        <link rel="stylesheet" href="http://localhost/ecovida/css/medico.css" type="text/css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <title>Ecovida</title>
    </head>

    <body id="body">
        <header>
            <div class="icon__menu">
                <i class="fas fa-bars" id="btn_open"></i>
                <h1>Medicos</h1>
            </div>
        </header>

        <div class="menu__side" id="menu_side">

            <div class="name__page">
                <img src="../../img/ecovida_pequeño.png">
                <h3>Ecovida</h3>
            </div>

            <div class="name__page">
                <img src="../../img/avatar.png">
                <h3><?php echo "<p>Bienvenido " . $_SESSION['usuario'] . "</p>" ?></h3>
            </div>

            <div class="options__menu">

                <a href="../V_menuPrincipal.php" class="selected">
                    <div class="option">
                        <i class="fas fa-home" title="Principal"></i>
                        <h4>Principal</h4>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-calendar" title="Calendario"></i>
                        <h4>Calendario</h4>
                    </div>
                </a>

                <a href="../pacientes/V_pacientes.php">
                    <div class="option">
                        <i class="fa-solid fa-notes-medical" title="Pacientes"></i>
                        <h4>Pacientes</h4>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-user-doctor" title="Médico"></i>
                        <h4>Médico</h4>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-eye-dropper" title="Estudios"></i>
                        <h4>Estudios</h4>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="far fa-address-card" title="Resultados"></i>
                        <h4>Resultados</h4>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-microscope" title="Examenes"></i>
                        <h4>Examenes</h4>
                    </div>
                </a>

                <a href="../usuarios/V_usuarios.php">
                    <div class="option">
                        <i class="fa-solid fa-user" title="Usuario"></i>
                        <h4>Usuarios</h4>
                    </div>
                </a>

                <a href="#">
                    <div class="option">
                        <i class="fa-solid fa-clock-rotate-left" title="Historial"></i>
                        <h4>Historial</h4>
                    </div>
                </a>

                <a href="../../salir.php" onclick="salir(event)">
                    <div class="option">
                        <i class="fa-solid fa-door-closed" title="Cerrar sesión"></i>
                        <h4>Cerrar sesión</h4>
                    </div>
                </a>

            </div>
        </div><!--Fin del menu lateral-->

        <div class="container fondo">
            <h1 class="text-center">Medicos</h1>
            <img src="../../img/avatar.png" width="20px">
            <div class="row">
                <div class="col-2 offset-10">
                    <div class="text-center">
                        <!-- Boton para modal -->
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalMedico" id="botonCrear">
                            <i class="bi bi-plus-circle-fill"></i> Crear
                        </button>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="table-responsive">
                <table id="datos_medico" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Cedula</th>
                            <th>Telefono</th>
                            <th>Email</th>
                            <th>Especialidad</th>
                            <th>Domicilio</th>
                            <th width="20px">Editar</th>
                            <th width="20px">Eliminar</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!--Ventana para el modal-->
        <!--Tiene un atributo id con el valor "modalUsuario" que se utiliza para identificarla en el código JavaScript-->
        <div class="modal fade" id="modalMedico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!--definen la estructura interna de la ventana modal-->
                <div class="modal-content contenedor"> <!--definen la estructura interna de la ventana modal-->
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear medico</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="V_medicos.php" id="formulario" name="formulario" method="POST">
                        <div class="moda-content">
                            <div class="modal-body contenedor-campos"> <!--Dentro de modal-body se definen etiquetas <label> y campos de entrada <input>-->

                                <div class="campo">
                                    <label for="nombre">Ingrese el nombre(s):</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" autocomplete="off">
                                </div>

                                <div class="campo">
                                    <label for="apellidos">Ingrese los apellidos:</label>
                                    <input type="text" name="apellidos" id="apellidos" class="form-control" autocomplete="off">
                                </div>

                                <div class="campo">
                                    <label for="cedula">Ingrese su la cedula:</label>
                                    <input type="text" name="cedula" id="cedula" class="form-control" autocomplete="off">
                                </div>

                                <div class="campo">
                                    <label for="telefono">Ingrese el telefono:</label>
                                    <input type="text" name="telefono" id="telefono" class="form-control" autocomplete="off">
                                </div>

                                <div class="campo">
                                    <label for="email">Ingrese el email:</label>
                                    <input type="text" name="email" id="email" class="form-control" autocomplete="off">
                                </div>

                                <div class="campo">
                                    <label for="especialidad">Ingrese la especialidad:</label>
                                    <input type="text" name="especialidad" id="especialidad" class="form-control" autocomplete="off">
                                </div>

                                <div class="campo">
                                    <label for="domicilio">Ingrese el domicilio:</label>
                                    <input type="text" name="domicilio" id="domicilio" class="form-control" autocomplete="off">
                                </div>
                            </div>

                            <div class="datosUsuario">
                                <h2>Datos Usuario</h2>
                                <hr>
                                <div class="campo">
                                    <label for="usuario">Usuario:</label>
                                    <input type="text" name="usuario" id="usuario" class="form-control" autocomplete="off">
                                </div>

                                <div class="campo">
                                    <label for="usuario">Fecha de nacimiento:</label>
                                    <input type="text" name="usuario" id="usuario" class="form-control" autocomplete="off">
                                </div>
                            </div>

                            <div class="modal-footer"> <!--se incluyen campos ocultos-->
                                <input type="hidden" name="id_medico" id="id_medico">
                                <input type="hidden" name="operacion" id="operacion">
                                <input type="submit" name="action" id="action" class="btn btn-success" value="Crear">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://kit.fontawesome.com/cbd3c2f268.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../../js/menu_lateral.js"></script>
        <script src="../../js/medicos.js"></script>


        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>

    </html>
<?php
} else {
    header("location:../../login.php");
}
?>