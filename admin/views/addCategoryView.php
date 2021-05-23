      <?php

        
        include("class/db.php");
        ob_start();
        
       
        ?>
		<h2 style="padding-bottom: 20px;">Add Category</h2>

		<form action="" method="POST">


		<div class="form-group">
        <label for="cat_name">Category Name</label>
        
            <input type="text" class="form-control" name="cat_name">
        </div>


		<div class="form-group">
           <label for="cat_desc">Category Description</label>
             <textarea class="form-control" name="cat_desc" rows="5"></textarea>
        </div>

        <div class="form-group">
        <label for="cat_status">Category Status</label>
        
           <select name="cat_status" class="form-control">
           	<option value="1">Published</option>
           	<option value="0">UnPublished</option>
           	
           	
           </select>
        </div>

        <input type="submit" name="cat_btn" value="Add Category" class="btn btn-primary">


       
    
	
		</form>
		  <?php
              //register new category
          if (isset($_POST['cat_btn'])) {

              $cat_name      =   $_POST['cat_name'];
              $cat_desc      =   $_POST['cat_desc'];
              $cat_status    =   $_POST['cat_status'];
              

              $sql = "INSERT INTO category (cat_name, cat_desc, cat_status) VALUES ('$cat_name', '$cat_desc', '$cat_status')";
              $AddCategory = mysqli_query($db, $sql);
              if ($AddCategory) { 
              
              header("Location:manageCat.php");

              }
              else{
               
                die("database not connected ".mysqli_error($db));
              }
          }

          ?>