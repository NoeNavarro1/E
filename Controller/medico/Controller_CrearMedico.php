<?php
include('../../Model/Conexion.php');
include("funciones.php");

//se verifica si el valor de la variable $_POST["operacion"] es "Crear"
if ($_POST["operacion"] == "Crear") {


    //se prepara una consulta SQL para insertar los datos del nuevo usuario en la tabla "usuarios" utilizando los valores proporcionados en el formulario.
    // se utilizan para indicar los valores que serán reemplazados en la consulta.
    $stmt = $conexion->prepare("INSERT INTO medicos(nombre , apellidos, cedula, telefono, email, especialidad, domicilio) VALUES(:nombre, :apellidos, :cedula, :telefono, :email, :especialidad, :domicilio)");

    //se pasan los valores correspondientes utilizando un array asociativo
    $resultado = $stmt->execute(
        array(
            ':nombre' => $_POST["nombre"],
            ':apellidos' => $_POST["apellidos"],
            ':cedula' => $_POST["cedula"],
            ':telefono' => $_POST["telefono"],
            ':email' => $_POST["email"],
            ':especialidad' => $_POST["especialidad"],
            ':domicilio' => $_POST["domicilio"],
        )

    );

    //se verifica si el resultado no está vacío y se muestra el mensaje "Registro creado" en caso afirmativo.
    if (!empty($resultado)) {
        echo "Registro creado con exito";
    }
}

//CODIGO DE EDITAR ACTUALIZADO Y CON LA MEJORA DE QUERER ACTUALIZAR CON IMAGEN INDEPENDIENTEMENTE DEL USUARIO
//se verifica si el valor de la variable $_POST["operacion"] es "Editar"
if ($_POST["operacion"] == "Editar") {

    //se prepara una consulta SQL para actualizar los datos del usuario en la tabla "usuarios". Se utiliza el método prepare() en la conexión $conexion
    $stmt = $conexion->prepare("UPDATE medicos SET nombre=:nombre, apellidos=:apellidos, cedula=:cedula, telefono=:telefono, email=:email, especialidad=:especialidad, domicilio=:domicilio WHERE id=:id");

    //se pasan los valores correspondientes utilizando un array asociativo
    $resultado = $stmt->execute(
        array(
            ':nombre' => $_POST["nombre"],
            ':apellidos' => $_POST["apellidos"],
            ':cedula' => $_POST["cedula"],
            ':telefono' => $_POST["telefono"],
            ':email' => $_POST["email"],
            ':especialidad' => $_POST["especialidad"],
            ':domicilio' => $_POST["domicilio"],
            ':id' => $_POST["id_medico"]
        )
    );

    //Si el resultado no está vacío, se muestra el mensaje "Registro actualizado".
    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}

?>

