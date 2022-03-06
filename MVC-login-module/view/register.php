

<!doctype html>

<html>
<head>
  <title>REGISTRATION
  </title>
  <link rel="stylesheet" type="text/css" href="style.css">
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
  label{
          color: #7E685A;
          font-size: 17px;
  }
  #fname{
      width: 300px;
      height: 30px;
      border: none;
      border-radius: 3px;
      padding-left: 8px;
      text-align: center;

  }
  #lname{
      width: 300px;
      height: 30px;
      border: none;
      border-radius: 3px;
      padding-left: 8px;
      text-align: center;

  }
  #username{
          width: 300px;
          height: 30px;
          border: none;
          border-radius: 3px;
          padding-left: 8px;
          text-align: center;
  }
  #password{
          width: 300px;
          height: 30px;
          border: none;
          border-radius: 3px;
          padding-left: 8px;
          text-align: center;
  }
  #cpassword{
          width: 300px;
          height: 30px;
          border: none;
          border-radius: 3px;
          padding-left: 8px;
          text-align: center;
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
</html>
