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
    <title>Admin</title>
</head>
<body>
    <h1>Admin</h1>
    <?php
        
        echo "Tu ID es: ".$_SESSION['id_usuario'];
        echo "<br>";
        echo "Tu nombre de usuario es: ".$_SESSION['nombre']." ".$_SESSION['ape'];
        echo "<br>";
        echo "Tu email es: ".$_SESSION['email'];
        echo "<br>";
        echo "Tu privilegio es ".$_SESSION['privilegio'];
    ?>

</body>
</html>