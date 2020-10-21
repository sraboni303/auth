<?php include_once "autoload.php"; ?>

<?php 
/**
 * Form isseting:
 */
if (isset($_POST['submit'])) {

	//Get Values:
	$name = $_POST['name'];
	$uname = $_POST['uname'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	$age = $_POST['age'];
	$pass = $_POST['pass'];

	if (isset($_POST['location'])) {
		$location = $_POST['location'];
	}

	if (isset($_POST['gender'])) {
		$gender = $_POST['gender'];
	}

	if (isset($_POST['terms'])) {
		$terms = $_POST['terms'];
	}


	// Image Information:
	$file_name = $_FILES['photo']['name'];
	$file_tmp_name = $_FILES['photo']['tmp_name'];

	$unique_file_name = md5( time() . rand() . $file_tmp_name );


	/**
	 * Validation Error:
	 */
	if (empty($name) || empty($uname) || empty($email) || empty($mobile) || empty($age) || empty($pass) || empty($location) || empty($gender) || empty($terms) ) {
		$notice = val_error('Fill the Required fields');
	}




















}
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Register</title>

    <style type="text/css">
    	body{
    		color: #fff;
    	}
    	.card{
    		background-color: rgba(26, 188, 156, .7);
    		box-shadow: inset 0px 0px 60px rgba(0, 0, 0, .8);
    	}
    	h2{
    		font-size: 50px;
    	}
    	input[type="text"], input[type="password"], .loc{
    		color: #ddd;
    		border: none;
    		outline: none;
    		padding: 5px 10px;
    		background-color: rgba(0, 0, 0, .3);
    	}

    	input[type="text"]:focus, input[type="password"]:focus{
    		color: #ddd;
    		border: none !important;
    		outline: none !important;
    		padding: 5px 10px;
    		background-color: rgba(0, 0, 0, .3);
    	}
    </style>


  </head>
  <body>



  	<div class="container w-75 my-5">
  		<div class="card p-5">
  			<h2 class="text-center">Register Now</h2>

  			<?php
				if (isset($notice)) {
						echo $notice;
					}
  			?>

  			<div class="card-body">
				<form method="POST" action="" enctype="multipart/form-data">
				  <div class="form-group form-group-sm">
				    <label>Name</label>
				    <input type="text" class="form-control form-control-sm" name="name">
				  </div>

				  <div class="form-group form-group-sm">
				    <label>Username</label>
				    <input type="text" class="form-control form-control-sm" name="uname">
				  </div>

				  <div class="form-group form-group-sm">
				    <label>Email</label>
				    <input type="text" class="form-control form-control-sm" name="email">
				  </div>

				  <div class="form-group form-group-sm">
				    <label>Mobile</label>
				    <input type="text" class="form-control form-control-sm" name="mobile">
				  </div>

				  <div class="form-group form-group-sm">
				    <label>Age</label>
				    <input type="text" class="form-control form-control-sm" name="age">
				  </div>

				  <div class="form-group form-group-sm">
				    <label>Password</label>
				    <input type="password" class="form-control form-control-sm" name="pass">
				  </div>

				  <div class="form-group form-group-sm">
				    <label>Confirm Password</label>
				    <input type="password" class="form-control form-control-sm" name="cpass">
				  </div>

				  <div class="form-group form-group-sm">
				    <label>Location</label>
				    <select class="form-control form-control-sm loc" name="location">
				      <option value="">-Select-</option>
				      <option value="Dhaka">Dhaka</option>
				      <option value="Barishal">Barishal</option>
				      <option value="Rajshahi">Rajshahi</option>
				      <option value="Rangpur">Rangpur</option>
				      <option value="Sylhet">Sylhet</option>
				      <option value="Mymansingh">Mymansingh</option>
				      <option value="Chattogram">Chattogram</option>
				    </select>
				  </div>

				  Gender : <br>
				  <div class="form-check form-check-inline">
				     <input class="form-check-input" type="radio" value="Male" name="gender">
				     <label class="form-check-label">Male</label>
				  </div>
				   <div class="form-check form-check-inline">
				       <input class="form-check-input" type="radio" value="Female" name="gender">
				       <label class="form-check-label">Female</label>
				   </div> <br><br>

				  <div class="form-group">
				    <label>Photo</label>
				    <input type="file" class="form-control-file" name="photo">
				  </div>


				  <div class="form-group form-check">
				    <input type="checkbox" class="form-check-input" name="terms">
				    <label class="form-check-label">Check me out</label>
				  </div>

				  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
				</form>  				
  			</div>
  			<div class="card-footer">
  				Have an account?<a href="login.php" class="card-link"> Login Here</a>
  			</div>
  		</div>
  	</div>	



    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>