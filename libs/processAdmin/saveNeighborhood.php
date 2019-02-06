<?php
include("../Config.php");
if($_POST['txtNeighborhoodId']!='')
{
$sql="UPDATE barrio SET "
        . " nombre='".$_POST['txtNameNeighborhood']."',"
        . " idComuna='".$_POST['cboCommune']."'"
        . " WHERE idBarrio=".$_POST['txtNeighborhoodId']."";

$resultSet= $conectionObject->executeSQL($sql);
}
else
{
    $sql="INSERT INTO barrio(nombre,idComuna ) VALUES"
        . " ('".$_POST['txtNameNeighborhood']."',"
        . " '".$_POST['cboCommune']."')";
        $resultSet= $conectionObject->executeSQL($sql);
}

$msg='';
if($resultSet)
    $msg="Barrio modificada satisfactoriamete";
else
    $msg="Error al aplicar la transaccción";
echo '<script>'
. '         alert("'.$msg.'")
  location="'.URL.'admin/ParamsManager.php";
</script>';
?>