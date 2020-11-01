<?php include_once "app/autoload.php"; ?>

<?php 

if (isset($_GET['logout']) AND $_GET['logout'] == 'done') {

  session_destroy();
  
  header("location:login.php");
}


if (!isset($_SESSION['name'])) {

  header("location:login.php");
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

    <title><?php echo $_SESSION['name']; ?></title>
    <style type="text/css">
      .card-body, .card-body table tr{
        color: #fff;
      }
      .card{
        background-color: rgba(26, 188, 156, .7);
        box-shadow: inset 0px 0px 60px rgba(0, 0, 0, .8);
      
    </style>

  </head>
  <body>

    <div class="container w-50 my-5">
      <a class="btn btn-sm btn-danger" href="allusers.php">Back</a>
      <div class="card">
        <div class="card-body text-center">
          <img class="my-3 shadow-sm" style="width: 300px; height: 300px; border-radius: 50%; border: 10px solid #fff;" src="photos/<?php echo $_SESSION['photo']; ?>">
          <h2><?php echo $_SESSION['name']; ?></h2>
          <h4 class="mb-4"><?php echo $_SESSION['uname']; ?></h4>
          <table class="table table-striped">
           
            <tr>
              <th>E-mail</th>
              <td><?php echo $_SESSION['uname']; ?></td>
            </tr>

            <tr>
              <th>Mobile</th>
              <td><?php echo $_SESSION['mobile']; ?></td>
            </tr>

            <tr>
              <th>Age</th>
              <td><?php echo $_SESSION['age']; ?></td>
            </tr>

            <tr>
              <th>Location</th>
              <td><?php echo $_SESSION['location']; ?></td>
            </tr>

            <tr>
              <th>Gender</th>
              <td><?php echo $_SESSION['gender']; ?></td>
            </tr>

            <tr>
              <th>Status</th>
              <td>active</td>
            </tr>
          </table>

          <a href="?logout=done" class="btn btn-secondary my-3">Logout</a>
        </div>
      </div>
    </div>



    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>