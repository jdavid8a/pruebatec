<?php
include '../connect/connectionMySQL.php';
$connectionObject= new connectionMySQL();
$sql="SELECT  p.idBarrio,p.nombre , dc.idDivisionPolitica AS  ciudad, dd.idDivisionPolitica as departamento,p.idComuna "
            . "FROM barrio p INNER JOIN comuna c ON(c.idComuna=p.idComuna)"
            . " INNER JOIN divisionpolitica dc ON(dc.idDivisionPolitica=c.idDivisionPolitica)"
            . " INNER JOIN  divisionpolitica dd ON(c.idDivisionPolitica LIKE CONCAT(dd.idDivisionPolitica,'%') and dd.tipo='DE')"
            . " WHERE  idBarrio=".$_POST['id'] ;  
$resultSet=$connectionObject->executeSQL($sql);
$jsondata = array();
if($row=$connectionObject->nextItem($resultSet))
{          
    echo $row['idBarrio'].':'.$row['idComuna'].':'.$row['nombre'].':'.$row['ciudad'].':'.$row['departamento'];    
}

?>