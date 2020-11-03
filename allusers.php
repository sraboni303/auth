<?php require_once "app/autoload.php"; ?>

<?php

/**
 * Inactive a User
 */
if (isset($_GET['active_id'])) {
  
  $active_id = $_GET['active_id'];

  $sql = "UPDATE users SET status = 'inactive' WHERE id='$active_id' ";

  $connection -> query($sql);
  header("location: allusers.php");
}


/**
 * Active A User
 */
if (isset($_GET['inactive_id'])) {
  
  $inactive_id = $_GET['inactive_id'];

  $sql = "UPDATE users SET status='active' WHERE id='$inactive_id' ";
  $connection -> query($sql);

  header("location: allusers.php");
}



/**
 * Delete User
 */
if(isset($_GET['delete_id'])){

  $delete_id = $_GET['delete_id'];
  $delete_photo = $_GET['photo'];

  $sql = "DELETE * FROM users WHERE id='$delete_id' ";
  $connection -> query($sql);

  unlink('photos/'. $delete_photo);

  header("location:allusers.php");

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

    <title>All Users</title>

    <style type="text/css">
      img{
        width: 50px;
        height: 50px;
        border-radius: 50%;
      }
      .card-body, .card-body table tr{
        color: #fff;
      }
      .card{
        background-color: rgba(26, 188, 156, .7);
        box-shadow: inset 0px 0px 60px rgba(0, 0, 0, .8);
    </style>


  </head>
  <body>
    <div class="container">
        <a class="btn btn-sm btn-success" href="register.php">Registration</a>
        <a class="btn btn-sm btn-success" href="login.php">Login</a>
        <a class="btn btn-sm btn-success" href="profile.php">Profile</a>
    </div>

    <div class="container my-5">
      <a class="btn btn-sm btn-danger" href="profile.php">Your Profile</a>
      <div class="card">
        <div class="card-body text-center p-5">

          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Photo</th>
                <th>actions</th>
              </tr>             
            </thead>
            <tbody>
<?php

  $i = 1;
  $sql = "SELECT * FROM users";
  $users = $connection -> query($sql);
  while($users_data = $users -> fetch_assoc()){

?>
          

          <tr>

            <td><?php echo $i; $i++; ?></td>
            <td><?php echo $users_data['name']; ?></td>
            <td><?php echo $users_data['email']; ?></td>

            <td>

              <?php if( $users_data['status'] == 'active' ): ?>
                 <a href="?active_id=<?php echo $users_data['id']; ?>">
                   <img style="border: 5px solid green;" src="photos/<?php echo $users_data['photo']; ?>">
                 </a>
              <?php elseif( $users_data['status'] == 'inactive' ): ?>
                <a href="?inactive_id=<?php echo $users_data['id']; ?>">
                  <img style="border: 5px solid red;" src="photos/<?php echo $users_data['photo']; ?>">
                </a>
              <?php endif; ?>
             
            </td>


            <td>

              <?php if($users_data['id'] == $_SESSION['user_id']) : ?>
                <a href="#" class="btn btn-sm btn-info">Update</a>
                <a id="delete_btn" href="?delete_id=<?php echo $users_data['id']; ?> &photo=<?php echo $users_data['photo']; ?> " class="btn btn-sm btn-danger">Delete</a>

              <?php else: ?>
                <a href="profile.php?user_id=<?php echo $users_data['id']; ?>" class="btn btn-sm btn-warning">View</a>

              <?php endif; ?>

            </td>

          </tr>

<?php } ?>

            </tbody>
          </table>

        </div>
      </div>
    </div>



    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script>
      $('a#delete_btn').click(function(){

        let con_msg = confirm('Are you sure ?');
        if (con_msg == true) {
          return true;
        }else{
          return false;
        }

      });
    </script>

  </body>
</html>