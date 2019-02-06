<?php
include("../Config.php");
if($_POST['txtDocumentNumberId']!='')
{
$sql="UPDATE usuario SET "
        . " cedula='".$_POST['txtDocumentNumber']."',"
        . " nombres='".$_POST['txtName']."',"
        . " apellidos='".$_POST['txtLastName']."',"
        . " celular='".$_POST['txtCellPhone']."',"        
        .(($_POST['txtPassword']!='')? (" passwordLogin='".substr(md5($_POST['txtPassword']),1,20)."',"):'')
        . " idPerfilUsuario=".$_POST['cboUserProfile'].""
        . " WHERE cedula=".$_POST['txtDocumentNumberId']."";

$resultSet= $conectionObject->executeSQL($sql);
}
else
{
    $result=$util-> uploadImage("../../pics","flPic");
    if($result!='0' and $result!='-1' and $result!='-2'){        
    
        $sql="INSERT INTO usuario(cedula,nombres,apellidos,celular,passwordLogin,idPerfilUsuario,foto) VALUES"
            . " (".$_POST['txtDocumentNumber'].","
            . " '".$_POST['txtName']."',"
            . " '".$_POST['txtLastName']."',"
            . " '".$_POST['txtCellPhone']."',"
            . " '".substr(md5($_POST['txtPassword']),1,20)."',"
            . " ".$_POST['cboUserProfile'].","
            . " '".$result."'"
            . ")";
            $resultSet= $conectionObject->executeSQL($sql);
    }
    
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