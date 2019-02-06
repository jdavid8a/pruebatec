<?php
include("../Config.php");
if($_POST['txtUserId']!='')
{
$sql="UPDATE usuario SET "
        . " idTipoDocumento='".$_POST['cboDocType']."',"
        . " numeroDocumento='".$_POST['txtDocNum']."',"
        . " nombre='".$_POST['txtName']."',"
        . " apellidos='".$_POST['txtLastName']."',"
        . " fechaNacimiento='".$_POST['txtBirthday']."',"
        . " direccion='".$_POST['txtAddress']."',"
        . " idDivisionPolitica=".$_POST['cboCity'].","
        . " telefono='".$_POST['txtPhoneNumer']."',"        
        . " nickname='".$_POST['txtNickname']."',"
        . " password='".Core::encrypt(trim($_POST['txtPassword']))."',"
        . " modulo=".$_POST['txtPointAttention'].""
        . " WHERE idUsuario=".$_POST['txtUserId']."";
$resultSet= $conectionObject->executeSQL($sql);
$conectionObject->saveLog(Core::getRealIP(), 6,$_POST['txtUserId'],$_SESSION['userId']);
}



$msg='';
if($resultSet)
    $msg="Usuario modificado satisfactoriamete";
else
    $msg="Error al aplicar la transaccción";
echo '<script>'
. '         alert("'.$msg.'")
  location="'.URL.'admin/AddUser.php";
</script>';
?>