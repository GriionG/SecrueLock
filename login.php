<?php
session_start();
?>
<!DOCTYPE html>
<?php

//verificar el password verify
//verificar el 
require 'bd/conexion_bd.php';

$obj = new BD_PDO();
    /*
    if(isset($_GET["d1"]) && isset($_GET["d2"]) && isset($_GET["d3"]) && isset($_GET["d4"]) && isset($_GET["d5"]) ) {
		
		$id = $_GET["d1"];
        $nombres = $_GET["d2"];
        $apellido = $_GET["d3"];
        $imagen = $_GET["d4"];
        $email = $_GET["d5"];
        
        $datos = $obj->Ejecutar_Instruccion("Select * from usuarios_redes where email='$email';");
    
	} */ 

	if(isset($_POST['btnlog'])){
        $email=filter_var($_POST['email']  ,FILTER_SANITIZE_EMAIL);
        $pass =filter_var($_POST['pass']);
		
		$datos = $obj->Ejecutar_Instruccion("Select * from usuarios where correo='$email';");
		
		@$hashed_password = $datos[0][4];
		$ip = $datos[0][5];
        $recaptcha = $_POST["g-recaptcha-response"];
         $url = 'https://www.google.com/recaptcha/api/siteverify';
         $data = array(
         'secret' => '6LdIIygkAAAAABdsJ8SK55hn7Q_eq20mqrN0_TPl',
         'response' => $recaptcha
         );
         $options = array(
         'http' => array (
         'method' => 'POST',
         'content' => http_build_query($data)
         )
         );
         	
         @$context = stream_context_create($options);
         @$verify = file_get_contents($url, false, $context);
         @$captcha_success = json_decode($verify);
        
         if ($captcha_success->success) {
        // echo 'Se envía el formulario';
        
        function getRealIP() {
  if (!empty($_SERVER['HTTP_CLIENT_IP']))
    return $_SERVER['HTTP_CLIENT_IP'];
		
  if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    return $_SERVER['HTTP_X_FORWARDED_FOR'];
	
  return $_SERVER['REMOTE_ADDR'];
}
    	      
    	     if($ip != $_SERVER['REMOTE_ADDR']){
				@$to = $datos[0][3];
				@$subject="Se abrio sesion desde una direccion diferente";
				@$message =" Estan entrando desde esta direccion IP ".$_SERVER['REMOTE_ADDR'];
		  
				@$t=@mail($to,$subject,$message);
		  
				if($t){
				   echo'<script>alert("Se ha abierto la sesion desde otra direccion diferente a la habitual")</script>';
				} else{
				   echo '<script>alert("No se puede enviar el correo ,intente mas tarde ")</script>';
				}
			}
			else if ($ip = $_SERVER['REMOTE_ADDR']){
			   echo '<script>alert("Todo en orden")</script>';
			}

        		if (password_verify($pass, $hashed_password)) {
            		echo "<script>alert('Bienvenido')</script>";
            		@$_SESSION['id_usuario'] = $datos[0][0];
        			@$_SESSION['nombre'] = $datos[0][1];
        			@$_SESSION['ape'] = $datos[0][2];
        			@$_SESSION['email'] = $datos[0][3];
        			@$_SESSION['privilegio'] = $datos[0][6];
            		
            		echo '<script>window.location = "index.php"; </script>';
            	}
            	else{
            		echo "<script>alert('Correo incorrecto o Contraseña incorrecta')</script>";
            	}
        
         }
         
         else {
         //echo 'No se envía el formulario';                
                echo '<script>alert("favor de completar el captcha")</script>';
         }

		

	}
	?>

<?php
        /*
        echo "Tu ID es: ".$_SESSION['id_usuario'];
        echo "<br>";
        echo "Tu nombre de usuario es: ".$_SESSION['nombre']." ".$_SESSION['ape'];
        echo "<br>";
        echo "Tu email es: ".$_SESSION['email'];
        echo "<br>";
        echo "Tu privilegio es ".$_SESSION['privilegio']; */
        
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/mains.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="css/themify-icons.css">
    <title>login</title>
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
		<form action="login.php" method="post" id="frmlogear" name="frmlogear">
			<div class="social-container">
				<a href="#" class="social"><i class="ti-facebook"></i></a>
				<a href="#" class="social"><i class="ti-google"></i></a>
				<a href="#" class="social"><i class="ti-linkedin"></i></a>
			</div>
            <div class="col-6 col-12-xsmall" data-validate = "Ingresa la contraseña">
                <label for="demo-email">Correo</label>
                <input type="email"  name="email"  value="" />
            </div>
            <div class="col-6 col-12-xsmall">
                <label for="demo-name">Contraseña</label>
                <input type="password" name="pass" id="pass" onblur="validaPass()" />
            </div>
            <div class="">
	        <i name="cajita" onclick="mostrar()" class="ti-check-box"> Mostrar contraseña</i>
                </div>
			<button name="btnlog" id="btnlog">Entrar</button>

			<div class="col-6 col-12-xsmall"  style="display:flex; justify-content: center;">
						<div class="g-recaptcha" data-sitekey="6LdIIygkAAAAABeZwU5sAofL3ZJiCduQw4aTSWgX"></div>
					</div>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">	
			</div>
			<div class="overlay-panel overlay-right">
                <img src="img/logosc.png" style="height:auto; width:60%;"/>
				<h1>¿No tienes una cuenta?</h1>
				<button  class="ghost" id="signIn"><a href="register.php">Registrarse  <i class="ti-arrow-right"></i></button></a>
                
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

