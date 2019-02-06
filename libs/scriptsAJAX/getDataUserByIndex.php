<?php

include '../connect/connectionMySQL.php';
$connectionObject= new connectionMySQL();
$sql=" SELECT * FROM  usuario WHERE  cedula=".$_POST['userId'] ;  

$resultSet=$connectionObject->executeSQL($sql);
$jsondata = array();
if($row=$connectionObject->nextItem($resultSet))
{
          
    echo $row['cedula'].':'.$row['nombres'].':'.$row['apellidos'].':'.$row['celular'].':'.$row['idPerfilUsuario'];   
    
}

?>