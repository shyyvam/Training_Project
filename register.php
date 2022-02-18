

<!doctype html>

<html>

<body>

<div class="container ">

    <h1 class="text-center">Register Here!</h1>
    <form action="index.php" method="post">
        <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" class="form-control" id="fname"
            name="fname">
        </div>
        <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" id="lname"
            name="lname">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
        <input type="text" class="form-control" id="username"
            name="username" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control"
            id="password" name="password">
        </div>

        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control"
                id="cpassword" name="cpassword">

            <small id="password help" class="form-text text-muted">
            Make sure to type the same password
            </small>
        </div>

        <button type="submit" class="btn btn-primary">
        SignUp
        </button>
    </form>
</div>
<?php
$fn=$_POST['fname'];
$ln=$_POST['lname'];
$un=$_POST['username'];
$ps=$_POST['password'];
$sql = "INSERT INTO `data` (`firstname`, `lastname`, `username`, `score`,`password`) VALUES (`$fn`, '$ln`, `$un`,`0`,''$ps')";


$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
}
 ?>




</body>
</html>
