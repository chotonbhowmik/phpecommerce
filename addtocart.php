
<?php
session_start();
include('admin/class/db.php');
if (isset($_POST['addtocart'])) {

    if (isset($_SESSION['cart'])) {

       $products_name = array_column($_SESSION['cart'], 'pro_name');
       if (in_array($_POST['pro_name'], $products_name)) {
           echo " 
           <script>
            alert('This Product Already Added');

           </script>
           ";
       }
else{

        $count = count($_SESSION['cart']);

        $_SESSION['cart'][$count]= array(
         
         'pro_name' => $_POST['pro_name'],
         'pro_price' => $_POST['pro_price'],
         'pro_image' => $_POST['pro_image'],
         'quantity'   => 1,
     );
        
}
        
    }else{
        $_SESSION['cart'][0] = array(
         
         'pro_name' => $_POST['pro_name'],
         'pro_price' => $_POST['pro_price'],
         'pro_image' => $_POST['pro_image'],
         'quantity'   => 1,

        );
        
    }
}
if (isset($_POST['removeproduct'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
       if ($value['pro_name'] == $_POST['remove_pro_name'] ) {
           unset($_SESSION['cart'][$key]);
           $_SESSION['cart'] == array_values($_SESSION['cart']);
       }
    }
}

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
            
     <div class="container">

       <br>
        <div class="shopping-cart-container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Your cart items</h3>
                            <form class="shopping-cart-form" action="#" method="post">
                                <table class="shop_table cart-form">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Action</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        <?php if (isset($_SESSION['cart'])) { 
                                            $subtotal = 0;
                                            $total_product = 0;

                                            foreach ($_SESSION['cart'] as $key => $value)
                                             {
                                                $subtotal = $subtotal + $value['pro_price'];
                                            $total_product++;

                                       
                                            
                                         ?>
                                    <tr class="cart_item">
                                        <td class="product-thumbnail" data-title="Product Name">
                                            <a class="prd-thumb" href="#">
                                                <figure><img width="113" height="113" src="admin/upload/<?php echo $value['pro_image']; ?>" alt="shipping cart"></figure>
                                            </a>
                                            <a class="prd-name" href="#"><?php echo $value['pro_name']; ?></a>
                                           
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $value['pro_price']; ?></span></ins>
                                                
                                            </div>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <form action="" method="POST">
                                                <input type="hidden" name="remove_pro_name" value="<?php echo $value['pro_name']; ?>">
                                                <input type="submit" name="removeproduct" value="Remove Product" class="btn btn-warning">
                                                
                                            </form>
                                        </td>
                                        <td class="product-subtotal" data-title="Total">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                                <del><span class="price-amount"><span class="currencySymbol">£</span>95.00</span></del>
                                            </div>
                                        </td>
                                    </tr>
                                <?php  }
                                 }else
                                 {
                                    echo "Ýour Cart Is Empty";
                                 }
                                ?>
                                    
                                    <tr class="cart_item wrap-buttons">
                                        <td class="wrap-btn-control" colspan="4">
                                            <a class="btn back-to-shop">Back to Shop</a>
                                            <button class="btn btn-update" type="submit" disabled>update</button>
                                            <button class="btn btn-clear" type="reset">clear all</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            <div class="shpcart-subtotal-block">
                                <div class="subtotal-line">
                                    <b class="stt-name">Subtotal <span class="sub">(<?php echo $total_product.'item'; ?> )</span></b>
                                    <span class="stt-price">£<?php echo $subtotal; ?></span>
                                </div>
                                <div class="subtotal-line">
                                    <b class="stt-name">Shipping</b>
                                    <span class="stt-price">£0.00</span>
                                </div>
                                <div class="tax-fee">
                                    <p class="title">Est. Taxes & Fees</p>
                                    <p class="desc">Based on 56789</p>
                                </div>
                                <div class="btn-checkout">
                                    <a href="#" class="btn checkout">Check out</a>
                                </div>
                                <div class="biolife-progress-bar">
                                    <table>
                                        <tr>
                                            <td class="first-position">
                                                <span class="index">$0</span>
                                            </td>
                                            <td class="mid-position">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="last-position">
                                                <span class="index">$99</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <p class="pickup-info"><b>Free Pickup</b> is available as soon as today More about shipping and pickup</p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
         
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