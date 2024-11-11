<?php
        require 'bd/conexion_bd.php'; //Pa que este conectado con el archvivo que conecta con la base de tatos 
    //crear objeto 
        $obj = new BD_PDO();

        
        $id_medicamento = $_POST['txtid_medicamento'];
        $medicamento = $_POST['txtmedicamento'];
        $fecha_cad = $_POST['txtfecha_cad'];
        $stock = $_POST['txtstock'];

         $result = $obj->Ejecutar_Instruccion("update medicamento set medicamento = '$medicamento', fecha_cad = '$fecha_cad', stock = '$stock' WHERE id_medicamento = '$id_medicamento'");

         echo '<script>window.location = "Inventario.php"; </script>';
?>