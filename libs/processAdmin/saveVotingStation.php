<?php
include("../Config.php");
if($_POST['txtVotingStationId']!='')
{
$sql="UPDATE puestovotacion SET "
        . " nombre='".$_POST['txtName']."',"
        . " direccion='".$_POST['txtAddress']."',"
        . " idBarrio='".$_POST['cboNeighborhood']."' "
        . " WHERE idPuestoVotacion=".$_POST['txtVotingStationId']."";

$resultSet= $conectionObject->executeSQL($sql);
}
else
{
    $sql="INSERT INTO puestovotacion(nombre,direccion,idBarrio ) VALUES"
        . " ('".$_POST['txtName']."',"
        . " '".$_POST['txtAddress']."',"
        . " '".$_POST['cboNeighborhood']."')";
        $resultSet= $conectionObject->executeSQL($sql);
}

$msg='';
if($resultSet)
    $msg="puesto de votación modificado satisfactoriamete";
else
    $msg="Error al aplicar la transaccción";
echo '<script>'
. '         alert("'.$msg.'")
  location="'.URL.'admin/AddVotingStation.php";
</script>';
?>