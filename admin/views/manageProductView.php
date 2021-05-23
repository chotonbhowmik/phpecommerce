<h4> Manage Product</h4>

<div class="card">
    <div class="card-header">
        
        <div class="card-header-right">
			<ul class="list-unstyled card-option">
				<li><i class="fa fa-chevron-left"></i></li>
				<li><i class="fa fa-window-maximize full-card"></i></li>
				<li><i class="fa fa-minus minimize-card"></i></li>
				<li><i class="fa fa-refresh reload-card"></i></li>
				<li><i class="fa fa-times close-card"></i></li>
			</ul>
		</div>

    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Description</th>
                        <th>Image</th>
                        <th>Category Name</th>
                        <th>Product Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                       $sql = "SELECT * FROM product_info_ctg";
                       $allCat = mysqli_query($db, $sql);
                       $i = 0;

                       while ($row = mysqli_fetch_assoc($allCat)) {

                       $pro_id       =    $row['pro_id'];
                       $pro_name     =    $row['pro_name'];
                       $pro_price    =    $row['pro_price'];
                       $pro_desc     =    $row['pro_desc'];
                       $pro_image    =    $row['pro_image'];
                       $pro_status   =    $row['pro_status'];
                       $cat_name     =    $row['cat_name'];
                       
                      
                       $i++;

                       ?>
                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $pro_name; ?></td>
                        <td><?php echo $pro_price; ?></td>
                        <td><?php echo $pro_desc; ?></td>
                        <td > <img style="height: 40px;" src="upload/<?php echo $pro_image; ?>"> </td>
                        <td><?php 
                        if ($pro_status == 1) {
                        	echo "Published";
                        }else{
                        	echo "Unpublished";
                        }

                        ?></td>
                        <td><?php echo $cat_name; ?></td>
                        
                        <td>
                        	<a class="btn btn-success btn-sm" href="?update=<?php echo $pro_id; ?>">Update</a>
                        	<a class="btn btn-danger btn-sm" href="?delete=<?php echo $pro_id; ?>">Delete</a>
                        </td>
                    </tr>
                  
             <?php
                }
                ?>                   
                   
                </tbody>
            </table>
        </div>
    </div>
</div>



  <?php

    if (isset($_GET['delete'])) {
           $deleteId = $_GET['delete'];
       

          $deleteImageSQL = "SELECT * FROM products WHERE pro_id ='$deleteId'";
                  $data = mysqli_query($db, $deleteImageSQL);
                  while ($row = mysqli_fetch_assoc($data)) {
                    $existingImage = $row['pro_image'];
                  }
                  if (!empty($existingImage)) {
                    unlink('upload/'.$existingImage);
                  }
                  
                  $sql = "DELETE FROM products WHERE pro_id ='$deleteId'";
                  $deletePostData = mysqli_query($db, $sql);
                  if ($deletePostData) {
                    header("Location:manageProduct.php");
                  }
                  else{
                    die("Mysqli query failed".mysqli_error($db));
                   
                 }
          
        }

  ?>


  <?php
               if (isset($_GET['update'])) {

                 $editId = $_GET['update'];
                 $sql = "SELECT * FROM products WHERE pro_id = '$editId'";
                 $editPro = mysqli_query($db, $sql);
                  while ($row = mysqli_fetch_assoc($editPro)) {
                       $pro_id       =    $row['pro_id'];
                       $pro_name     =    $row['pro_name'];
                       $pro_price    =    $row['pro_price'];
                       $pro_desc     =    $row['pro_desc'];
                       $pro_image    =    $row['pro_image'];
                       $pro_status   =    $row['pro_status'];
                       
                      

                   ?>

                         <div class="card">
					    <div class="card-header">
							<form action="" method="POST" enctype="multipart/form-data">

					    <div class="form-group">
					        
					            <input hidden type="text" class="form-control" name="pro_id" value="<?php echo $pro_id ; ?>">
					        </div>
							<div class="form-group">
					        <label for="pro_name">Category Name</label>
					        
					            <input type="text" class="form-control" name="pro_name" value="<?php echo $pro_name; ?>">
					        </div>
					        <div class="form-group">
					        <label for="pro_price">Product Price</label>
					        
					            <input type="number" class="form-control" name="pro_price" value="<?php echo $pro_price; ?>">
					        </div>


							<div class="form-group">
					           <label for="pro_desc">Product Description</label>
					             <textarea class="form-control" name="pro_desc" rows="5"><?php echo $pro_desc; ?></textarea>
					        </div>

					         <div class="form-group">
                            <label>Upload Post Thumbnil</label>
                            <?php
                              if (!empty($pro_image)) { ?>
                                <img style="height: 30px;"src="upload/<?php echo $pro_image; ?>" class="form-image">
                                 
                             <?php  }
                              else{
                                echo "No image Uploaded";
                              }


                            ?>
                            <input type="file" name="pro_image" class="form-control">
                            
                          </div>


					        <div class="form-group">
					        <label for="pro_status">Product Status</label>
					        
					           <select name="pro_status" class="form-control">
					           	<option value="1" <?php if( $pro_status == 1){
					                    echo 'selected'; } ?>>Published</option>
					           	<option value="0" <?php if( $pro_status == 0){
					                    echo 'selected'; } ?>>UnPublished</option>
					           	
					           	
					           </select>
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
                
                <input type="submit" name="updateProduct" value="Update Product" class="btn btn-block btn-primary btn-flat">
                
              </div>


       
    
	
		</form>

		<?php
			}
		}
			?>

			<?php
             //update product info
                    if (isset($_POST['updateProduct'])) {
                       $productId        =    $_POST['pro_id'];
                       $pro_name     =    $_POST['pro_name'];
                       $pro_price    =    $_POST['pro_price'];
                       $pro_desc     =    $_POST['pro_desc'];
                      
                   $pro_image_name   =   $_FILES['pro_image']['name'];
              $pro_image_size   =   $_FILES['pro_image']['size'];
              $pro_tmp_name     =   $_FILES['pro_image']['tmp_name'];
              $pro_image_extension = pathinfo($pro_image_name, PATHINFO_EXTENSION);   
              $pro_status       =   $_POST['pro_status'];

              if ($pro_image_extension == 'jpg' or $pro_image_extension == 'png' or $pro_image_extension == 'jpeg') {

                if ($pro_image_size <= 2097152) {
                  

                      $sql = "UPDATE products SET pro_name='$pro_name', pro_price='$pro_price', pro_desc='$pro_desc', pro_image='$pro_image_name',pro_status='$pro_status' WHERE pro_id = '$productId'";
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

						</div>
						</div>

