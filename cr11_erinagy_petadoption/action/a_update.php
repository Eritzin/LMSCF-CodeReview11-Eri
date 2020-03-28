<?php  
 require_once '../dbconnect.php';
 if($_POST){
 	$id=$_POST["id"];
 	$category=$_POST["category"];
	$name=$_POST["name"];
	$zipcode=$_POST["zipcode"];
	$city=$_POST["city"];
	$address=$_POST["address"];
	$image=$_POST["image"];
	$description=$_POST["description"];
	$hobbies=$_POST["hobbies"];
	$website=$_POST["website"];
	$age=$_POST["age"];
	$available_date=$_POST["available_date"];

    
    $sql="UPDATE `animals` SET `category`='$category', `name`='$name', `zipcode`=$zipcode,`city`='$city',`address`='$address',`image`='$image',`description`='$description',`hobbies`='$hobbies',`website`='$website',`age`=$age,`available_date`='$available_date' WHERE id=$id" ;
	      


    if(mysqli_query($conn, $sql)){
    	echo"success <br> <a href='../admin.php'>Back to Admin Page</a>";
    }else{
    	echo "error";
    };
 };
 
?>