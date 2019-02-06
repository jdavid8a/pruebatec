<?php
include("../../libs/Config.php");
$dbObject= new connectionMySQL();

$sql="SELECT idComuna,nombre FROM comuna WHERE  IdDivisionPolitica ='".$_POST['value']."'";

$util->getSelectHTML($dbObject, $sql, 'cboCommune', '','form-control',true,' onchange=" getNeighborhoodByCommune(this.value,\'dvCboNeighborhood\')"','Seleccione' )
?>
