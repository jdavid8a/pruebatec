<?php
include '../connect/connectionMySQL.php';
$connectionObject= new connectionMySQL();
$sql="SELECT count(*) as cantidad, CONCAT(u.nombres,' ',u.apellidos) AS lider 
            FROM votante v INNER JOIN usuario u on (u.cedula=v.idLider)  GROUP BY v.idLider"           ;
$resultSet=$connectionObject->executeSQL($sql);
$count = array();
$name = array();
while($row=$connectionObject->nextItem($resultSet))
{          
   $count[]=$row['cantidad'];
   $name[]=$row['lider'];
}
$stringCount= implode(":", $count);
$stringName=implode(":",$name);
echo $stringBuffer=$stringCount.';'.$stringName;
?>