<?php
@session_start();
class ClassSession
{
	private $userid;
	private $userlogin;
	private $username;
	Private $usertype;

	
	public function getUserId()
	{
		return $_SESSION['userid'];
	}
	
	public function getUserName()
	{
		return $_SESSION['userid'];
	}
	public function getUserType()
	{
		return $_SESSION['userProfileId'];
	}
	
	
	public function login($user,$psw )
	{
		session_destroy();
		session_set_cookie_params(0);
		/*ini_set("session.cookie_lifetime","86400");
		ini_set("session.gc_maxlifetime","86400");*/
               session_start();
		
		$conectionObject= new connectionMySQL();
                
		
                $sql="SELECT u.* FROM  usuario u  "
                        . "WHERE cedula='".trim($user)."'   AND passwordLogin='". substr(md5($psw),1,20)."'";
               
		$resultset=$conectionObject->executeSQL($sql);
		
		if($row=$conectionObject->nextItem($resultset))
		{	 
                                      
                        $_SESSION['userId']=$row['cedula'];
			$_SESSION['userLastName']=$row["apellidos"];
			$_SESSION['userFirstName']=$row['nombres'];
			$_SESSION['userFullName']=$row['nombres'].' '.$row["apellidos"];	                        
			$_SESSION['userCellPhone']=$row['celular'];
			$_SESSION['userProfileId']=$row['idPerfilUsuario'];
			
                         
				echo "<script language='javascript'>
						location='../index.php'
						</script>";

				
			
		}
		else
			echo "<script language='javascript'>
					alert('Usuario y/o contrase\u00f1a invalida');
				        location='../FrmLogin.php'
				</script>";
		
	}
	
	public function validate()
	{
		if(!isset($_SESSION["userId"]) )
		{
                    $url=explode('/',$_SERVER['SCRIPT_NAME']);
                    $url=$url[count($url)-1];
                   
			//header("location: ".BASE_URL."FrmLogin.php");=
                    if($url!='index.php')
			echo "<script language='javascript'>
					alert('Debes iniciar sesión para acceder ');
						location='".URL."FrmLogin.php';
				</script>";
                    else
                        echo "<script language='javascript'>
					location='".URL."FrmLogin.php';
				</script>";
		}
	}
	
	public function closeSession()
	{
		session_destroy();
		echo "<script language='javascript'>
			location='".BASE_URL."FrmLogin.php'
			</script>";
	}
	
	
}

?>