<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <?php  require_once "../db/db.php";  ?>
  <?php 
  session_start();
  if(isset($_SESSION['name']))
  {
     header('Location: dashboard.php');
     exit();
  }
  else

  ?>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Log In Here...!</p>

      <form action="" method="post">
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
            <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
          </div>
          <div class="col-8">
          <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
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

if(isset($_POST['login']))
{
if(!empty($_POST['email']) && !empty($_POST['password']) )
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $fetch = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";

    $fetch = $con->query($fetch);
    $fetch =$fetch->fetch_assoc();

    if($fetch>0)
    {
        echo "<script>alert('Login Successfull...!')</script>";
        echo "<script>window.location.href = 'dashboard.php';</script>";
        $_SESSION['name'] = $fetch['full_name'];
    }
    else
    {
        echo "<script>alert('Error In Login...!')</script>";
    }
}
else{
    echo "<script>alert('Please Fill All The Required Fields...!')</script>";
}
}
?>
