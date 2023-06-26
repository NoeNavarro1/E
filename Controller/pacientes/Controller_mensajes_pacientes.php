<?php
require '../../Model/Conexion.php';

//consulta para crear paciente 
if (isset($_POST['guardar_paciente'])) {
    $name = $_POST['name'];
    $apepat = $_POST['apepat'];
    $apemat = $_POST['apemat'];
    $sexo = $_POST['sexo'];
    $empresa = $_POST['empresa'];
    $fecha = $_POST['fecha'];

    $query = "INSERT INTO pacientes (name, apepat, apemat, sexo, empresa, fecha) VALUES 
            (:name, :apepat, :apemat, :sexo, :empresa, :fecha)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':apepat', $apepat);
    $statement->bindParam(':apemat', $apemat);
    $statement->bindParam(':sexo', $sexo);
    $statement->bindParam(':empresa', $empresa);
    $statement->bindParam(':fecha', $fecha);
    $query_run = $statement->execute();

    if ($query_run) {
        $_SESSION['message'] = "El paciente fue creado con éxito";
        header("Location: ../../View/pacientes_vistas/V_pacientes.php");
        exit(0);
    } else {
        $_SESSION['message'] = "El paciente no se pudo crear";
        header("Location: ../../View/pacientes_vistas/V_pacientes.php");
        exit(0);
    }
}

//consulta para actualizar paciente
if (isset($_POST['updates_paciente'])) {
    $pacientes_id = $_POST['pacientes_id'];
    $name = $_POST['name'];
    $apepat = $_POST['apepat'];
    $apemat = $_POST['apemat'];
    $sexo = $_POST['sexo'];
    $empresa = $_POST['empresa'];
    $fecha = $_POST['fecha'];

    $query = "UPDATE pacientes SET name=:name, apepat=:apepat, apemat=:apemat, sexo=:sexo, empresa=:empresa, fecha=:fecha WHERE id=:pacientes_id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':apepat', $apepat);
    $statement->bindParam(':apemat', $apemat);
    $statement->bindParam(':sexo', $sexo);
    $statement->bindParam(':empresa', $empresa);
    $statement->bindParam(':fecha', $fecha);
    $statement->bindParam(':pacientes_id', $pacientes_id);
    $query_run = $statement->execute();

    if ($query_run) {
        $_SESSION['message'] = "Datos actualizados correctamente";
        header("Location: ../../View/pacientes_vistas/V_pacientes.php");
        exit(0);
    } else {
        $_SESSION['message'] = "No se pudieron actualizar";
        header("Location: ../../View/pacientes_vistas/V_pacientes.php");
        exit(0);
    }
}

//Consulta para eliminar paciente
if (isset($_POST['delete_paciente'])) {
    $pacientes_id = $_POST['delete_paciente'];

    $query = "DELETE FROM pacientes WHERE id=:pacientes_id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':pacientes_id', $pacientes_id);
    $query_run = $statement->execute();

    if ($query_run) {
        $_SESSION['message'] = "Datos eliminados correctamente";
        header("Location: ../../View/pacientes_vistas/V_pacientes.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Hubo un error al eliminar";
        header("Location: ../../View/pacientes_vistas/V_pacientes.php");
        exit(0);
    }
}
?>
