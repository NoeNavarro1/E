<?php
    if (isset($_SESSION['message'])) :
?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Súper!',
                text: '<?= $_SESSION['message']; ?>',
                showCloseButton: true,
                confirmButtonText: 'Cerrar',
                allowOutsideClick: true,
                onClose: function() {
                    window.location.href = '../../View/pacientes_vistas/V_pacientes.php';
            }});
        </script>
<?php
        unset($_SESSION['message']);
    endif;
?>

<!--Mensaje eliminar paciente-->
<?php
    if (isset($_SESSION['eliminar'])) :
?>
<script>
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
</script>
<?php
        unset($_SESSION['eliminar']);
    endif;
?>