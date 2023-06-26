<?php
require '../../Model/Conexion.php';
?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Paciente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Contenido del formulario -->
        <form action="../../Controller/pacientes/Controller_mensajes_pacientes.php" method="POST">
          <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control input-grande" required autocomplete="off">
          </div>
          <div class="mb-3">
                <label>Apellido Paterno</label>
                <input type="text" name="apepat" class="form-control input-grande" required autocomplete="off">
              </div>
              <div class="mb-3">
                <label>Apellido Materno</label>
                <input type="text" name="apemat" class="form-control input-grande" required autocomplete="off">
              </div>
              <div class="mb-3">
                <label>Sexo</label>
                <select type="text" name="sexo" class="form-control input-grande" required autocomplete="off">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                </select>
              </div>
              <div class="mb-3">
                <label>Empresa</label>
                <select type="text" name="empresa" class="form-control input-grande" required autocomplete="off">
                <option value="DIF">DIF</option>
                <option value="Público en general">Público en general</option>
                </select>
              </div>
              <div class="mb-3">
                <label>Fecha de nacimiento</label>
                <input type="date" name="fecha" class="form-control input-grande" required autocomplete="off">
              </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary btn-modal" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" name="guardar_paciente" class="btn btn-primary btn-modal">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Scripts necesarios para el funcionamiento del modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="../../js/pacientes.js"></script>
