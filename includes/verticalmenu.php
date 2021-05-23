<div class="vertical-menu vertical-category-block">
    <div class="block-title">
        <span class="menu-icon">
            <span class="line-1"></span>
            <span class="line-2"></span>
            <span class="line-3"></span>
        </span>
        <span class="menu-title">All Category</span>
        <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
    </div>
    <div class="wrap-menu">
        <ul class="menu clone-main-menu">
            

                <?php

              $query = "SELECT * FROM category";
             $catNameToId = mysqli_query($db, $query);
             while ($row = mysqli_fetch_assoc($catNameToId)) {

                 $cat_id = $row['cat_id'];
                 $cat_name = $row['cat_name'];


                ?>
                <li class="menu-item menu-item-has-children has-megamenu">
                <a href="category.php?status=<?php echo $cat_id; ?>" class="menu-name" data-title="<?php  echo $cat_name;  ?>"><?php  echo $cat_name;  ?></a>
                </a>
            </li>

            <?php
            }

            ?>
        </ul>
    </div>
</div>