<h4 style="padding-bottom: 50px;" > Add Product</h4>

<form class="form" action="" method="POST" enctype="multipart/form-data" >


		<div class="form-group">
        <label for="pro_name">Product Name</label>
        
            <input type="text" class="form-control" name="pro_name">
        </div>

        <div class="form-group">
        <label for="pro_price">Product Price</label>
        
            <input type="number" class="form-control" name="pro_price">
        </div>


        <div class="form-group">
        <label for="pro_desc">Product Description</label>
        
          <textarea class="form-control" name="pro_desc" rows="5"></textarea>
        </div>

         <div class="form-group">
        <label for="pro_category">Product Category</label>
        
           <select name="pro_category" class="form-control">
           	<option>Please Select a Product Category</option>
           	<?php

           	$query = "SELECT * FROM category WHERE cat_status = 1";
                $primary_category = mysqli_query($db, $query);
                while ($row  = mysqli_fetch_assoc($primary_category)) {

                    $editPrimaryCategoryId   =  $row['cat_id'];
                    $cat_name =  $row['cat_name'];

           	?>
           	<option value="<?php echo $editPrimaryCategoryId; ?>"><?php echo $cat_name; ?></option>
           	 <?php
           	}

           	?>
           	
           </select>
        </div>

        <div class="form-group">
        <label for="pro_image">Product Image</label>
        
          <input type="file" class="form-control" name="pro_image">
        </div>

        <div class="form-group">
        <label for="pro_status">Product Status</label>
        
           <select name="pro_status" class="form-control">
           	<option value="1">Published</option>
           	<option value="0">UnPublished</option>
           	
           	
           </select>
        </div>

        <input type="submit" name="pro_btn" value="Add Product" class="btn btn-primary btn-block">

	
</form>

 <?php
              //Add new Product
          if (isset($_POST['pro_btn'])) {

              $pro_name         =   $_POST['pro_name'];
              $pro_price        =   $_POST['pro_price'];
              $pro_desc         =   $_POST['pro_desc'];
              $pro_category     =   $_POST['pro_category'];
              $pro_image_name   =   $_FILES['pro_image']['name'];
              $pro_image_size   =   $_FILES['pro_image']['size'];
              $pro_tmp_name     =   $_FILES['pro_image']['tmp_name'];
              $pro_image_extension = pathinfo($pro_image_name, PATHINFO_EXTENSION);   
              $pro_status       =   $_POST['pro_status'];

              if ($pro_image_extension == 'jpg' or $pro_image_extension == 'png' or $pro_image_extension == 'jpeg') {

              	if ($pro_image_size <= 2097152) {
              		

              		  $sql = "INSERT INTO products(pro_name,pro_price,pro_desc,pro_category,pro_image,pro_status) VALUES('$pro_name', '$pro_price','$pro_desc','$pro_category','$pro_image_name','$pro_status')";
              		  if (mysqli_query($db, $sql)) {
              		  	

              		  	move_uploaded_file($pro_tmp_name, 'upload/'.$pro_image_name);
              		  	header("Location:manageProduct.php");

              		  }
              	}
              	else{
              		echo "Image size is too large.";
              	}
              	
              }
              else{
              	echo "Please upload jpg,png,jpeg image";
              }




              }

              ?>