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
                                <li class="active"><a href="#description"  id="lkInformation">Comunas</a></li>
                                <li><a href="#userDataTab"  id="lkInformationB">Barrios</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    
                                                    <form action="" class="needsclick add-professors" method="post" id="FrmCommune">
                                                        <input name="txtCommuneId" id="txtCommuneId" type="hidden">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                
                                                                <div class="form-group col-lg-3"> 
                                                                    <label for="txtName">Nombre</label>
                                                                    <input name="txtName" id="txtName" type="text" class="form-control" placeholder="Nombre"  required="required"> 
                                                                </div>                                                                                                                                                                                                 
                                                           
                                                                <div class="form-group col-lg-3">
                                                                    <label for="cboDepartament">Departamento</label>
                                                                    <div id="dvDepartament"> 
                                                                    <?php
                                                                            $sql="SELECT idDivisionPolitica,nombre FROM divisionpolitica WHERE tipo='DE'";
                                                                            $util->getSelectHTML($conectionObject, $sql, "cboDepartament", '','form-control',false,  ' required="" onclick="getSelectCity(this.value,\'dvCity\')"')    ;
                                                                    ?>    
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="cboCity">Ciudad</label>
                                                                   <div  id="dvCity"> 
                                                                    <?php
                                                                            $sql="SELECT idDivisionPolitica,nombre FROM divisionpolitica WHERE tipo='CM'";
                                                                            $util->getSelectHTML($conectionObject, $sql, "cboCity", '','form-control',false,  ' required="" onclick="getSelectCity(this.value,\'dvCity\')"')    ;
                                                                    ?>  
                                                                   </div>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                   
                                                                        <button type="submit" class="btn btn-primary waves-effect waves-light" onClick="saveCommune()">Guardar</button>
                                                                   
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                           
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <?php
                                                                    include("../libs/tables/CommuneList.php");
                                                                   ?>
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                                <div class="product-tab-list tab-pane fade" id="userDataTab">
                                   
                                     <form action="" class="needsclick add-professors" method="post" id="FrmNeighborhood">
                                                        <input name="txtNeighborhoodId" id="txtNeighborhoodId" type="hidden">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                
                                                                <div class="form-group col-lg-3"> 
                                                                    <label for="txtNameNeighborhood">Nombre</label>
                                                                    <input name="txtNameNeighborhood" id="txtNameNeighborhood" type="text" class="form-control" placeholder="Nombre"  required="required"> 
                                                                </div>                                                                                                                                                                                                 
                                                           
                                                                <div class="form-group col-lg-3">
                                                                    <label for="cboDepartament">Departamento</label>
                                                                    <div id="dvDepartament"> 
                                                                    <?php
                                                                            $sql="SELECT idDivisionPolitica,nombre FROM divisionpolitica WHERE tipo='DE'";
                                                                            $util->getSelectHTML($conectionObject, $sql, "cboDepartamentNeighborhood", '','form-control',false,  ' required="" onclick="getSelectCity(this.value,\'dvCity\')"')    ;
                                                                    ?>    
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="cboCity">Ciudad</label>
                                                                   <div  id="dvCity"> 
                                                                    <?php
                                                                            $sql="SELECT idDivisionPolitica,nombre FROM divisionpolitica WHERE tipo='CM'";
                                                                            $util->getSelectHTML($conectionObject, $sql, "cboCityNeighborhood", '','form-control',false,  ' required=""   onchange=" getCommuneByCity(this.value,\'dvCbocommune\',\'cboCommune\')"')    ;
                                                                    ?>  
                                                                   </div>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                    <label for="cboCity">Comuna</label>
                                                                   <div  id="dvCbocommune"> 
                                                                    <?php
                                                                            $sql="SELECT idComuna,nombre FROM comuna ";
                                                                            $util->getSelectHTML($conectionObject, $sql, "cboCommune", '','form-control',false,  ' required=""  ')    ;
                                                                    ?>  
                                                                   </div>
                                                                </div>
                                                                <div class="form-group col-lg-3">
                                                                   
                                                                        <button type="submit" class="btn btn-primary waves-effect waves-light" onClick="saveNeighborhood()">Guardar</button>
                                                                   
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                           
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <?php
                                                                    include("../libs/tables/NeighborhoodList.php");
                                                                   ?>
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                    </form>
                                    
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
