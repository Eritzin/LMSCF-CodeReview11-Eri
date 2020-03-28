<?php 
ob_start();
session_start();
require_once'dbconnect.php';

if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){
  header("Location:index.php");
  exit;
}

if(isset($_SESSION["user"])){
  header("Location:home.php");
  exit;
}
$res = mysqli_query($conn,"SELECT * FROM users WHERE userId=".$_SESSION['admin']);
$resAni = mysqli_query($conn,"SELECT * FROM animals");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<style>
		header{
			text-align:center;
			margin: 10px;
			}
         
          #title{
          		display:inline;
          }
          #card{
          	 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
          	 margin: 5px;

          }
    
        .table {
            table-layout: fixed;
            overflow-wrap: break-word;
            word-wrap: break-word;
           
        }

       

	</style>
</head>
<body>
	<header>
     Welcome to Admin Panel
		<nav class="nav nav-pills flex-column flex-sm-row">
			<a class="flex-sm-fill text-sm-center nav-link active" href="home.php">Home</a>
			<a class="flex-sm-fill text-sm-center nav-link" href="general.php">Small and Big Animals</a>
			<a class="flex-sm-fill text-sm-center nav-link" href="senior.php">Senior Animals</a>
			<a class="flex-sm-fill text-sm-center nav-link " href="logout.php?logout" >Logout</a>
		</nav>
 
	</header>
	<h3>Animal List</h3>
   <ul class="nav nav-tabs">
    <li class="nav-item">
    <a class="nav-link" href="create.php">Add a animal</a>
    </li>
  </ul>
<div class="table-responsive-xl">
   <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Category</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>      
      <th scope="col">Image URL</th>
      <th scope="col">Description</th>
      <th scope="col">Hobbies</th>
      <th scope="col">Website</th>
      <th scope="col">Age</th>
      <th scope="col">Adopted date</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    
        <?php
    include ("dbconnect.php");

     $sql = "SELECT * FROM animals";
             
     $result = mysqli_query($conn, $sql);
       $conn->close();

     if($result->num_rows == 0){
      echo "No result";
     }elseif($result->num_rows == 1){
      $row = $result->fetch_assoc();
      echo "<tr><th scope=\"row\">".$row["id"]."</th><td>".$row["category"] ."</td> <td>" . $row["name"] . "</td> <td> " . $row["zipcode"] . " " . $row["city"]. " " . $row["address"]. "</td> <td> " .$value["image"]."</td> <td> " . $row["description"]. "</td> <td> " . $row["hobbies"]. "</td> <td> " . $row["website"]. "</td> <td> " . $row["age"]. "</td> <td> " . $row["available_date"]."</td><td><a href='update.php?id=".$row["id"]."'>Update</a><br><br><a href='delete.php?id=".$row["id"]."'>Delete</a></td></tr>";
     }else{
      $rows = $result->fetch_all(MYSQLI_ASSOC);
      foreach($rows as $key => $value){
       echo "<tr><th scope=\"row\">".$value["id"]."</th><td>".$value["category"] ."</td> <td>" . $value["name"] . "</td> <td> " . $value["zipcode"] . " " . $value["city"]. " " . $value["address"]. "</td> <td> " .mb_strimwidth( $value["image"], 0, 30, '…', 'UTF-8' )."</td> <td> " .$value["description"]. "</td> <td> " . $value["hobbies"]. "</td> <td> " .mb_strimwidth( $value["website"], 0, 30, '…', 'UTF-8' ). "</td> <td> " .$value["age"]. "</td> <td> " .$value["available_date"]."</td><td><a href='update.php?id=".$value["id"]."'>Update</a><br><br><a href='delete.php?id=".$value["id"]."'>Delete</a></td></tr>";
      }
     };
/*. "<a href='update.php?id=".$value["media_id"]."'>Update</a> <a href='delete.php?id=".$value["media_id"]."'>Delete</a><br>"*/
  ?>

  </tbody>
</table>
</div>
</body>
</html>