<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";

    $database = "rockpaper";

     // Create a connection
     $conn = mysqli_connect($servername,
         $username, $password, $database);



    if($conn) {
        echo "success";
    }
    else {
        die("Error". mysqli_connect_error());
    }
    $sql = "CREATE TABLE newdata (
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
username VARCHAR(50) NOT NULL UNIQUE,
score INT DEFAULT 0,
password VARCHAR(10) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
  echo " Data created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
$firstname =  $_REQUEST['fname'];
$lastname = $_REQUEST['lname'];
$username = $_REQUEST['username'];
$Score = 0;
$pword = $_REQUEST['password'];

$checkuser="SELECT * FROM `newdata` WHERE username= '$username'";
$result=mysqli_query($conn,$checkuser);
$count=mysqli_num_rows($result);

    if($count==1)
    {
        echo "This username already exists";
    }
    else {

$sql = "INSERT INTO newdata(firstname,lastname,username,password)  VALUES ('$firstname',
           '$lastname','$username','$pword')";

       if(mysqli_query($conn, $sql)){
           echo "<h3>data stored in a database successfully."
               . " Please browse your localhost php my admin"
               . " to view the updated data</h3>";

           echo nl2br("\n$firstname\n $lastname\n "
               . "$username\n$Score $pword");
       } else{
           echo "ERROR: Hush! Sorry $sql. "
               . mysqli_error($conn);
       }

       // Close connection

     }
     mysqli_close($conn);
?>
