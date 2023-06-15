<?php
require('Model/Conexion.php');

$sucursalesQuery = $conexion->query("SELECT Sucursal FROM usuarios");
    $sucursales = $sucursalesQuery->fetchAll(PDO::FETCH_COLUMN);
?>