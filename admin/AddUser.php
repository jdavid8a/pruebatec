<?php
include '../libs/Config.php' ;
$sessionObject->validate();

?>
<html>
<head>
<?php Layout::getHeadTarget()?>
</head>
<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Left menu area -->
<?php Layout::getLeftMenu()?>   
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <?php    Layout::getStartMenu();    ?>
            <!-- Mobile Menu start -->
            <?php            
                Layout::getLeftMenuMobile(); 
            ?>
            <!-- Mobile Menu end -->
           
        </div>
        
        <br/>
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description"  id="lkInformation">Información Básica</a></li>
                                <li><a href="#userDataTab">Lista de Usuarios</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    
                                                    <form action="" class="needsclick add-professors"  enctype="multipart/form-data" method="post" id="FrmUser">
                                                        <input name="txtDocumentNumberId" id="txtDocumentNumberId" type="hidden">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                
                                                                <div class="form-group">                                                                   
                                                                    <label for="txtDocumentNumber">Cédula</label>
                                                                    <input name="txtDocumentNumber" id="txtDocumentNumber" type="Number" class="form-control" placeholder="Cédula"  required="required"> 
                                                                </div>  
                                                                
                                                                <div class="form-group">      
                                                                     <label for="txtName">Nombres</label>
                                                                    <input name="txtName" id="txtName" type="text" maxlength="50" class="form-control" placeholder="Nombres"  required="required"> 
                                                                </div>  
                                                                  
                                                                <div class="form-group">        
                                                                    <label for="txtLastName">Apellidos</label>
                                                                    <input name="txtLastName" id="txtLastName" type="text"  maxlength="50"  class="form-control" placeholder="Apellidos"  required="required"> 
                                                                </div>  
                                                                <div class="form-group">        
                                                                    <label for="txtLastName">Foto</label>
                                                                    <input name="flPic" id="flPic" type="file"   class="form-control" placeholder="Apellidos"  required> 
                                                                </div>  
                                                            </div>
                                                        
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="txtCellPhone">Teléfono</label>
                                                                    <input name="txtCellPhone" id="txtCellPhone" type="text" class="form-control" placeholder="teléfono"  required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="txtPassword">Contraseña</label>
                                                                    <input name="txtPassword" id="txtPassword" type="password" class="form-control" placeholder="Contraseña"  required="">
                                                                </div>
                                                               <div class="form-group">
                                                                    <label for="txtPasswordAgaint">Confirme Contraseña</label>
                                                                    <input name="txtPasswordAgaint"  id="txtPasswordAgaint" type="password" class="form-control" placeholder="Ingrese la contraseña nuevamente"  required="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cboUserProfile">Perfil de usuario</label>
                                                                    <?php
                                                                        $sql="SELECT * FROM  perfilusuario ";
                                                                         $util->getSelectHTML($conectionObject, $sql, "cboUserProfile", '2','form-control',false,  '  required="" ','')    ;
                                                                    ?>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="button" class="btn btn-primary waves-effect waves-light" onClick="saveUser()">Guardar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                                <div class="product-tab-list tab-pane fade" id="userDataTab">
                                   <?php
                                    include("../libs/tables/UserDataList.php");
                                   
                                   ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p><?=CREDITS_FOOTER?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    Layout::getFooterTarget();
    ?>
    <script src="../js/scriptJS/Users.js"></script>
</body>

</html>
