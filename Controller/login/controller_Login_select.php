<?php
require('Model/Conexion.php');

$sucursalesQuery = $conexion->query("SELECT Sucursal FROM sucursal ORDER BY `Sucursal` DESC ");
    $sucursales = $sucursalesQuery->fetchAll(PDO::FETCH_COLUMN);
?>