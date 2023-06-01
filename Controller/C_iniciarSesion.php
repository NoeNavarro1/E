<?php

require('Model/Conexion.php');
if (empty($_POST['Btn-inicio'])) {
    if (empty($_POST['Usuario']) and empty($_POST['Contraseña']) and empty($_POST['Sucursal'])) {
        echo "Los campos estan Incompletos";
    } else {
        $usuario = $_POST('Usuario');
        $contraseña = $_POST('Contraseña');
        $sucursal = $_POST('Sucursal');
        $sql = $conexion->query("select * from users where Usuario = '$usuario' and Contraseña = '$contraseña' and Sucursal = '$sucursal' ");
        if ($datos = $sql -> fetch_object()) {
            header("location:View/V_menuPrincipal.php");
        } else {
            echo "Acesso denegado";
        }
        
    }
    
}

?>