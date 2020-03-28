<?php 
ob_start();
session_start();
require_once 'dbconnect.php';

// it will never let you open index(login) page if session is set
if(isset($_SESSION['user'])!=""){
	header("Location: home.php");
	exit;
}

$error =false;

if(isset($_POST['btn-login'])){

	//prevent sql injections/ clear user invalid inputs
	$email=trim($_POST['email']);
	$email=strip_tags($email);
	$email=htmlspecialchars($email);

	$pass =trim($_POST['pass']);
	$pass =strip_tags($pass);
	$pass= htmlspecialchars($pass);

	//prevent sql injections/clear user invalid inputs

	if(empty($email)){
		$error =true;
		$emailError ="Please enter your email address.";
	}else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$error=true;
		$emailError ="Please enter valid email address.";
	}

	if(empty($pass)){
		$error=true;
		$passError="Please enter your password.";
	}

	//if there's no error, continue to loging
	if(!$error){
		$password=hash('sha256',$pass);

		$res=mysqli_query($conn, "SELECT * FROM users WHERE userEmail='$email'");
		$row=mysqli_fetch_array($res, MYSQLI_ASSOC);
		$count = mysqli_num_rows($res);

		if($count==1 && $row['userPass']==$password){

			if($row["status"]=='admin'){
				$_SESSION["admin"]=$row["userId"];
			  header("Location:admin.php");
			}else{
				$_SESSION['user']=$row['userId'];
				header("Location:home.php");
			}

			
		}else{
			$errMSG ="Incorect Credentials, Try again...";
		}
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login & Registration System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
   <form method="post"  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete= "off">
   	<div class="form-group col-md-6">
   	<h2>Sign In.</h2 >
   	<hr />
   </div>
   	<?php
   	if ( isset($errMSG) ) {
   		echo  $errMSG; 
   		?>
   		<?php
   	   }
   	   ?>
   	    <div class="form-group col-md-6">
   	    	<label for="exampleInputEmail1">Email address</label>
   	    	<input  type="email" name="email"  class="form-control" placeholder= "Your Email" value="<?php echo $email; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
   	    	<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.<?php  echo $emailError; ?></small>
   	    </div>
   	    <div class="form-group col-md-6">
   	    	<label for="exampleInputPassword1">Password</label>
   	    	<input type="password"  name="pass"  class="form-control" id="exampleInputPassword1" placeholder= "Your Email" value="<?php echo $email; ?>">
   	    	<span  class="text-danger"><?php  echo $passError; ?></span>
   	    </div>
   	    <div class="form-group col-md-6">
   	    	<button type="submit" name= "btn-login" class="btn btn-primary">Sign In</button>
   	    	<hr />
   	    	<a  href="register.php">Sign Up Here...</a> 
   	    </div>
   	  
   </form>
</body>
</html>
<?php ob_end_flush(); ?>
<?php 
/*


       <input  type="email" name="email"  class="form-control" placeholder= "Your Email" value="<?php echo $email; ?>"   maxlength="40" />
       <span class="text-danger"><?php  echo $emailError; ?></span >
       <input  type="password" name="pass"  class="form-control" placeholder ="Your Password" maxlength="15"  />
       <span  class="text-danger"><?php  echo $passError; ?></span>
       <hr />
       <button  type="submit" name= "btn-login">Sign In</button>
       <hr />
       <a  href="register.php">Sign Up Here...</a> */
 ?>