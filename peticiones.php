<?php

    require 'bd/conexion_bd.php';

    $obj = new BD_PDO();

    @$huella = $_POST['h'];
    @$inventario = $_POST['i'];
    
    $delimitador = "*";
    @$inventariado = explode($delimitador, $inventario);

    @$codigo = $inventariado[1];
    @$cantidad = $inventariado[0];
    
    $usuario = $obj->Ejecutar_Instruccion("Select * from usuarios where numero_huella = '$huella'");
    
    $medicamento = $obj->Ejecutar_Instruccion("Select * from medicamento where id_medicamento = '$codigo'");
    
    var_dump($huella);
    var_dump($usuario[0][0]);
    var_dump($cantidad);//CANTIDAD
    var_dump($codigo);//CODIGO
    
    if(isset($_POST['i']))
    {
        if($medicamento[0][3] >= $inventariado[0]){
            $restamedicamento = $medicamento[0][3] - $cantidad;
            var_dump($restamedicamento);
            
            $obj->Ejecutar_Instruccion("Insert into movimientos(cantidad,fecha,fk_medicamento,fk_usuario,fk_localizacion) values('".$cantidad."',DATE_FORMAT(NOW( ), '%d/%m/%Y'),'".$codigo."','".$usuario[0][0]."',3)");
            $obj->Ejecutar_Instruccion("Update medicamento set stock = '$restamedicamento' where id_medicamento = '$codigo'");
        }
        else{
            echo "No es posible realizar dicha peticion";       
        }
    }
?>