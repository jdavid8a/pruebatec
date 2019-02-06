<?php
include("../../libs/Config.php");
$dbObject= new connectionMySQL();

$sql="SELECT idPuestoVotacion, nombre FROM puestovotacion WHERE  idBarrio ='".$_POST['value']."'";

$util->getSelectHTML($dbObject, $sql, 'cboVotingStation', '','form-control',true,' ','Seleccione' )
?>
