<?php include_once "app/autoload.php"; ?>


<?php 


// Preventing Login Page access:
if (isset($_SESSION['user_id'])) {
  
  header("location:profile.php");
}


// Set COOKIE for auto login:
if (isset($_COOKIE['user_info'])) {
  $id = $_COOKIE['user_info'];
  $sql = "SELECT * FROM users WHERE id='$id' ";
  $cookie = $connection -> query($sql);
  $user_cookie = $cookie -> fetch_assoc();

  $_SESSION['user_id'] = $user_cookie['id'];
  
  header("location:profile.php");
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

    <title>Login</title>

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

      .card-text{
        color: #fff;
      }

      .card-text:hover{
        text-decoration: none;
      }
    </style>


  </head>
  <body>

    <!-- All Pages Links -->
    <div class="container">
        <a class="btn btn-sm btn-success" href="register.php">Registration</a>
        <a class="btn btn-sm btn-success" href="allusers.php">All Users</a>
        <a class="btn btn-sm btn-success" href="profile.php">Profile</a>
    </div>

<?php 

if (isset($_POST['log_submit'])) {
  
  // Get Values:
  $login = $_POST['log_info'];
  $pass = $_POST['log_pass'];


  // Validation:
  if (empty($login) || empty($pass)) {
    $notice = val_error('Fill the Required Fields', 'warning');
  }else{

    $sql = "SELECT * FROM users WHERE email='$login' OR uname='$login' ";
    $login_data = $connection -> query($sql);
    $login_num = $login_data -> num_rows;

    $login_user = $login_data -> fetch_assoc();


    if ($login_num == 1) {

      if (password_verify($pass, $login_user['password'])) {

        $_SESSION['user_id'] = $login_user['id'];
        setcookie('user_info', $login_user['id'], time() + (60*60*24*30*12) );


        header("location:profile.php");

        
      }else{
        $notice = val_error('Wrong Password', 'warning');
      }




     
    }else{
      $notice = val_error('Wrong Username or Email', 'warning');
    }


  }









}








?>


  	<div class="container w-75 my-5 px-5">
  		<div class="card p-5 w-75">
  			<h2 class="text-center">Login Now</h2>

        <!-- Show Notice -->
        <?php require "templates/notice.php"; ?>

  			<div class="card-body">
				<form method="POST" action="">

				  <div class="form-group form-group-sm">
				    <label>Username / Email</label>
				    <input type="text" class="form-control form-control-sm" name="log_info">
				  </div>

				  <div class="form-group form-group-sm">
				    <label>Password</label>
				    <input type="password" class="form-control form-control-sm" name="log_pass">
				  </div>

				  <button type="submit" class="btn btn-primary" name="log_submit">Login</button>
				</form>  				
  			</div>
  			<div class="card-footer">
  				<a href="register.php" class="card-link">Create an account</a>
  			</div>
  		</div>
  	</div>	


    <!-- Recent Login Section -->
    <div class="container">
      <div class="row my-5">

<?php 

$recent_user_info = '';
if (isset($_COOKIE['recent_user'])) {
    $recent_user_info = $_COOKIE['recent_user'];  
  }


  if( !empty($recent_user_info) ) :
  $sql = "SELECT * FROM users WHERE id IN($recent_user_info)";
  $recent_user_data = $connection -> query($sql);

  while($data = $recent_user_data -> fetch_assoc() ) :

?>


        <div class="col-md-3 mb-5">
          <a href="#">
          <div class="card">
            <div class="card-body">
              <img style="max-width: 100%;" src="photos/<?php echo $data['photo']; ?>">
            </div>
            <div class="card-footer card-text text-center"><?php echo $data['name']; ?></div>
          </div>
          </a>
        </div>

<?php endwhile; endif; ?>

      </div>
    </div>





    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>