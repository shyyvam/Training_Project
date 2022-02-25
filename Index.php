
<?php
session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h2>Login Page</h2><br>
  <form id="login" action="index.php" method="post">
    <div class="imgcontainer">
      <div class="container">
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" id="username" required>
        <br><br>
        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>
        <br><br>
        <button type="submit" value="log" name="log" id="log">Login</button>
        <br><br>
        <input type="checkbox" checked="checked" id="check" name="remember">
        <span>Remember me</span>
        <br><br>
      </div>

      <div class="container">
        <button type="button" class="cancelbtn">Cancel</button>
      </div>

      <div class="container">
        <span class="register">New user? <a href="register.php">register</a></span>
      </div>
    <div>
  </form>
  <?php
  include("connect.php");
  if(isset($_POST['log']))
  {
    $un=$_POST['username'];
    $up=$_POST['password'];

    $check_user="SELECT * from user WHERE username='$un'AND password='$up'";

    $run=mysqli_query($conn,$check_user);

    if(mysqli_num_rows($run))
    {
        echo "<script>window.open('g.php','_self')</script>";

        $_SESSION['username']=$un;

    }
    else
    {
      echo "<script>alert('Email or password is incorrect!')</script>";
    }
}

   ?>
</body>
</html>
