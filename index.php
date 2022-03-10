<?php
session_start();
include("connect.php");
$msg = '';
if(isset($_POST['log']))
{
  $un=$_POST['userName'];
  $up=$_POST['passWord'];

  $check_user="SELECT * from user WHERE username='$un'AND password='$up'";

  $run=mysqli_query($conn,$check_user);

  if(mysqli_num_rows($run))
  {
      $_SESSION['username']=$un;
      $time=time()+10;
      $res=mysqli_query($conn,"UPDATE user SET last_login=$time WHERE username='$un'");
      echo "<script>window.open('game.php','_self')</script>";


  }
  else
  {
      $msg="Please enter correct login details";
  }
}?>
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
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: auto;
            border: 2px solid White;
            border-radius: 15px;
            background: white;
        }

        .logo {
            margin-bottom: 15px;
            margin-top: 5px;
            padding-top: 0;
        }

        .logo img {
            width: 150px;
            margin: 10px;
            border-radius: 50px;
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
        #userName,#passWord {
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
            <div class="logo">
                <img src="rps.jpg" alt="Company Logo" srcset="">
            </div>
            <div class="login-form">
                <form action="login.php" method="post">
                    <div class="form-item">
                        <!-- <label for="userName">Username:</label> -->
                        <input type="text" name="userName" id="userName" placeholder="Username" required>
                    </div>
                    <div class="form-item">
                        <!-- <label for="passWord">Password:</label> -->
                        <input type="password" name="passWord" id="passWord" placeholder="Password" required>
                    </div>

                    <div class="form-btns">

                        <button type="submit" value="log" name="log" id="log">Login</button>
                        <div class="options">
                            <span>New user?<a href="register.php">Sign Up</a></span>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>



</body>

</html>
