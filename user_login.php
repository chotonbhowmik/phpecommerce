
<?php

include('admin/class/db.php');
ob_start();
session_start();

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
                            <form action="" name="frm-login" method="post">
                                <p class="form-row">
                                    <label for="user_email">Email Address:<span class="requite">*</span></label>
                                    <input type="email" id="fid-name" name="user_email" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="user_password">Password:<span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="user_password" value="" class="txt-input">
                                </p>
                               
                                    <input style="padding: 10px 40px;" name="user_login_btn" value="Login" class="btn btn-submit btn-bold" type="submit">
                                    
                                    <a style="padding-right:40px;" href="password_recover.php" class="link-to-help">Forgot your password</a>
                                
                            </form>

                         <?php

              if (isset($_POST['user_login_btn'])) {

              $user_email       = $_POST['user_email'];
             $user_password    = md5($_POST['user_password']);

              

               $query = "SELECT * FROM frontuser WHERE user_email ='$user_email' AND user_password = '$user_password'";
              $userlogin = mysqli_query($db, $query);
              
             $admininfo = mysqli_fetch_assoc($userlogin);
             if ($admininfo ) {
               header("Location:user_profile.php");
               $_SESSION['id'] = $admininfo['user_id '];
               $_SESSION['email'] = $admininfo['user_email'];
               $_SESSION['pass'] = $admininfo['user_password '];
               $_SESSION['name'] = $admininfo['user_name'];
             }
             else{
              echo "username or password invalid";
             }
}


                    ?>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">New Customer?</h4>
                                <p class="sub-title">Create an account with us and you’ll be able to:</p>
                                <ul class="lis">
                                    <li>Check out faster</li>
                                    <li>Save multiple shipping anddesses</li>
                                    <li>Access your order history</li>
                                    <li>Track new orders</li>
                                    <li>Save items to your Wishlist</li>
                                </ul>
                                <a href="user_register.php" class="btn btn-bold">Create an account</a>
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