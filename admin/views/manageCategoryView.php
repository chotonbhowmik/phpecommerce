<h2 style="padding-bottom: 20px;"> Manage Category</h2>

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
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                	 <?php
                       $sql = "SELECT * FROM category";
                       $allCat = mysqli_query($db, $sql);
                       $i = 0;

                       while ($row = mysqli_fetch_assoc($allCat)) {
                       $cat_id      =    $row['cat_id'];
                       $cat_name   =    $row['cat_name'];
                       $cat_desc   =    $row['cat_desc'];
                       $cat_status   =    $row['cat_status'];
                      
                       $i++;

                       ?>
                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $cat_name; ?></td>
                        <td><?php echo $cat_desc; ?></td>
                        <td><?php 
                        if ($cat_status == 1) {
                        	echo "Published";
                        }else{
                        	echo "Unpublished";
                        }

                        ?></td>
                        <td>
                        	<a class="btn btn-success btn-sm" href="?update=<?php echo $cat_id; ?>">Update</a>
                        	<a class="btn btn-danger btn-sm" href="?delete=<?php echo $cat_id; ?>">Delete</a>
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
</div>
<?php
  //delete category query

     if ( isset( $_GET['delete'] ) ) {
          $delete_id = $_GET['delete'];
          

          $sql = "DELETE FROM category WHERE cat_id = '$delete_id' ";
         
          $delete_query = mysqli_query($db, $sql);
          
          if ( $delete_query ) { 
            header("Location: manageCat.php");
          }
          else{
            die("delete failed" .mysqli_error($db));
          }

     }

  ?>

  <?php
               if (isset($_GET['update'])) {

                 $editId = $_GET['update'];
                 $sql = "SELECT * FROM category WHERE cat_id = '$editId'";
                 $editCat = mysqli_query($db, $sql);
                  while ($row = mysqli_fetch_assoc($editCat)) {
                       $cat_id      =    $row['cat_id'];
                       $cat_name   =    $row['cat_name'];
                       $cat_desc   =    $row['cat_desc'];
                       $cat_status   =    $row['cat_status'];
                   ?>

					<div class="card">
					    <div class="card-header">
							<form action="" method="POST">

					    <div class="form-group">
					        
					            <input hidden type="text" class="form-control" name="cat_id" value="<?php echo $cat_id ; ?>">
					        </div>
							<div class="form-group">
					        <label for="cat_name">Category Name</label>
					        
					            <input type="text" class="form-control" name="cat_name" value="<?php echo $cat_name; ?>">
					        </div>


							<div class="form-group">
					           <label for="cat_desc">Category Description</label>
					             <textarea class="form-control" name="cat_desc" rows="5"><?php echo $cat_desc; ?></textarea>
					        </div>

					        <div class="form-group">
					        <label for="cat_status">Category Status</label>
					        
					           <select name="cat_status" class="form-control">
					           	<option value="1" <?php if( $cat_status == 1){
					                    echo 'selected'; } ?>>Published</option>
					           	<option value="0" <?php if( $cat_status == 0){
					                    echo 'selected'; } ?>>UnPublished</option>
					           	
					           	
					           </select>
					        </div>
					         
					                 <div class="form-group">
					                
					                <input type="submit" name="updateCategory" value="Save Changes" class="btn btn-block btn-primary btn-flat">
					                
					              </div>


					       
					    
						
							</form>


		<?php
			}
		}
			?>
			 <?php
             //update category info
                    if (isset($_POST['updateCategory'])) {
                      $cat_name            = $_POST['cat_name'];
                      $cat_desc            = $_POST['cat_desc'];
                      $cat_status          = $_POST['cat_status'];
                      $updateId            = $_POST['cat_id'];
                     
                      $sql = "UPDATE category SET cat_name='$cat_name', cat_desc='$cat_desc', cat_status='$cat_status' WHERE cat_id = '$updateId '";

                         $updateSuccess = mysqli_query($db, $sql);
                        if ($updateSuccess) {
                          header("Location:manageCat.php");
                        }
                        else{
                          die("database not connected ".mysqli_error($db));
                        }

                              }
                          
                       ?>
</div>
</div>

