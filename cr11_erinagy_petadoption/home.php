<?php 
ob_start();
session_start();
require_once'dbconnect.php';
if(!isset($_SESSION['admin']) &&!isset($_SESSION['user'])){
	header("Location:index.php");
	exit;
}
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
         #contents{
         	width: 1400px;
         }
          #title{
          		display:inline;
          }
          #card{
          	 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
          	 margin: 5px;

          }
          

	</style>
</head>
<body>
	<header>

		<nav class="nav nav-pills flex-column flex-sm-row">
			<a class="flex-sm-fill text-sm-center nav-link active" href="home.php">Home</a>
			<a class="flex-sm-fill text-sm-center nav-link" href="general.php">Small and Big Animals</a>
			<a class="flex-sm-fill text-sm-center nav-link" href="senior.php">Senior Animals</a>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" name="search_text" id="search_text" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
			<a class="flex-sm-fill text-sm-center nav-link " href="logout.php?logout" >Logout</a>
		</nav>

	</header>
	<div id = "contents"class="d-flex flex-wrap justify-content-center">
	<?php
        if($resAni->num_rows==0){
        	echo "No result";
        }elseif($resAni->num_rows==1){
        	$row = $resAni ->fetch_assoc();
        	echo '
        	<div class="card" id="card" style="width: 18rem;">
        	<img src="'.$row["image"].'" class="card-img-top" alt="..." >
        	<div class="card-body">
        	<h5 class="card-title">'.$row["name"].'</h5>
        	<p class="card-text">'.$row["description"].'</p>
        	<a href="'.$row["website"].'" class="btn btn-primary">Read more..</a>
        	</div>
        	</div>';
        }else{
        	$rows =$resAni->fetch_all(MYSQLI_ASSOC);
        	foreach($rows as $value){
        		echo  '
        		<div class="card" id="card" style="width: 18rem;">
        		<img src="'.$value["image"].'" class="card-img-top" alt="..." style="max-height:300px;">
        		<div class="card-body">
        		<h5 class="card-title">'.$value["name"].'</h5>
        		<p class="card-text">'.$value["description"].'</p>
        		<a href="'.$value["website"].'" class="btn btn-primary">Read more..</a>
        		</div>
        		</div>';
        	}
        }

	?>
</div>
</body>
</html>