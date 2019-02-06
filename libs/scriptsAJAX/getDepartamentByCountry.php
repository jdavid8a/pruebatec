<?php
include("../../libs/Config.php");
$dbObject= new connectionMySQL();

$sql="SELECT IdDivisionPolitica,Nombre FROM divisionpolitica "
        . " WHERE tipo='DE'  AND IdDivisionPolitica LIKE '".$_POST['value']."%' ";
$util->getSelectHTML($dbObject, $sql, 'cboDepartament', '','form-control',true,' required="" onclick="getSelectCity(this.value,\'dvCity\')" ','Seleccione' )
?>
