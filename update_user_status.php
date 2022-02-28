<?php
  session_start();
  include("connect.php");
  $uid=$_SESSION['username'];
  $time=time()+10;
  $res=mysqli_query($conn,"UPDATE user SET last_login='$time' WHERE username='$uid'");

 ?>
