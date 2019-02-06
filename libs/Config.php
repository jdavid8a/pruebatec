<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
error_reporting(E_ALL);
$URL =$_SERVER['SERVER_NAME'];
define('PORT', $_SERVER["SERVER_PORT"]);
define("TITLE_PAGES",".:: PRUEBA TECNICA::.");
if( PORT != "") $URL.=':'.PORT;

define('BASE_URL', root_path('pruebatec'));
define('BASE_URL_REPORTS', '');
define('URL', "http://".$URL.'/pruebatec/');
define('URL_LIBS_JS',BASE_URL."js/");
define('HOME_PAGE',URL."index.php");
define("CREDITS_FOOTER",'Copyright © 2018. All rights reserved. Template by Colorlib');

include 'Core.php';
include 'HeadTarget.php';
include 'Layout.php';
include 'connect/connectionMySQL.php';
include 'ClassSession.php';
$sessionObject=new ClassSession();
$conectionObject= new connectionMySQL();
$util= new Core();


 function root_path($dir){ 
    $this_directory = getcwd(); 
    $archivos = scandir($this_directory); 
    $atras = ""; 
    $cuenta = 0; 
    while (true){ 
        foreach($archivos as $actual){ 
            //echo "<br>". $actual;
            if ($actual == $dir){ 
                if ($cuenta == 0) 
                return "./"; 
                return $atras; 
               
            } 
        } 
        $cuenta++; 
        $atras = $atras . "../"; 
        $archivos = scandir($atras); 

    } 
} 

/*

if(isset($_SESSION))
{
	 switch($_SESSION['userProfileId'])
                                                                        {
                                                                            case 1: $sqlSuc="SELECT s.idSucursal,s.nombre "
                                                                                    . "FROM sucursal s INNER JOIN empresa e ON(e.idEmpresa=s.idEmpresa) "
                                                                                    . "INNER JOIN divisionpolitica dp ON (dp.idDivisionPolitica=s.idDivisionPolitica) WHERE s.idEstado=1";
                                                                                break;
                                                                            case 2: $sqlSuc="SELECT s.idSucursal,s.nombre "
                                                                                    . " FROM sucursal s INNER JOIN empresa e ON(e.idEmpresa=s.idEmpresa) INNER JOIN divisionpolitica dp ON (dp.idDivisionPolitica=s.idDivisionPolitica)"
                                                                                    . " WHERE s.idEstado=1 AND  s. idEmpresa=".$_SESSION['userCompanyId'];
                                                                                break;
                                                                            case 3: $sqlSuc="SELECT s.idSucursal,s.nombre  "
                                                                                    . "FROM sucursal s INNER JOIN empresa e ON(e.idEmpresa=s.idEmpresa) INNER JOIN divisionpolitica dp ON (dp.idDivisionPolitica=s.idDivisionPolitica)"
                                                                                    . " WHERE  s.idEstado=1 AND s. idSucursal=".$_SESSION['userOfficeId'];
                                                                                break;

                                                                        }
}*/
?>
