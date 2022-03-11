<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        html {
            background: #EFE2BA;
        }

        .body-content {
            padding-top: 20vh;
        }

        .container {
            width: 350px;
            height: 450px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: auto;
            border: 2px solid White;
            border-radius: 15px;
            background: white;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-item {
            margin: 5px;
            padding-bottom: 10px;
            display: flex;
        }

        .form-item label {
            display: block;
            padding: 2px;
            font-size: 20px;
            width: 100px;
        }

        .form-item input {
            width: 320px;
            height: 35px;
            border: 2px solid #e1dede69;
            border-radius: 20px;
            background: #e1dede69;
            color: grey;
        }

        .form-btns {
            display: flex;
            flex-direction: column;
            margin: auto;
            padding: 10px 0;
        }

        .form-btns button {
            margin: auto;
            font-size: 20px;
            padding: 5px 15px;
            border: 2px solid;
            border-radius: 15px;
            color: white;
            background: #7E685A;
            width: 280px;
            cursor: pointer;
        }

        .options {
            padding-top: 15px;
            margin: auto;
        }

        .options a {
            text-decoration: none;
            color: black;
            margin: 0 40px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;

        }
        .options a:hover {
            color: grey;

        }
        #userName,#passWord,#firstName,#lastName,#cpassWord {
            text-align: center;
        }

        p {
            text-align: center;
            font-size: 10px;
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>
    <div class="body-content">
        <div class="container">
          <h2 class="text-center">Register Here!</h2>
            <div class="login-form">
                <form action="register.php" method="post">
                    <div class="form-item">
                        <!-- <label for="userName">Username:</label> -->
                        <input type="text" name="firstName" id="firstName" placeholder="Firstname" required>
                    </div>
                    <div class="form-item">
                        <!-- <label for="passWord">Password:</label> -->
                        <input type="text" name="lastName" id="lastName" placeholder="Lastname" required>
                    </div>
                    <div class="form-item">
                        <!-- <label for="passWord">Password:</label> -->
                        <input type="text" name="userName" id="userName" placeholder="Username" required>
                    </div>
                    <div class="form-item">
                        <!-- <label for="passWord">Password:</label> -->
                        <input type="password" name="passWord" id="passWord" placeholder="Password" required>
                    </div>
                    <div class="form-item">
                        <!-- <label for="passWord">Password:</label> -->
                        <input type="password" name="cpassWord" id="cpassWord" placeholder="Confirm Password" required>
                    </div>

                    <div class="form-btns">

                        <button type="submit" value="register" name="register" id="register">Register</button>
                        <div class="options">
                            <span>Already registered?<a href="index.php">Log In</a></span>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php
include("connect.php");
if(isset($_POST['register']))
{

$fer = $ler = $per = $cper = "";
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$pass = $_POST['passWord'];
$cpass = $_POST['cpassWord'];
$uname =$_POST['userName'];


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
            mysqli_commit($conn);
       }
     }

}
?>

</html>
