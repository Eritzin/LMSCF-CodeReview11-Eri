<?php
ob_start();
session_start();
require_once'dbconnect.php';

$outputEmail='';

  
$email=trim($_POST['userEmail']);
$email=strip_tags($email);
$email=htmlspecialchars($email);
$query ="SELECT userEmail FROM users WHERE userEmail='$email'";
$result =mysqli_query($conn,$query);


if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
  
  	$outputEmail.="Please enter valid email address.";
  	echo $outputEmail;
  }else{
  	//checks whether the email exists or not
  	
  	if(mysqli_num_rows($result)>0){
  		
  	$outputEmail.="Email is already Registered";
  	echo $outputEmail;
  	}
  }


    

?>