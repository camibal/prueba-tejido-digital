<?php
include_once '../config/conexion.php';

$result = $conexion->query("SELECT * FROM datos");
$count = $result->rowCount();

echo "0" . $count;