<?php 
    $conexion = new mysqli('localhost','alexita','A3R1lock','bdsecurelock');
    if($conexion-> connect_error){
        die('No se pudo conectar al servidor');
    }

?>