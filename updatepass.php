<?php
session_start();
include("connect.php");
if(!$_SESSION['username'])
{
  header("Location: logout.php");//redirect to the login page to secure the welcome page without login access.
}
 ?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>
      .password {
        text-align: center;
        border: 1px solid #FFFF00;
        background-color: #6f4e37;
        border-radius: 10px;
        margin-top: 90px;
        width: 40%;
        height: auto;
        margin: auto;
        margin-top: 90px;
        padding-top: 100px;
        padding-bottom: 100px;

      }
      .fieldinput {
        margin-left: 8px;
        padding: 2px 2px 2px 2px;
        border-radius: 10px;
        font-family: 'Arial';
      }
      .field {
        font-family: 'Arial';
        color:#EFE2BA;
      }

  </style>
</head>
<body>
<nav class="navbar">
  <ul>
    <li><a href="g.php">Home</a><li>
    <li><a href="allusers.php">View Players</a></li>
    <li style="float:right"><a class="active" href="#about">About</a></li>
    <li style="float:right"><a href="logout.php">Log out</a></li>
  </ul>
</nav>
<h1 style="color:#6f4e37; text-align: center;"><?php echo $_SESSION['username'];?></h1>
<div style="width:50%;" class="password">
   <form method="post" action="updatepass.php">
      <div>
         <label style= "margin-left: 7px;" class="field">Old Password</label>
         <input type="password" name="old_pass" class="fieldinput" placeholder="Old Password . . ." required>
      </div>
      <br>
      <div>
         <label style="margin-left: 9px;" class="field">New Password</label>
         <input type="password" name="new_pass" class="fieldinput" placeholder="New Password . . ."  required pattern="[a-z0-9A-Z]+">
      </div>
      <br>
      <div>
         <label style="margin-left: 69px;" class="field">Re-Type New Password</label>
         <input type="password" name="re_pass" class="fieldinput" placeholder="Re-Type New Password . . ." required pattern="[a-z0-9A-Z]+">
      </div>
      <br>
      <button type="submit" name="re_password">Submit</button>
   </form>
</div>
</body>
<script>
  function updateUserStatus()
  {
    jQuery.ajax({
        url:'update_user_status.php',
        success:function(){

        }
    });
  }
  function getUserStatus()
  {
    jQuery.ajax({
        url:'get_user_status.php',
        success:function(result){
          jQuery('#user_grid').html(result);
        }
    });
  }
  setInterval(function(){
    updateUserStatus();
  },1000);
  setInterval(function(){
    getUserStatus();
  },2000);
</script>
</html>
<?php
$pass = $_SESSION['username'];
if (isset($_POST['re_password']))
	{
	    $old_pass = $_POST['old_pass'];
	    $new_pass = $_POST['new_pass'];
	    $re_pass = $_POST['re_pass'];

	$password_query = mysqli_query($conn,"SELECT password from user WHERE username='$pass'");
	$password_row = mysqli_fetch_array($password_query);
	$database_password = $password_row['password'];
	if ($database_password == $old_pass)
		{
      if ($new_pass=='')
      {
        echo"<script>alert('Please enter the password')</script>";
        exit();
      }
      else if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $new_pass))
      {
          echo"<script>alert('Please enter a valid password')</script>";
          exit();
      }
      else if ($re_pass=='')
      {
        echo"<script>alert('Please enter password')</script>";
        exit();
      }
      else if ($new_pass == $re_pass)
			{
			     $update_pwd = mysqli_query($conn,"UPDATE user SET password='$new_pass' where username='$pass'");
			     echo "<script>alert('Update Sucessfully'); window.location='g.php'</script>";
			}

		  else
			{
			     echo "<script>alert('Your new and Retype Password do not match'); window.location='updatepass.php'</script>";
			}
		}
	  else
		{
		    echo "<script>alert('Your old password is wrong'); window.location='updatepass.php'</script>";
		}
  }
  ?>
