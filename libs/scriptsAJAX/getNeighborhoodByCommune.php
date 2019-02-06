<?php
include("../../libs/Config.php");
$dbObject= new connectionMySQL();

$sql="SELECT idBarrio,nombre FROM barrio WHERE  idComuna ='".$_POST['value']."'";

$util->getSelectHTML($dbObject, $sql, 'cboNeighborhood', '','form-control',true,' onchange=" getVotingStationByNeighborhood(this.value,\'dvCboVotingStationNeighborhood\')" ','Seleccione' )
?>
