
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
    </style>


  </head>
  <body>



  	<div class="container w-75 my-5 px-5">
  		<div class="card p-5 w-75">
  			<h2 class="text-center">Login Now</h2>

  			<div class="card-body">
				<form method="POST" action="" enctype="multipart/form-data">

				  <div class="form-group form-group-sm">
				    <label>Username / Email</label>
				    <input type="text" class="form-control form-control-sm" name="uname">
				  </div>

				  <div class="form-group form-group-sm">
				    <label>Password</label>
				    <input type="password" class="form-control form-control-sm" name="pass">
				  </div>

				  <button type="submit" class="btn btn-primary" name="submit">Login</button>
				</form>  				
  			</div>
  			<div class="card-footer">
  				<a href="register.php" class="card-link">Create an account</a>
  			</div>
  		</div>
  	</div>	



    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>