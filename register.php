<?php session_start();
require 'bd/conexion_bd.php';

$obj = new BD_PDO();


if(isset($_POST['btnregistrar'])){
    
 function getRealIP() {
  if (!empty($_SERVER['HTTP_CLIENT_IP']))
    return $_SERVER['HTTP_CLIENT_IP'];
		
  if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    return $_SERVER['HTTP_X_FORWARDED_FOR'];
	
  return $_SERVER['REMOTE_ADDR'];
}
            
 

	$username =filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$ape =filter_var($_POST['ape'], FILTER_SANITIZE_STRING);
	$email =filter_var($_POST['email']  ,FILTER_SANITIZE_EMAIL); 
	$pass =filter_var($_POST['pass']  ,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
	$hashed_password = password_hash($pass,PASSWORD_DEFAULT);
$theRealIP =  getRealIP();

	$obj->Ejecutar_Instruccion("INSERT INTO `usuarios`(`nombre`,`apellidos`, `correo`, `contrasena`, `ip` , `privilegio`) VALUES ('$username','$ape','$email','$hashed_password','$theRealIP','Usuario')");

	echo '<script>window.location = "index.php"; </script>';

	$datos = $obj->Ejecutar_Instruccion("Select * from usuarios where correo = '$email';");

	if($datos != ""){

        @$_SESSION['id_usuario'] = $datos[0][0];
		@$_SESSION['nombre'] = $datos[0][1];
		@$_SESSION['ape'] = $datos[0][2];
		@$_SESSION['email'] = $datos[0][3];
		@$_SESSION['ip'] = $datos[0][5];
		@$_SESSION['privilegio'] = $datos[0][6];
		echo "<script>alert('Registro exitoso')</script>";
		
	}else{
		echo "<script>alert('Fallo en el registro')</script>";	}
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/mains.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="css/themify-icons.css">
    <title>Registrar</title>
     <link rel="icon" href="img/logo-cruz.png">
<!--LINK DE RECAPTCHA-->
<script src='https://www.google.com/recaptcha/api.js'></script>

<script>
    
    function mostrar(){
    var pass = document.getElementById('pass');
    if (pass.type==="password") {
        pass.type="text";
    }else{
        pass.type="password";
    }
        return true;
}

</script>    
</head>
<header>

</header>
<body style="background: #f6f5f7;">
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form action="register.php" method="post" id="frminsertar" name="frminsertar">
            <div class="col-6 col-12-xsmall" data-validate = "Ingresa la contraseña">
                <label for="demo-email">Nombre(s)</label>
                <input type="text"  name="username"  value="" />
            </div>
            <div class="col-6 col-12-xsmall">
                <label for="demo-name">Apellido(s)</label>
                <input type="text" name="ape" id="ape" />
            </div>
			<div class="col-6 col-12-xsmall">
                <label for="demo-name">Email</label>
                <input type="email" name="email" id="email" />
            </div>
			<div class="col-6 col-12-xsmall">
                <label for="demo-name">Contraseña</label>
                <input type="password" name="pass" id="pass" onblur="validaPass()" />
				
            </div>
            <div class="">
			<i name="cajita" onclick="mostrar()" class="ti-check-box"> Mostrar contraseña</i>
                </div>
			<button name="btnregistrar" id="btnregistrar">Registrar</button>

		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">	
			</div>
			<div class="overlay-panel overlay-right">
                <img src="img/logosc.png" style="height:auto; width:60%;"/>
				<h1>¿Ya tienes cuenta?</h1>
				<button  class="ghost" id="signIn"><a href="login.php"><i class="ti-arrow-left"></i>  Regresar</a></button>
                
			</div>
		</div>
	</div>
</div>
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>
</html>
<body>
	
</body>
</html>