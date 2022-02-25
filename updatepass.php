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
</head>
<body>
  <ul>
    <li><a href="g.php">Home</a><li>
    <li><a href="allusers.php">View Players</a></li>
    <li><a href="updatepass.php">Update Password</a></li>
    <li><a href="updatename.php">Update Name</a></li>
    <li style="float:right"><a class="active" href="#about">About</a></li>
    <li style="float:right"><a href="logout.php">Log out</a></li>
  </ul>
<div style="width:50%;">
   <form method="post" action="updatepass.php">
      <div>
         <label style="color:blue;">Old Password</label>
         <input type="password" name="old_pass" placeholder="Old Password . . .">
      </div>
      <div>
         <label style="color:blue;">New Password</label>
         <input type="password" name="new_pass" placeholder="New Password . . .">
      </div>
      <div>
         <label style="color:blue;">Re-Type New Password</label>
         <input type="password" name="re_pass" placeholder="Re-Type New Password . . .">
      </div>
      <button type="submit" name="re_password">Submit</button>
   </form>
</div>
</body>
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
		if ($new_pass == $re_pass)
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
