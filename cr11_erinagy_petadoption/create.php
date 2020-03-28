<!DOCTYPE html>
<html>
<head>
	<title>Animal Registration</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<h4>Animal Registration</h4>
	<form action="action/a_create.php" method="post"class="col-md-6"> 
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
			<input type="text" class="form-control" name="name" >
		</div>	
		</div>
		
		<div class="form-row">
		<div  class="form-group col-md-3">
			<label >Zip Code</label>
			<input type="text" class="form-control" name="zipcode">
		</div>
	    <div  class="form-group col-md-3">
			<label >City</label>
			<input type="text" class="form-control" name="city">
		</div>
		<div  class="form-group col-md-6">
			<label >Street</label>
			<input type="text" class="form-control" name="address">
		</div>
		 
		 </div>
		 <div  class="form-group">
			<label >Image URL</label>
			<input type="text" class="form-control" name="image">
		</div>
		<div  class="form-group">
			<label >Description</label>
			<input type="text" class="form-control" name="description">
		</div>
		<div  class="form-group">
			<label >Hobbies</label>
			<input type="text" class="form-control" name="hobbies">
		</div>
		<div  class="form-group">
			<label >Website</label>
			<input type="text" class="form-control" name="website">
		</div>
		<div class="form-row">
		 <div  class="form-group col-md-6">
			<label >Age</label>
			<input type="text" class="form-control" name="age">
		</div>
		<div  class="form-group col-md-6">
			<label >Available_date</label>
			<input type="date" class="form-control" name="available_date">
		</div>
	    </div>
			
		
		 
		
		
		<button type="submit" class="btn btn-primary" name="submit">Submit</button>
	 
	
	</form>
</body>
</html>