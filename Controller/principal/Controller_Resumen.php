<?php
require('../Model/Conexion.php');

//consulta para los usuarios
$query = $conexion->prepare("SELECT count(*) totalUsuarios FROM usuarios");
$query->execute();
$usuarios = $query->fetch(PDO::FETCH_ASSOC);
$totalUsuarios = $usuarios['totalUsuarios'];
echo json_encode($salida);

//consulta para los Pacientes
$query = $conexion->prepare("SELECT count(*) totalPacientes FROM pacientes");
$query->execute();
$pacientes = $query->fetch(PDO::FETCH_ASSOC);
$totalPacientes = $pacientes['totalPacientes'];
echo json_encode($salida);

//consulta para los doctores
$query = $conexion->prepare("SELECT count(*) totalMedicos FROM medicos");
$query->execute();
$medicos = $query->fetch(PDO::FETCH_ASSOC);
$totalMedicos = $medicos['totalMedicos'];
echo json_encode($salida);



//consulta para mostrar los nombres y apellidos de los paciente
$query = $conexion->prepare("SELECT nombre, apellidos from pacientes LIMIT 5");
$query->execute();
$datos_pacientes = $query->fetchAll(PDO::FETCH_ASSOC);
$datosT_pacientes = $datos_pacientes;
echo json_encode($salida);

//consulta para mostrar los nombres y apellidos de los doctores
$query = $conexion->prepare("SELECT nombre, apellidos from medicos LIMIT 5");
$query->execute();
$datos_medicos = $query->fetchAll(PDO::FETCH_ASSOC);
$datosT_medicos = $datos_medicos;
echo json_encode($salida);

//consulta para mostar nombre y apellidos de los usuarios 
$query = $conexion->prepare("SELECT nombre, apellidos from usuarios LIMIT 5");
$query->execute();
$datos_usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
$datosT_usuarios = $datos_usuarios;
?>