<?php
include("../../libs/Config.php");
$dbObject= new connectionMySQL();

$sql="SELECT IdDivisionPolitica,Nombre FROM divisionpolitica WHERE tipo='CM'  AND IdDivisionPolitica LIKE '".$_POST['value']."%'";
$util->getSelectHTML($dbObject, $sql, 'cboCity', '','form-control',true,' onchange=" getCommuneByCity(this.value,\'dvCbocommune\',\'cboCommune\')"','Seleccione' )
?>
