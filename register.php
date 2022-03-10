

<!doctype html>

<html>
<head>
  <title>REGISTRATION
  </title>
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>

<body>

<div class="container ">

    <h2 class="text-center">Register Here!</h2>
    <form method="post" action="register.php">
        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter First Name" minlength="2" maxlength="15" required>
        </div>
        <br></br>
        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name" minlength="2" maxlength="15" required>
        </div>
        <br></br>
        <div class="form-group">
            <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Enter User Name" minlength="3" maxlength="10" pattern="[a-z0-9]+" required>
        </div>
        <br></br>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" id="password" minlength="8" pattern="[a-zA-Z0-9]+" required>
        </div>
        <br></br>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Enter password again" id="cpassword" minlength="8"  required>
        </div>

        <button type="submit" class="btn btn-primary" value="register" name="register">
        SignUp
        </button>

    </form>
    <div>
      <p>Already registered?<a href="index.php">Log in</a>
    </div>
</div>
</body>
<?php
include("connect.php");
if(isset($_POST['register']))
{

$fer = $ler = $per = $cper = "";
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$pass = $_POST['password'];
$cpass = $_POST['cpassword'];
$uname =$_POST['username'];


  if($uname=='')
  {
      echo"<script>alert('Please enter the username')</script>";
      exit();
  }
  if($fname=='')
  {
    echo"<script>alert('Please enter the first name')</script>";
    exit();
  }
  else
  {
    //$name = clean($fname);
    if (!preg_match("/^[a-zA-Z-']*$/",$fname))
    {
      echo"<script>alert('Please enter the valid first name')</script>";
      exit();
    }
  }

  if ($lname=='')
  {
    echo"<script>alert('Please enter the last name')</script>";
    exit();
  }
  else
  {
    //$lname = clean($lname);
    if (!preg_match("/^[a-zA-Z-']*$/",$lname))
    {
      echo"<script>alert('Please enter the valid last name')</script>";
      exit();
    }
  }

  if ($pass=='')
  {
    echo"<script>alert('Please enter the password')</script>";
    exit();
  }
  else
  {
    if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $pass))
    {
      echo"<script>alert('Please enter a valid password')</script>";
      exit();
    }
  }

  if ($cpass=='')
  {
    echo"<script>alert('Please enter password')</script>";
    exit();
  }
  else
  {
    if ($pass != $cpass)
    {
      echo"<script>alert('Passwords do not match!')</script>";
      exit();
    }
  }


$checkuser="SELECT * FROM `user` WHERE username= '$uname'";
$result=mysqli_query($conn,$checkuser);
$count=mysqli_num_rows($result);


    if($count==1)
    {
        echo "This username already exists";
    }
    else
    {
      mysqli_begin_transaction($conn);
      mysqli_autocommit($conn,FALSE);
      $sql = "INSERT INTO user(firstname,lastname,username,password)  VALUES ('$fname',
           '$lname','$uname','$pass')";
      $sql2 = "INSERT INTO game(personid,username) SELECT personid,username FROM user WHERE username = '$uname'";


       if(mysqli_query($conn, $sql) and mysqli_query($conn,$sql2))
       {
           echo "<h3>Registered successfully.";
           //header("Location: index.php");//redirect to the login page to secure the welcome page without login access.

           mysqli_commit($conn);
           echo nl2br(" Welcome \n$fname\n $lname\n ");
       }
       else
       {
           echo "ERROR: Hush! Sorry $sql. "
               . mysqli_error($conn);
            mysqli_rollback($conn);
       }
     }

}

?>
</html>
