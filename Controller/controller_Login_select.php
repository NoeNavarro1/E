<?php
require('Model/Conexion.php');

$sucursalesQuery = $conexion->query("SELECT Sucursal FROM sucursal");
    $sucursales = $sucursalesQuery->fetchAll(PDO::FETCH_COLUMN);
?>