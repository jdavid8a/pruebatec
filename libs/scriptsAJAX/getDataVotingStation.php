<?php

include '../connect/connectionMySQL.php';
$connectionObject= new connectionMySQL();
//$sql=" SELECT * FROM  puntovotacion WHERE  idPuntoVotacioin=".$_POST['Id'] ;  
$sql="SELECT  p.idPuestoVotacion,p.nombre , p.direccion, dc.idDivisionPolitica AS  ciudad, dd.idDivisionPolitica as departamento,c.idComuna,b.idBarrio "
            . "FROM puestovotacion p "
           . " INNER JOIN barrio b ON (p.idBarrio=b.idBarrio)"
            . " INNER JOIN comuna c ON (b.idComuna=c.idComuna)"
            . " INNER JOIN divisionpolitica dc ON(dc.idDivisionPolitica=c.idDivisionPolitica)"
            . " INNER JOIN  divisionpolitica dd ON(c.idDivisionPolitica LIKE CONCAT(dd.idDivisionPolitica,'%') and dd.tipo='DE')"

            . " WHERE  idPuestoVotacion=".$_POST['id'] ;  
     

$resultSet=$connectionObject->executeSQL($sql);
$jsondata = array();
if($row=$connectionObject->nextItem($resultSet))
{
          
    echo $row['idPuestoVotacion'].':'.$row['nombre'].':'.$row['direccion'].':'.$row['ciudad'].':'.$row['departamento'].':'.$row['idComuna'].':'.$row['idBarrio'];
    
}

?>