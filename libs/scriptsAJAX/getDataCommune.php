<?php
include '../connect/connectionMySQL.php';
$connectionObject= new connectionMySQL();
$sql="SELECT  p.idComuna,p.nombre , dc.idDivisionPolitica AS  ciudad, dd.idDivisionPolitica as departamento "
            . "FROM comuna p INNER JOIN"
            . " divisionpolitica dc ON(dc.idDivisionPolitica=p.idDivisionPolitica)"
            . " INNER JOIN  divisionpolitica dd ON(p.idDivisionPolitica LIKE CONCAT(dd.idDivisionPolitica,'%') and dd.tipo='DE')"
            . " WHERE  idComuna=".$_POST['id'] ;  
$resultSet=$connectionObject->executeSQL($sql);
$jsondata = array();
if($row=$connectionObject->nextItem($resultSet))
{          
    echo $row['idComuna'].':'.$row['nombre'].':'.$row['ciudad'].':'.$row['departamento'];    
}

?>