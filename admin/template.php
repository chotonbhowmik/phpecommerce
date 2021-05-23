        <?php

        include("includes/header.php");
        include("class/db.php");
        ob_start();
        session_start();
        $adminId = $_SESSION['id'];
        $adminemail = $_SESSION['email'] ;
        if ( $adminId == null) {
          header("Location:index.php");
        }
        ?>

        <body>
        <body>
        <div class="fixed-button">
        <a href="https://codedthemes.com/item/gradient-able-admin-template" target="_blank" class="btn btn-md btn-primary">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
        </a>
        </div>
         <!-- Pre-loader start -->
        <div class="theme-loader">
          <div class="loader-track">
              <div class="loader-bar"></div>
          </div>
        </div>
        <!-- Pre-loader end -->
        <div id="pcoded" class="pcoded">
          <div class="pcoded-overlay-box"></div>
          <div class="pcoded-container navbar-wrapper">

              <?php

              include("includes/navbar.php");
              ?>
              <div class="pcoded-main-container">
                  <div class="pcoded-wrapper">
                      <?php
                      include("includes/sidenav.php");

                      ?>
                      <div class="pcoded-content">
                          <div class="pcoded-inner-content">
                              <div class="main-body">
                                  <div class="page-wrapper">

                                      <div class="page-body">
                                        

                                          <?php

                                          if ($views) {
                                           if ($views=="dashboard") {
                                             include("views/dashboardView.php");
                                           }
                                           elseif ($views=="addCat") {
                                             include("views/addCategoryView.php");
                                           }
                                           elseif ($views=="addProduct") {
                                             include("views/addProductView.php");
                                           }
                                           elseif ($views=="manageCat") {
                                             include("views/manageCategoryView.php");
                                           }
                                           elseif ($views=="manageProduct") {
                                             include("views/manageProductView.php");
                                           }
                                           elseif ($views=="manageUser") {
                                             include("views/manageUserView.php");
                                           }
                                          }



                                          ?>

        							


                                         

                                        
                                      </div>

                                      <div id="styleSelector">

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

         
        <?php  include("includes/script.php"); ?>