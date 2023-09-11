<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <?php  require_once "db/db.php";  ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign Up Here...!</p>

      <form action="" method="post">
      <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="fname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
          </div>
          <div class="col-8">
          <p class="mb-0">
        <a href="login.php" class="text-center">Already a User? Login</a>
      </p>
          </div>
        </div>
      </form>

    
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

<?php

if(!empty($_POST['fname']) &&!empty($_POST['email']) && !empty($_POST['password']))
{
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $fetch = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";

    $fetch = $con->query($fetch);
    $fetch =$fetch->fetch_assoc();

    if($fetch>0)
    {
        echo "<script>alert('Already Have an Account...!')</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    }
    else{
    
    $insert = "INSERT INTO `user`(`full_name`, `email`, `password`) VALUES ('$fname','$email','$password')";
    $insert = $con->query($insert);

    if($insert)
    {
        echo "<script>alert('User Registered Successfully...!')</script>";
    }
    else{
        echo "<script>alert('Error In Sign Up...!')</script>";
    }
}
}
?>
