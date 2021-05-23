
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
      
      <?php

           if (isset($_GET['status'])) {

         $thePost = $_GET['status'];
         $sql = "SELECT * FROM product_info_ctg WHERE cat_id ='$thePost'";
            $allPost = mysqli_query($db, $sql);

            while ($row = mysqli_fetch_assoc($allPost)) {
            $cat_id          =  $row['cat_id'];
            $cat_name        =  $row['cat_name'];
           
                    ?>
    <!--Hero Section-->
                <div class="hero-section hero-background">
                    <h1 class="page-title"><?php echo $cat_name; ?></h1>
                </div>


                    <?php
               
            
                ?>


    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <?php
            $sql = "SELECT * FROM product_info_ctg WHERE cat_id ='$thePost'";
                        $allPost = mysqli_query($db, $sql);

                        while ($row = mysqli_fetch_assoc($allPost)) {
                        $cat_id          =  $row['cat_id'];
                        $cat_name        =  $row['cat_name'];
                       
                                ?>
            <ul>
               
                <li class="nav-item"><a href="index.php" class="permal-link">Home</a></li>
                
                <li class="nav-item"><span class="current-page"><?php echo $cat_name; ?></li>

            </ul>

                                <?php
                           
                        
                            ?>
        </nav>
    </div>

    <div class="container">
        <div class="page-contain category-page no-sidebar">
        <div class="container">
            <div class="row">

                <!-- Main content -->
                <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">

                   
                    <div class="product-category grid-style">


                        <div class="row">
                            <ul class="products-list">

                                <?php

                                   
                     $sql = "SELECT * FROM product_info_ctg WHERE cat_id ='$thePost'";
                        $allPost = mysqli_query($db, $sql);

                        while ($row = mysqli_fetch_assoc($allPost)) {

                        $pro_id          =  $row['pro_id'];
                        $pro_name        =  $row['pro_name'];
                        $pro_price       =  $row['pro_price'];
                        $pro_desc        =  $row['pro_desc'];
                        $pro_image       =  $row['pro_image'];
                        $pro_status      =  $row['pro_status'];
                        $cat_id          =  $row['cat_id'];
                        $cat_name             =  $row['cat_name'];
                       


                                ?>

                                <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                    <div class="contain-product layout-default">
                                        <div class="product-thumb">
                                            <a href="single_product.php?single=<?php echo $pro_id; ?>" class="link-to-product">
                                                <img src="admin/upload/<?php echo $pro_image; ?>" alt="dd" width="270" height="270" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <b class="categories"><?php echo $cat_name; ?></b>
                                            <h4 class="product-title"><a href="single_product.php?single=<?php echo $cat_id; ?>" class="pr-name"><?php echo $pro_name; ?></a></h4>
                                            <div class="price">
                                                <ins><span class="price-amount"><span class="currencySymbol">$</span><?php echo $pro_price; ?></span></ins>
                                                
                                            </div>
                                            <div class="shipping-info">
                                                <p class="shipping-day">3-Day Shipping</p>
                                                <p class="for-today">Pree Pickup Today</p>
                                            </div>
                                            <div class="slide-down-box">
                                                <p class="message">All products are carefully selected to ensure food safety.</p>
                                                <div class="buttons">
                                                    <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                    <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                    <a href="single_product.php?single=<?php echo $pro_id; ?>" class="btn compare-btn"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <?php
                            }
                             }
                         }
                        }
                            ?>
                               
                              

                            </ul>
                        </div>

                        <div class="biolife-panigations-block">
                            <ul class="panigation-contain">
                                <li><span class="current-page">1</span></li>
                                <li><a href="#" class="link-page">2</a></li>
                                <li><a href="#" class="link-page">3</a></li>
                                <li><span class="sep">....</span></li>
                                <li><a href="#" class="link-page">20</a></li>
                                <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
        
    </div>
   
           
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