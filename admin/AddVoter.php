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
                                <li><a href="#userDataTab">Lista de votantes</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    
                                                    <form action="" class="needsclick add-professors" method="post" id="FrmVoter">
                                                        <input name="txtVoterId" id="txtVoterId" type="hidden">
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
                                                                    <label for="txtPhone">Teléfono</label>
                                                                    <input name="txtPhone" id="txtPhone" type="text"  maxlength="50" class="form-control" placeholder="Cédula"  required="required"> 
                                                                </div>
                                                               <div class="form-group">    
                                                                    <label for="txtAddress">Dirección</label>
                                                                    <input name="txtAddress" id="txtAddress" type="text"  maxlength="100" class="form-control" placeholder="Dirección"  required="required"> 
                                                                </div>
                                                            </div>
                                                        
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="cboDepartament">Departamento</label>
                                                                    <div id="dvDepartament"> 
                                                                    <?php
                                                                            $sql="SELECT idDivisionPolitica,nombre FROM divisionpolitica WHERE tipo='DE'";
                                                                            $util->getSelectHTML($conectionObject, $sql, "cboDepartament", '','form-control',false,  ' required="" onclick="getSelectCity(this.value,\'dvCity\')"')    ;
                                                                    ?>    
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cboCity">Ciudad</label>
                                                                   <div  id="dvCity"> 
                                                                    <?php
                                                                            $sql="SELECT idDivisionPolitica,nombre FROM divisionpolitica WHERE tipo='CM'";
                                                                            $util->getSelectHTML($conectionObject, $sql, "cboCity", '','form-control',false,  ' required="" onclick="getSelectCity(this.value,\'dvCity\')"')    ;
                                                                    ?>  
                                                                   </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cboCity">Comuna</label>
                                                                   <div  id="dvCbocommune"> 
                                                                    <?php
                                                                            $sql="SELECT idComuna,nombre FROM comuna ";
                                                                            $util->getSelectHTML($conectionObject, $sql, "cboCommune", '','form-control',false,  ' required="" onchange=" getNeighborhoodByCommune(this.value,\'dvCboNeighborhood\')"   ')    ;
                                                                    ?>  
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cboCity">Barrio</label>
                                                                   <div  id="dvCboNeighborhood"> 
                                                                    <?php
                                                                            $sql="SELECT -1,'Seleccione la comuna'  ";
                                                                            $util->getSelectHTML($conectionObject, $sql, "cboNeighborhood", '','form-control',false,  ' required="" ')    ;
                                                                    ?>  
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="cboCity">Puesto de votación</label>
                                                                   <div  id="dvCboVotingStationNeighborhood"> 
                                                                    <?php
                                                                            $sql="SELECT -1,'Seleccione el barrio' ";
                                                                            $util->getSelectHTML($conectionObject, $sql, "CboVotingStationNeighborhood", '','form-control',false,  ' required="" ')    ;
                                                                    ?>  
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">    
                                                                    <label for="txttableNumber">Número de mesa</label>
                                                                    <input name="txtTableNumber" id="txtTableNumber" type="Number" class="form-control" placeholder="número de mesa"  required="required"> 
                                                                </div>  
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="button" class="btn btn-primary waves-effect waves-light" onClick="saveVoter()">Guardar</button>
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
                                    include("../libs/tables/VotersList.php");
                                   
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
    <script src="../js/scriptJS/Voters.js"></script>
</body>

</html>
