
<?php
        require 'bd/conexion_bd.php'; //Pa que este conectado con el archvivo que conecta con la base de tatos 
    //crear objeto 
        $obj = new BD_PDO();

        $id_botiquin = $_POST['txtid_botiquines'];
        $localizacion = $_POST['txtlocalizacion'];
        $estado = $_POST['txtestado'];

         $result = $obj->Ejecutar_Instruccion("update botiquines set localizacion = '$localizacion', estado = '$estado' WHERE id_botiquines = '$id_botiquin'");

         echo '<script>window.location = "botiquin.php"; </script>';
?>