
<?php 
ob_start();
session_start(); // start a new session or continues the previous

if(isset($_SESSION['user'])!=""){
	header("Location:home.php"); //redirects to home.php
}
include_once'dbconnect.php';
$error=false;
if(isset($_POST['btn-signup'])){
  //sanitize user input to prevent sql injection
  $name=trim($_POST['name']);
  //trim - strips whitespace (or other characters) from the beginning and end of a string
  $name=strip_tags($name);
  //strip_tags-strips HTML and PHP tags from a string
  $name=htmlspecialchars($name);
  //htmlspecialchars converts special characters to HTML entities


  $email=trim($_POST['email']);
  $email=strip_tags($email);
  $email=htmlspecialchars($email);

  $pass =trim($_POST['pass']);
  $pass=strip_tags($pass);
  $pass=htmlspecialchars($pass);

  //basic name validation
  if(empty($name)){
  	$error=true;
  	$nameError="Please enter your full name.";
  }else if(strlen($name)<3){
  	$error=true;
  	$nameError="Name must have at least 3 characters.";
  }else if(!preg_match("/^[a-zA-Z ]+$/",$name)){
  	$error=true;
  	$nameError="Name must contain alphabets and space.";
  }

//basic email validation
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
  	$error=true;
  	$emailError="Please enter valid email address.";
  }else{
  	//checks whether the email exists or not
  	$query ="SELECT userEmail FROM users WHERE userEmail='$email'";
  	$result =mysqli_query($conn, $query);
  	$count=mysqli_num_rows($result);
  	if($count!=0){
  		$error=true;
  		$emailError="Provided Email is already in use";
  	}
  }
  //password validation
  if(empty($pass)){
  	$error=true;
  	$passError="Please enter password.";
  }else if(strlen($pass)<6){
  	$error=true;
  	$passError="Password must have atleast 6 characters.";
  }
  //password hashing for security
  $password=hash('sha256',$pass);

  if(!$error){
  	$query ="INSERT INTO users(userName,userEmail,userPass)
    VALUES('$name','$email','$password')";

    $res =mysqli_query($conn,$query);

    if($res){
    	$errTyp="success";
    	$errMSG="Successfully registered, you may login now";
    	unset($name);
    	unset($email);
    	unset($pass);
    }else{
    	$errTyp="danger";
    	$errMSG="Something went wrong, try again later...";
    }


  }
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 </head>
 <body>
 <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
 	<h2>Sign Up.</h2>
 	<hr/>
 	<?php
     if(isset($errMSG)){
 	?>
 	<div class="alart alart-<?php echo $errTyp ?>">
 		<?php 
 		echo $errMSG; 
 		?>
 	</div>
 	<?php
       }
 	?>
  <div class="form-group col-md-6">
    <label for="validationServer01">Name</label>
    <input type="text" name="name" class="form-control isvalid" id="validationServer01" placeholder="name" value = "<?php echo $name ?>" required/>
       <span  id="availabilityName" style="color:red; font-weight:bold;" class = "text-danger" > </span >
  </div>
  <div class="form-group col-md-6">
    <label for="validationServer02">Email</label>
    <input type="email" name="email" class="form-control isvalid" id="validationServer02" placeholder="Email" value = "<?php echo $email ?>" required/>
       <span id="availabilityEmail" style="color:red; font-weight:bold;" class = "text-danger" ></span >
  </div>
  <div class="form-group col-md-6">
    <label for="fvalidationServer03">Password</label>
    <input type="password" name="pass" class="form-control isvalid" id="validationServer03" placeholder="Password" required/>
       <span   class = "text-danger" style="color:red; font-weight:bold;" >     <?php   echo  $passError; ?></span >
  </div>
  <div class="form-group col-md-2">
  <button type="submit" class = " btn btn-block btn-primary "   name = "btn-signup" >Sign Up</button>
   </div>
  <hr  />
  <div class="form-group col-md-2">
   <a   href = "index.php" >Sign in Here...</a>
   </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
 <script >
  $(document).ready(function(){

   $("#validationServer01").blur(function () {
            var name = $(this).val();
           if(name!=''){
            console.log("haha")
            $.ajax({
              url:"processN.php",
              method:"post",
              data:{userName:name},
              dataType:"text",
              success:function(data){
                $('#availabilityName').html(data);
              }
            })
          }
           
        })


   $("#validationServer02").blur(function () {
            var email = $(this).val();
           if(email!=''){
            console.log("he")
            $.ajax({
              url:"processE.php",
              method:"post",
              data:{userEmail:email},
              dataType:"text",
              success:function(data){
                $('#availabilityEmail').html(data);
              }
            })
          }
           
        })
    })
</script>
 </body>
 </html>
  <?php  ob_end_flush(); ?>