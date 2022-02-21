<?php

$fer = $ler = $per = $cper = "";
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$pass = $_POST['password'];
$cpass = $_POST['cpassword'];
$uname =$_POST['username'];



  if(empty($fname){$fer = "Name is required!";}
  else {$name = clean($fname);
    if (!preg_match("/^[a-zA-Z-']*$/",$fname)) {
      $fer = "Not a valid format!";
    }
  }

  if (empty($lname) {
    $ler = "Name required!";
  } else {
    $lname = clean($lname);
    if (!preg_match("/^[a-zA-Z-']*$/",$lname)) {
      $ler = "Not a valid format!";
    }
  }



if (empty($password) {
  $per = "Password Required!";
} else{
  if (!preg_match("^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$", $password)) {
    $per = "Password should be atleast 8 characters long and must contain upper-case and lowercase";
  }
}

if (empty($cpassword) {
  $cper = "Password Required";
} else{
  if ($password != $cpassword) {
    $cper = "passwords do not match";
  }
}


function clean($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
© 2022 GitHub, Inc.
