<?php
session_start();
?>
<?php
    include "conexion.php";
    
    require 'bd/conexion_bd.php';

$obj = new BD_PDO();

    $email =$_POST['email'];
    $codigo =$_POST['codigo'];
    $res = $conexion->query("select * from usuarios 
        where correo='$email' 
        and codigo='$codigo' 
        ")or die($conexion->error);
    if( mysqli_num_rows($res) > 0 ){
        $conexion->query("update usuarios set confirmado = 'si' where correo = '$email' ");
        $datos = $obj->Ejecutar_Instruccion("Select * from usuarios where correo = '$email';");

	if($datos != ""){

        @$_SESSION['id_usuario'] = $datos[0][0];
		@$_SESSION['nombre'] = $datos[0][1];
		@$_SESSION['ape'] = $datos[0][2];
		@$_SESSION['email'] = $datos[0][3];
		@$_SESSION['ip'] = $datos[0][5];
		@$_SESSION['privilegio'] = $datos[0][6];
		echo "<script>alert('TODO CORRECTO')</script>";
        echo "<script>alert('¡Bienvenido!')</script>";

        echo '<script>window.location = "index.php"; </script>';
		
	}else{
		echo "<script>alert('Fallo en el registro')</script>";	}
    }else{
       echo "<script>alert('Codigo Invalido')</script>";
       echo '<script>window.location = "confirm.php?email='.$email.'"; </script>';
    }
?>