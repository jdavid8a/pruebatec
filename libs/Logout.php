<?php
session_start();
include './Config.php';
session_destroy();
echo '<script language="javascript" >
	 			//alert("Sesion terminada");
				location="'.URL.'FrmLogin.php";
	 				</script>';
?>