<?php
include '../connect/connectionMySQL.php';
$connectionObject= new connectionMySQL();
$sql="SELECT v.direccion,v.telefono,v.nombre, v.apellidos,v.cedula,p.idPuestoVotacion,v.mesa,p.nombre as nombrePuesto , "
            . "v.direccion, dc.idDivisionPolitica AS  ciudad,"
            . " dd.idDivisionPolitica as departamento,c.idComuna, c. nombre as nombreComuna,b.idBarrio  "
            . "FROM votante v "
            . " INNER JOIN puestovotacion p ON(v.idPuestoVotacion=p.idPuestoVotacion)"
            . " INNER JOIN barrio b ON (p.idBarrio=b.idBarrio)"
            . " INNER JOIN comuna c ON (b.idComuna=c.idComuna)"
            . " INNER JOIN divisionpolitica dc ON(dc.idDivisionPolitica=c.idDivisionPolitica)"
            . " INNER JOIN  divisionpolitica dd ON(c.idDivisionPolitica LIKE CONCAT(dd.idDivisionPolitica,'%') and dd.tipo='DE')"

            . " WHERE  cedula=".$_POST['Id'] ;
$resultSet=$connectionObject->executeSQL($sql);
$jsondata = array();
if($row=$connectionObject->nextItem($resultSet))
{          
    echo $row['cedula'].':'.$row['nombre'].':'.$row['apellidos'].':'.$row['telefono'].':'.$row['direccion'].':'.$row['departamento']
            .':'.$row['ciudad'].':'.$row['idComuna'].':'.$row['idBarrio'].':'.$row['idPuestoVotacion'].':'.$row['mesa'];    
}

?>