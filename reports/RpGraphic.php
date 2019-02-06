<?php
include '../libs/Config.php' ;
$sessionObject->validate();

?>
<html>
<head>
<?php Layout::getHeadTarget()?>
    <link rel="stylesheet" href="../css/c3/c3.min.css">
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
                           <div class="row" align="center">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="charts-single-pro responsive-mg-b-30">
                                        <div class="alert-title">
                                            <h2>Votantes registrados</h2>
                                            
                                        </div>
                                        <div id="bar1-chart">
                                            <canvas id="barchart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                               
                               
                           </div>
                            <?php
                             include '../libs/tables/VotersCountList.php';
                            ?>
                            
                            
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
    <script src="../js/charts/Chart.js"></script>
    <script src="../js/charts/bar-chart.js"></script>
    
    <script src="../js/scriptJS/Voters.js"></script>
</body>

</html>
