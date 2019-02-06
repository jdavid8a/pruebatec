<?php
include("../Config.php");
if($_POST['txtVoterId']!='')
{
$sql="UPDATE votante SET "
        . " cedula='".$_POST['txtDocumentNumber']."',"
        . " nombre='".$_POST['txtName']."',"
        . " apellidos='".$_POST['txtLastName']."',"
        . " telefono='".$_POST['txtPhone']."',"
        . " direccion='".$_POST['txtAddress']."',"
        . " idDivisionPolitica='".$_POST['cboCity']."',"
        . " idBarrio='".$_POST['cboNeighborhood']."',"
        . " idLider='".$_SESSION['userId']."',"
        . " idPuestoVotacion='".$_POST['cboVotingStation']."',"
        . " mesa='".$_POST['txtTableNumber']."'"
        . " WHERE cedula=".$_POST['txtVoterId']."";

$resultSet= $conectionObject->executeSQL($sql);
}
else
{
    $sql="INSERT INTO votante(cedula,nombre,apellidos,telefono,direccion,idDivisionPolitica,idBarrio,idLider,idPuestoVotacion,mesa ) VALUES"
        . " ('".$_POST['txtDocumentNumber']."',"
        . " '".$_POST['txtName']."',"
        . " '".$_POST['txtLastName']."',"
        . " '".$_POST['txtPhone']."',"
        . " '".$_POST['txtAddress']."',"
        . " '".$_POST['cboCity']."',"
        . " '".$_POST['cboNeighborhood']."',"
        . " ".$_SESSION['userId'].","
        . " ".$_POST['cboVotingStation'].","
        . " ".$_POST['txtTableNumber'].""
            . ")";
        $resultSet= $conectionObject->executeSQL($sql);
}
$msg='';
if($resultSet)
    $msg="Votante modificada satisfactoriamete";
else
    $msg="Error al aplicar la transaccción";
echo '<script>'
. '         alert("'.$msg.'")
  location="'.URL.'admin/AddVoter.php";
</script>';
?>