<?php
        require 'bd/conexion_bd.php'; 
        //crear objeto 
        $obj = new BD_PDO();

        $id_usuario = $_POST['txtid_usuario'];
        $nombre = $_POST['txtnombre'];
        $apellidos = $_POST['txtapellidos'];
        $correo = $_POST['txtcorreo'];
        $contrasena = $_POST['txtcontrasena'];
        $privilegio = $_POST['selprivilegio'];
        $huella = $_POST['selhuella'];

         $result = $obj->Ejecutar_Instruccion("UPDATE `usuarios` SET `nombre` = '$nombre', `apellidos` = '$apellidos', `correo` = '$correo', `privilegio` = '$privilegio', `numero_huella` = '$huella' WHERE `usuarios`.`id_usuario` = $id_usuario;");

         echo '<script>window.location = "Usuarios.php"; </script>';
?>