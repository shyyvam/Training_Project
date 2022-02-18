<html>
<head>
  <style>
    .imgcontainer{
      height: 100%;
      background-image: url("rock.png");
      background-size: cover;
      //background-blend-mode: lighten;

    }
    .container{
      margin-right: auto;
      margin-left: auto;
      position: static;
    }
  </style>
</head>
  <form action="index.php" method="post">
    <div class="imgcontainer">



      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">Login</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
      </div>

      <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
      </div>
      <div class="container">
        <span class="register">New user? <a href="register.php">register</a></span>
      </div>
      <div
    </div>
  </form>
</html>
