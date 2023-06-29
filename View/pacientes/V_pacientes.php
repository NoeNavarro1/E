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
        <script src="https://kit.fontawesome.com/cbd3c2f268.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="preload" href="http://localhost/ecovida/css/normalize.css" type="text/css" as="style">
        <link rel="stylesheet" href="http://localhost/ecovida/css/normalize.css" type="text/css">
        <link rel="preload" href="http://localhost/ecovida/css/menu_lateral.css" type="text/css" as="style">
        <link rel="stylesheet" href="http://localhost/ecovida/css/menu_lateral.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Ecovida</title>
</head>

<body id="body">
<header>
            <div class="icon__menu">
                <i class="fas fa-bars" id="btn_open"></i>
                <h1>PACIENTES</h1>
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

                <a href="../View/pacientes/V_pacientes.php">
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

    <div class="container fondo">
        <h1 class="text-center">Pacientes</h1>
        <div class="row">
            <div class="col-2 offset-10">
                <div class="text-center">
                    <!-- Boton para modal -->
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalUsuario" id="botonCrear">
                        <i class="bi bi-plus-circle-fill"></i> Crear
                    </button>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="table-responsive">
            <table id="datos_usuario" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Empresa</th>
                        <th>Localidad</th>
                        <th>Fecha Creación</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!--Ventana para el modal-->
    <!--Tiene un atributo id con el valor "modalUsuario" que se utiliza para identificarla en el código JavaScript-->
    <div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog"> <!--definen la estructura interna de la ventana modal-->
            <div class="modal-content"> <!--definen la estructura interna de la ventana modal-->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="V_pacientes.php" id="formulario" method="POST">
                    <div class="moda-content">
                        <div class="modal-body"> <!--Dentro de modal-body se definen etiquetas <label> y campos de entrada <input>-->
                            <label for="nombre">Ingrese el nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" autocomplete="off">
                            <br>

                            <label for="apellidos">Ingrese los apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control" autocomplete="off">
                            <br>

                            <label for="telefono">Ingrese el telefono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" autocomplete="off">
                            <br>

                            <label for="email">Ingrese el correo</label>
                            <input type="email" name="email" id="email" class="form-control" autocomplete="off">
                            <br>

                            <label for="empresa">Seleccione la empresa</label>
                            <select name="empresa" id="empresa" class="form-control">
                                <option value="DIF">DIF</option>
                                <option value="Publico">Publico en general</option>
                            </select>

                            <label for="localidad">Seleccione la localidad</label>
                            <select name="localidad" id="localidad" class="form-control">
                                <option value="Huamantla">Huamantla</option>
                                <option value="Cuapiaxtla">Cuapiaxtla</option>
                                <option value="Grajales">Grajales</option>
                            </select>
                        </div>

                        <div class="modal-footer"> <!--se incluyen campos ocultos-->
                            <input type="hidden" name="id_usuario" id="id_usuario">
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
    <script src="../../js/script.js"></script>
    <script src="../../js/login.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    

    <!-- funcionalidad asociada al botón con el ID "botonCrear-->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#botonCrear").click(function() {
                $("#formulario")[0].reset(); // Se realiza un reset del formulario con ID "formulario
                $(".modal-title").text("Crear paciente"); //Se establece el texto "Crear usuario"
                $("#action").val("Crear"); //se establece el valor "Crear" para el campo  de entrada con el ID "action"
                $("#operacion").val("Crear");  // Se establece el valor "Crear" para el campo de entrada con el ID "operacion"
            })
            
            //Funcionalidad de el propio DataTables para mostrar y filtrar los datos
            var dataTable = $('#datos_usuario').DataTable({
                "processing":true,
                "serverSide":true,
                "order": [],
                "ajax": {
                    url: "../../Controller/paciente/Controller_obtenerRegistros.php",
                    type: "POST",
                },
                "columnDefs": [{
                    "targets":[0,2,3,4,7,8,9], //este targets sirve para los datos que no queremos que se filtren de las columnas
                    "orderable":false
                }, 
            ],
            "language":{ //se cambia el lenguaje a español para un mejor ententimiento
                "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
            });


            //Aqui esta el codigo para la insercion de los datos
            $(document).on("submit", "#formulario", function(event) {
                event.preventDefault();
                //obtenemos los datos del form con .val()
                var nombres = $("#nombre").val();
                var apellidos = $("#apellidos").val();
                var telefono = $("#telefono").val();
                var email = $("#email").val();
                var empresa = $("#empresa").val();
                var localidad =$("#localidad").val();
                
                //solicitud ajax para enviar datos del formulario
                //se verifica que las variables o datos no esten vacios de lo contrario te soltara una alerta
                if (nombres != '' && apellidos != '' && email != '') {
                    $.ajax({
                        url: "../../Controller/paciente/Controller_CrearPaciente.php",
                        method: 'POST',
                        //crea un objeto FormData a partir del formulario actual, lo que permite enviar datos en formato de formulario.
                        data: new FormData(this), 
                        contentType: false,
                        processData: false, //no se procesan los datos
                        success: function(data) {
                            alert(data);
                            $('#formulario')[0].reset();
                            $('#modalUsuario').modal('hide');
                            dataTable.ajax.reload(); //se recarga la tabla
                        }
                    });
                } else {
                    alert("Algunos campos son obligatorios");
                }
            });


            //funcionalidad ajax para actualizar los datos
            //Funcionalidad de editar
            $(document).on('click', '.editar', function() {
                //recupera el valor del atributo "id" del elemento en el que se hizo clic
                var id_usuario = $(this).attr("id");
                $.ajax({
                    url: '../../Controller/paciente/Controller_obtenerRegistro.php',
                    method: 'POST',
                    data: { 
                        id_usuario: id_usuario
                    },
                    dataType: 'json', //espera recibir datos en formato JSON como respuesta del servidor.

                    //Si la solicitud AJAX tiene éxito, se ejecuta la función success
                    success: function(data) {
                        //se utilizan para asignar los valores de los campos del formulario dentro del modal con los datos recibidos del servidor.
                        $('#modalUsuario').modal('show');
                        $('#nombre').val(data.nombre);
                        $('#apellidos').val(data.apellidos);
                        $('#telefono').val(data.telefono);
                        $('#email').val(data.email);
                        $('#empresa').val(data.empresa);
                        $('#localidad').val(data.localidad);
                        $('.modal-title').text("Editar Paciente");
                        $('#id_usuario').val(id_usuario);
                        $('#action').val("Editar");
                        $('#operacion').val("Editar");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });

            });
            
            //funcionalidad ajax para borrar los datos
            //Funcionalidad de Borrar
            $(document).on('click', '.borrar', function() {
                //recupera el valor del atributo "id" del elemento en el que se hizo clic
                var id_usuario = $(this).attr('id');
                //se muestra una ventana de confirmacion
                if (confirm("Estas seguro de borrar este registro" + " " + id_usuario)) {
                    //se realiza una solicitud AJAX utilizando jQuery
                    $.ajax({
                        url: '../../Controller/paciente/Controller_borrarPaciente.php',
                        method: 'POST',
                        data: { //se envían los datos al servidor
                            id_usuario: id_usuario
                        },
                        success: function(data) {
                            alert(data);
                            dataTable.ajax.reload(); //actualiza la tabla DataTables,
                        }
                    });
                } else {
                    return false;
                }
            });


        });
    </script>

</body>

</html>
<?php
} else {
    header("location:login.php");
}
?>