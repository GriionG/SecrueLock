<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    require 'bd/conexion_bd.php';

    $obj = new BD_PDO();
    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Verificador</h1>
    <br><br><br>

    <form action="verificador.php" method="post">
    <p>email</p>
    <input type="text" name="email">
    <br><br>
    <p>contraseña</p>
    <input type="text" name="pass">
    <br><br>
    <button name="btnlog">Verificar</button>
    </form>
    <?php

    if(isset($_POST['btnlog'])){
        $email = $_POST['email'];
        $pass=$_POST['pass'];

        $datos = $obj->Ejecutar_Instruccion("Select * from usuarios where email='$email';");

        var_dump($datos[0][3]);

        $hashed_password = password_hash($pass,PASSWORD_DEFAULT);
        var_dump($hashed_password);

        if (password_verify($pass, $hashed_password)) {
    		echo "Contraseña correcta";
    	}
    	else{
    		echo "contraseña incorrecta";
    	}
        
    }

    ?>
</body>
</html>