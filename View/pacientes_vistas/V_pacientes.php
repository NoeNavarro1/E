<?php
require '../../Controller/pacientes/Controller_mensajes_pacientes.php';
include ('V_nuevo_paciente.php');
require '../../Model/Conexion.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />
    <link rel="preconnect" href="http://localhost/ecovida/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/ecovida/assets/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/cbd3c2f268.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preload" href="http://localhost/ecovida/css/normalize.css" type="text/css" as="style">
    <link rel="stylesheet" href="http://localhost/ecovida/css/normalize.css" type="text/css">
    <link rel="preload" href="http://localhost/ecovida/css/menu_lateral.css" type="text/css" as="style">
    <link rel="stylesheet" href="http://localhost/ecovida/css/menu_lateral.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../inc/datatables/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../../inc/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Pacientes</title>
</head>

<body id="body">
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
            <h1>PRINCIPAL</h1>
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

            <a href="V_pacientes.php">
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

            <a href="../View/V_Usuarios.php">
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

            <a href="../salir.php" onclick="salir(event)">
                <div class="option">
                    <i class="fa-solid fa-door-closed" title="Cerrar sesión"></i>
                    <h4>Cerrar sesión</h4>
                </div>
            </a>

        </div>
    </div><!--Fin del menu lateral-->

    <!--tabla implementada con datatables-->
    <main>
        <div class="table">
            <div class="container">
                <?php include('../../Controller/pacientes/message.php'); ?>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4> Lista de Pacientes </h4>
                                <!--Se utiliza un modal que se encuentra en un archivo diferente-->
                                <button  type="button" title="Añadir paciente" class="btn btn-primary float-end " data-bs-toggle="modal" data-bs-target="#myModal">Nuevo</button>
                                <a href="reporte_pacientes.php" class="btn btn-primary"><b>PDF</b> </a>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nombre</th>
                                                        <th>Apellido Paterno</th>
                                                        <th>Apellido Materno</th>
                                                        <th>Empresa</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query = "SELECT * FROM pacientes";
                                                    $query_run = $conexion->query($query);
                                                    $pacientes = $query_run->fetchAll(PDO::FETCH_ASSOC);
                                                    if (count($pacientes) > 0) {
                                                        foreach ($pacientes as $paciente) {
                                                            $id = $paciente['id'];
                                                            $name = $paciente['name'];
                                                            $apepat = $paciente['apepat'];
                                                            $apemat = $paciente['apemat'];
                                                            $empresa = $paciente['empresa'];
                                                        
                                                        
                                                    ?>
                                                            <tr>
                                                                <td><?= $id; ?></td>
                                                                <td><?= $name; ?></td>
                                                                <td><?= $apepat; ?></td>
                                                                <td><?= $apemat; ?></td>
                                                                <td><?= $empresa; ?></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-warning btn-modal" title="Editar" data-bs-toggle="modal" data-bs-target="#editModal<?= $id; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                                                                    <form action="../../Controller/pacientes/Controller_mensajes_pacientes.php" method="POST" class="d-inline">
                                                                        <div class="modal fade" id="editModal<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="editModalLabel">Editar Paciente</h5>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <input type="hidden" name="pacientes_id" value="<?= $id; ?>">
                                                                                        <div class="form-group">
                                                                                            <label>Nombre</label>
                                                                                            <input type="text" name="name" value="<?= $name; ?>" class="form-control input-grande" required autocomplete="off" style="width: 95%;">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Apellido Paterno</label>
                                                                                            <input type="text" name="apepat" value="<?= $apepat; ?>" class="form-control input-grande" required autocomplete="off" style="width: 95%;">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Apellido Materno</label>
                                                                                            <input type="text" name="apemat" value="<?= $apemat; ?>" class="form-control input-grande" required autocomplete="off" style="width: 95%;">
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Sexo</label>
                                                                                            <select type="text" name="sexo" value="<?= $sexo; ?>" class="form-control input-grande" required autocomplete="off" style="width: 95%;">
                                                                                                <option value="Masculino">Masculino</option>
                                                                                                <option value="Femenino">Femenino</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Empresa</label>
                                                                                            <select type="text" name="empresa" value="<?= $empresa; ?>" class="form-control input-grande" required style="width: 95%;">
                                                                                                <option value="DIF">DIF</option>
                                                                                                <option value="Público en general">Público en general</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label>Fecha de nacimiento</label>
                                                                                            <input type="date" class="form-control input-grande" name="fecha" value="<?= $paciente['fecha']; ?>" required style="width: 95%;">
                                                                                        </div>
                                                                                        <hr>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="submit" name="updates_paciente" class="btn btn-primary btn-modal">Guardar cambios</button>
                                                                                        <button type="button" class="btn btn-secondary btn-modal" data-bs-dismiss="modal">Cerrar</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                    <!--Botones para editar y eliminar-->
                                                                    <form action="../../Controller/pacientes/Controller_mensajes_pacientes.php" method="POST" class="d-inline" id="deleteForm">
                                                                        <button type="button" onclick="confirmarEliminacion()" class="btn btn-danger btn-modal"><i class="fa fa-trash" title="Eliminar"></i></button>
                                                                        <input type="hidden" name="delete_paciente" value="<?= $id; ?>">
                                                                    </form>
                                                                    <button type="submit" class="btn btn-success btn-modal" title="Añadir estudio"><i class="fa-solid fa-file-circle-plus"></i></button>
                                                                    </form>
                                                            <?php
                                                        }
                                                    } else {
                                                    }
                                                            ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </main>


    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../../js/jquery-3.3.1.min.js"></script>
    <script src="../../inc/popper/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>

    <!-- datatables JS -->
    <script type="text/javascript" src="../../inc/datatables/datatables.min.js"></script>

    <!-- para usar botones en datatables JS -->
    <script src="../../inc/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="../../inc/datatables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="../../inc/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="../../inc/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="../../inc/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <script src="../../js/script.js"></script>


    <!-- código JS propìo-->
    <script type="text/javascript" src="../../js/pacientes.js"></script>


</body>

</html>