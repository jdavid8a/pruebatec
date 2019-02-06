<?php
include("Config.php");
$sessionObject->login($_POST['txtNickname'],$_POST['txtPassword']);
error_reporting(0);
?>


<html>
<head>
<title>::</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<center>
  <p><br /><br />
  </p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p></p><br />
    <br /><br /><br /><br />
    Cargando un momento por favor...<br />
    <br />
    <input type="image" name="loader" id="loader" src="../../img/loader.gif" />
  </p>
  </p>
</center>
</body>
</html>