<?php
include 'libs/Config.php' ;
//echo $util->encrypt("123");
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
      <?php Layout::getHeadTarget()?>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>Bienvenido</h3>
			
                                
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        
                        <form action="#" id="FrmLogin" name="FrmLogin" method="POST">
                            <div class="form-group">
                                <label class="control-label" for="username">Cédula</label>
                                <input type="text" id="txtNickname" name="txtNickname" placeholder="Nickname" title="Por favor digite la cédula del usuario" required value="" name="username" id="username" class="form-control">
                                <span class="help-block small"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Contraseña</label>
                                <input type="password" id="txtPassword" name="txtPassword" title="Por favor ingrese la contraseña" placeholder="" required value=""  class="form-control">
                                
                            </div>
                            
                            <button class="btn btn-success btn-block loginbtn" onclick="sendLogin()">Iniciar sesión</button>
                            
                        
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p><?=CREDITS_FOOTER?></p>
			</div>
		</div>   
    </div>
   <?php
    Layout::getFooterTarget();
    ?>
</body>

</html>