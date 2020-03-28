<?php 

require_once 'dbconnect.php';

if($_GET["id"]){
	$id=$_GET["id"];

	$sql="DELETE FROM animals WHERE id=$id";

	if(mysqli_query($conn, $sql)){
		echo "success <br> <a href='admin.php'>Back to Home Page</a>";
	}else{
		echo "error";
	};
}
 $conn->close();

 ?>