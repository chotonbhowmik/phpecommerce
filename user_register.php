
<?php

include('admin/class/db.php');
ob_start();

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

                <div class="row">

                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                            <form action="" name="frm-register" method="post">
                                <p class="form-row">
                                    <label for="user_name">User Name:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="user_name" value="" class="txt-input">
                                </p>
                                
                                 <p class="form-row">
                                    <label for="user_firstname">First Name:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="user_firstname" value="" class="txt-input">
                                </p>

                                 <p class="form-row">
                                    <label for="user_lastname">Last Name:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="user_lastname" value="" class="txt-input">
                                </p> 
                                 <p class="form-row">
                                    <label for="user_email">Email Address:<span class="requite">*</span></label>
                                    <input type="email" id="fid-name" name="user_email" value="" class="txt-input">
                                </p>

                                <p class="form-row">
                                    <label for="user_password">Password:<span class="requite">*</span></label>
                                    <input type="password" id="fid-name" name="user_password" value="" class="txt-input">
                                </p>
                                 <p class="form-row">
                                    <label for="user_phone">Phone Number:<span class="requite">*</span></label>
                                    <input type="number" id="fid-name" name="user_phone" value="" class="txt-input">
                                </p>
                                <input type="hidden" name="user_roles" value="5">
                                
                                <input class="btn btn-block btn-submit btn-bold" value="Register" name="user_register" type="submit">
                            </form>

                            <?php
                            if (isset($_POST['user_register'])) {

                                $user_name        = $_POST['user_name'];
                                $user_firstname   = $_POST['user_firstname'];
                                $user_lastname    = $_POST['user_lastname'];
                                $user_email       = $_POST['user_email'];
                                $user_password    = md5($_POST['user_password']);
                                $user_phone       = $_POST['user_phone'];
                                $user_roles       = $_POST['user_roles'];

                                $query = "SELECT * FROM frontuser WHERE user_name = '$user_name' OR user_email = '$user_email'";
                                    $registerUser = mysqli_query($db, $query);
                                    $emailCount = mysqli_num_rows($registerUser);
                                    if ($emailCount == 1) {
                                      echo "This email already exist.";
                                    }
                                    else{

                                $sql = "INSERT INTO frontuser (user_name, user_firstname, user_lastname, user_email, user_password, user_phone,user_roles) VALUES ('$user_name', '$user_firstname', '$user_lastname', '$user_email', '$user_password', '$user_phone', 'user_roles')";

                                 $iquery = mysqli_query($db, $sql);
                                 if ( $iquery ) {
                                   header("Location:user_login.php");
                              }
                              else{
                                header("Location:user_register.php"); 
                              }
                          }


                                
                            }


                            ?>
                            <br>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">Alreay Have A Account?</h4>
                                
                                <ul class="lis">
                                    <li>Check out faster</li>
                                    <li>Save multiple shipping anddesses</li>
                                    <li>Access your order history</li>
                                    <li>Track new orders</li>
                                    <li>Save items to your Wishlist</li>
                                </ul>
                                <a href="user_login.php" class="btn btn-bold">Login to your Account</a>
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
   <?php

ob_end_flush();

?>
</body>

</html>