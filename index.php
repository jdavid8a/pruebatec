<?php
include 'libs/Config.php' ;
$sessionObject->validate();

?>
<!doctype html>
<html >

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
            <br/><br/><br/> <br/>
            
        </div>
         <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="product-payment-inner-st">
                              <br/><br/><br/> <br/>
                              <?php
                              ?>
                              
                              <center><p><h3>Bienvenido  </h3></p></center>
                          </div>
                      </div>
                       
                </div>
            </div>
         </div>    
       
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    Layout::getFooterTarget();
    ?>
</body>

</html>