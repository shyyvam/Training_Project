<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <link  type="text/css" href="style.css" rel="stylesheet">
    <style>
    body
    {
            margin: auto;
            padding: 30px;
            background-color:#EFE2BA;
            font-family: 'Arial';
            max-width: 500px;
    }
    .login{
            width: 382px;
            overflow: hidden;
            margin: auto;
            margin: 20 0 0 450px;
            padding: 80px;
            background: YELLOW;
            border-radius: 15px ;

    }
    .check{
            padding-left: 17px;
            font-size: 27px;
    }
    h2{
            text-align: center;
            color: #7E685A;
            padding: 20px;
    }
    #log{
            width: 400px;
            height: 30px;
            border: none;
            border-radius: 17px;
            padding-left: 7px;
            color: Brown;
            margin: auto;
    }
    span{
            color: grey;
            font-size: 17px;
            padding-left: 10px;
    }
    .a{
            float: right;
            background-color: grey;
    }
    </style>
</head>
<body style="margin-left: 520px;">
  <div class="formcontainer">
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
            <!--<span style="color:red;"><//?php echo $msg ?></span>-->
            <br><br>
            <input type="checkbox" checked="checked" id="check" name="remember">
            <span>Remember me</span>
            <br><br>
      </div>

      <div class="container">
        <span>New user? <a href="index.php?function=register" class="btn">register</a></span>
      </div>
    </div>
  </form>
</div>
</body>
</html>
