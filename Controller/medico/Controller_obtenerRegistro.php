<?php
include('../../Model/Conexion.php');
include ("funciones.php");

if (isset($_POST["id_medico"])) { //Se verifica si se a enviado la variable "id_medico" por metodo POST.
    $salida = array(); //Se crea un arreglo vacio para almacenar los datos del medico.

    //Se prepara una consulta para seleccionar un registro de la tabla usuarios con el valor del id.
    $stmt = $conexion ->prepare("SELECT * FROM medicos WHERE id = '".$_POST["id_medico"]."' LIMIT 1");
    $stmt ->execute(); //se ejecuta la consulta
    $resultado = $stmt -> fetchAll(); //se obtienen todos los valores de la consulta  y se almacenan en la variable $resultado.
    foreach($resultado as $fila){
        //se itera sobre cada fila obtenida
        $salida["nombre"] = $fila["nombre"];
        $salida["apellidos"] = $fila["apellidos"];
        $salida["cedula"] = $fila["cedula"];
        $salida["telefono"] = $fila["telefono"];
        $salida["email"] = $fila["email"];
        $salida["especialidad"] = $fila["especialidad"];
        $salida["domicilio"] = $fila["domicilio"];

    }

    // Los datos del usuario se codifican en formato JSON utilizando json_encode() y se muestran en la salida mediante echo.
    echo json_encode($salida); 
}
?>
