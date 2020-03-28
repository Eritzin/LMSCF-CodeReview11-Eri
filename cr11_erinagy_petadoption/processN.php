<?php
ob_start();
session_start();
require_once'dbconnect.php';
$outputName='';

$name=trim($_POST['userName']);
$name=strip_tags($name);
$name=htmlspecialchars($name);




 if(empty($name)){
  	
  	$outputName.="Please enter your full name.";

  	echo $outputName;
  }else if(strlen($name)<3){
  	
  	$outputName.="Name must have at least 3 characters.";
  	echo $outputName;
  }else if(!preg_match("/^[a-zA-Z ]+$/",$name)){
  	
  	$outputName.="Name must contain alphabets and space.";
  	echo $outputName;
  }


    

?>