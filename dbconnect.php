<?php

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
    $sql = "CREATE TABLE Data (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
username VARCHAR(50) NOT NULL UNIQUE,
score INT,
password VARCHAR(10) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
  echo " Data created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
?>
