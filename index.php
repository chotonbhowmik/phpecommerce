
<?php

include('admin/class/db.php');

?>
<?php

include('includes/head.php');

?>
<body class="biolife-body">
    <?php

include('includes/preloader.php');

?>

    

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-03">
        <?php

include('includes/topheader.php');

?>
 <?php

include('includes/middleheader.php');

?>
<?php

include('includes/bootomheader.php');

?>
       
      
    </header>

    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">

            <!--Block 01: Main Slide-->
           <?php

include('includes/homeslider.php');

?>
  

            <!--Block 02: Banners-->
              <?php

include('includes/bannerslider.php');

?>


            <!--Block 03: Product Tabs-->
            
   <?php

include('includes/homerelatedproduct.php');

?>
        

            <!--Block 06: Products-->
            <div class="Product-box sm-margin-top-96px">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-5 col-sm-6">
                            <?php include('includes/dealoftheday.php'); ?>
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-6">
                            <?php include('includes/topratedproduct.php'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <!--Block 07: Brands-->
            
<?php include('includes/brands.php'); ?>
           
        </div>
    </div>

    <!-- FOOTER -->
   <?php include('includes/footer.php'); ?>

    <!--Footer For Mobile-->
    <?php include('includes/mobilefooter.php'); ?>

     <?php include('includes/mobileglobalblock.php'); ?>

   

    <!-- Scroll Top Button -->
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

   <?php include('includes/script.php'); ?>
</body>

</html>