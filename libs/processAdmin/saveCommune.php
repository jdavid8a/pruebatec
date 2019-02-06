<?php
include("../Config.php");
if($_POST['txtCommuneId']!='')
{
$sql="UPDATE comuna SET "
        . " nombre='".$_POST['txtName']."',"
        . " idDivisionPolitica='".$_POST['cboCity']."' "
        . " WHERE idComuna=".$_POST['txtCommuneId']."";

$resultSet= $conectionObject->executeSQL($sql);
}
else
{
    $sql="INSERT INTO comuna(nombre,idDivisionPolitica ) VALUES"
        . " ('".$_POST['txtName']."',"
        . " '".$_POST['cboCity']."')";
        $resultSet= $conectionObject->executeSQL($sql);
}

$msg='';
if($resultSet)
    $msg="Comuna modificada satisfactoriamete";
else
    $msg="Error al aplicar la transaccción";
echo '<script>'
. '         alert("'.$msg.'")
  location="'.URL.'admin/ParamsManager.php";
</script>';
?>