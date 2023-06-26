$(document).ready(function() {    
  $('#example').DataTable({        
      language: {
              "lengthMenu": "Mostrar _MENU_ registros",
              "zeroRecords": "No se encontraron resultados",
              "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
              "infoFiltered": "(filtrado de un total de _MAX_ registros)",
              "sSearch": "Buscar:",
              "oPaginate": {
                  "sFirst": "Primero",
                  "sLast":"Último",
                  "sNext":"Siguiente",
                  "sPrevious": "Anterior"
         },
         "sProcessing":"Procesando...",
          },	        
  });     
});

//mensaje de confirmacion al eliminar un paciente
function confirmarEliminacion() {
  Swal.fire({
      title: "¿Estás seguro?",
      text: "¿Estás seguro de que deseas eliminar estos datos?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#d33",
      cancelButtonColor: "#3085d6",
      confirmButtonText: "Sí, eliminar",
      cancelButtonText: "Cancelar"
  }).then((result) => {
      if (result.isConfirmed) {
          document.getElementById("deleteForm").submit();
      }
  });
}