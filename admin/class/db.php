
<?php
 $db = mysqli_connect("localhost","root","","ecom");
 if ($db) {
 	// echo "database connected ";
 }
 else{
 	die("database not connected ".mysqli_error($db));
 }



?>