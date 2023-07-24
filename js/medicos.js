//funcionalidad asociada al botón con el ID "botonCrear"
$(document).ready(function () {
    $("#botonCrear").click(function () {
        $("#formulario")[0].reset(); // Se realiza un reset del formulario con ID "formulario
        $(".modal-title").text("Crear medico"); //Se establece el texto "Crear usuario"
        $("#action").val("Crear"); //se establece el valor "Crear" para el campo  de entrada con el ID "action"
        $("#operacion").val("Crear");  // Se establece el valor "Crear" para el campo de entrada con el ID "operacion"
    })

    //Funcionalidad de el propio DataTables para mostrar y filtrar los datos
    var dataTable = $('#datos_medico').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "../../Controller/medico/Controller_obtenerRegistros.php",
            type: "POST",
        },
        "columnDefs": [{
            "targets": [0,2,3,4,5,6,7,8,9], //este targets sirve para los datos que no queremos que se filtren de las columnas
            "orderable": false
        },
        ],
        "language": { //se cambia el lenguaje a español para un mejor ententimiento
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
    $(document).on("submit", "#formulario", function (event) {
        event.preventDefault();
        //obtenemos los datos del form con .val()
        var nombres = $("#nombre").val();
        var apellidos = $("#apellidos").val();
        var cedula = $("#cedula").val();
        var telefono = $("#telefono").val();
        var email = $("#email").val();
        var especialidad = $("#especialidad").val();
        var domicilio = $("#domicilio").val();

        //solicitud ajax para enviar datos del formulario
        //se verifica que las variables o datos no esten vacios de lo contrario te soltara una alerta
        if (nombres != '' && apellidos != '') {
            $.ajax({
                url: "../../Controller/medico/Controller_CrearMedico.php",
                method: 'POST',
                //crea un objeto FormData a partir del formulario actual, lo que permite enviar datos en formato de formulario.
                data: new FormData(this),
                contentType: false,
                processData: false, //no se procesan los datos
                success: function (data) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data, // Utiliza el contenido de 'data' como título de la alerta
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#formulario')[0].reset();
                    $('#modalMedico').modal('hide');
                    dataTable.ajax.reload(); //se recarga la tabla
                }
            });
        } else {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Algunos campos son obligatorios',
                showConfirmButton: false,
                timer: 1500
            });
        }
    });


    //funcionalidad ajax para actualizar los datos
    //Funcionalidad de editar
    $(document).on('click', '.editar', function () {
        //recupera el valor del atributo "id" del elemento en el que se hizo clic
        var id_medico = $(this).attr("id");
        $.ajax({
            url: '../../Controller/medico/Controller_obtenerRegistro.php',
            method: 'POST',
            data: {
                id_medico: id_medico
            },
            dataType: 'json', //espera recibir datos en formato JSON como respuesta del servidor.

            //Si la solicitud AJAX tiene éxito, se ejecuta la función success
            success: function (data) {
                //se utilizan para asignar los valores de los campos del formulario dentro del modal con los datos recibidos del servidor.
                $('#modalMedico').modal('show');
                $('#nombre').val(data.nombre);
                $('#apellidos').val(data.apellidos);
                $('#cedula').val(data.cedula);
                $('#telefono').val(data.telefono);
                $('#email').val(data.email);
                $('#especialidad').val(data.especialidad);
                $('#domicilio').val(data.domicilio);
                $('.modal-title').text("Editar medico");
                $('#id_medico').val(id_medico);
                $('#action').val("Editar");
                $('#operacion').val("Editar");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });

    });

    //funcionalidad ajax para borrar los datos
    //Funcionalidad de Borrar
    $(document).on('click', '.borrar', function () {
        // Recupera el valor del atributo "id" del elemento en el que se hizo clic
        var id_medico = $(this).attr('id');

        // Se muestra la ventana de confirmación con SweetAlert
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Esta acción no se puede deshacer',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, borrar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Se realiza la solicitud AJAX para borrar el registro
                $.ajax({
                    url: '../../Controller/medico/Controller_borrarMedico.php',
                    method: 'POST',
                    data: {
                        id_medico: id_medico
                    },
                    success: function (data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Paciente borrado exitosamente',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        dataTable.ajax.reload(); // Actualiza la tabla DataTables
                    }
                });
            }
        });
    });
});


//funcionalidad para cerrar sesión
function salir(event) {
    event.preventDefault();
  
    Swal.fire({
      title: '¿Estás seguro?',
      text: "Si cierras la sesión, perderás todos los cambios no guardados.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Cerrar sesión',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
        // Aquí puedes realizar alguna acción adicional antes de redirigir
        window.location.href = "../../salir.php";
      }
    });
  }
  
  
  
  
  