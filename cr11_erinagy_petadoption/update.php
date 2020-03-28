<?php

require_once 'dbconnect.php';
if($_GET["id"]){
  $id =$_GET["id"];

  $sql="SELECT * FROM animals WHERE id=$id";
  $result = mysqli_query($conn, $sql);

  $row =$result->fetch_assoc();
};

  ?>

<!DOCTYPE html>
<html>
<head>
  <title>Animal Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
  <h4>Animal Registration</h4>
  <form action="action/a_update.php" method="post"class="col-md-6"> 
    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
    <div class="form-row">
     <div class="form-group col-md-6" >
      <label for="inputState">Category</label>
      <select id="inputState" class="form-control" name="category">
         <option value="small" >Small</option>
         <option value="large">Large</option>
         <option value="senior">Senior</option>
      </select>
     </div>
     <div  class="form-group col-md-6">
      <label >Name</label>
      <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>" >
    </div>  
    </div>
    
    <div class="form-row">
    <div  class="form-group col-md-3">
      <label >Zip Code</label>
      <input type="text" class="form-control" name="zipcode" value="<?php echo $row['zipcode'] ?>">
    </div>
      <div  class="form-group col-md-3">
      <label >City</label>
      <input type="text" class="form-control" name="city" value="<?php echo $row['city'] ?>">
    </div>
    <div  class="form-group col-md-6">
      <label >Street</label>
      <input type="text" class="form-control" name="address" value="<?php echo $row['address'] ?>">
    </div>
     
     </div>
     <div  class="form-group">
      <label >Image URL</label>
      <input type="text" class="form-control" name="image" value="<?php echo $row['image'] ?>">
    </div>
    <div  class="form-group">
      <label >Description</label>
      <input type="text" class="form-control" name="description" value="<?php echo $row['description'] ?>">
    </div>
    <div  class="form-group">
      <label >Hobbies</label>
      <input type="text" class="form-control" name="hobbies" value="<?php echo $row['hobbies'] ?>">
    </div>
    <div  class="form-group">
      <label >Website</label>
      <input type="text" class="form-control" name="website" value="<?php echo $row['website'] ?>">
    </div>
    <div class="form-row">
     <div  class="form-group col-md-6">
      <label >Age</label>
      <input type="text" class="form-control" name="age" value="<?php echo $row['age'] ?>">
    </div>
    <div  class="form-group col-md-6">
      <label >Available_date</label>
      <input type="date" class="form-control" name="available_date" value="<?php echo $row['available_date'] ?>">
    </div>
      </div>
      
    
     
    
    
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
   
  
  </form>
</body>
</html>