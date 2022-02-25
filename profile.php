<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <style>
  h1
  {
      text-align: center;
  }
  table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  }
th, td {
  padding: 5px;
  text-align: left;
}
  </style>
</head>
<body>
<?php
  session_start();
  include("connect.php");
  if(!$_SESSION['username'])
  {
    header("Location: index.php");//redirect to the login page to secure the welcome page without login access.
  }
?>

  <ul>
    <li><a href="g.php">Home</a><li>
    <li><a href="allusers.php">View Players</a></li>
    <li><a href="updatepass.php">Update Password</a></li>
    <li><a href="updatename.php">Update Name</a></li>
    <li style="float:right"><a class="active" href="#about">About</a></li>
    <li style="float:right"><a href="logout.php">Log out</a></li>
  </ul>


<?php
$curruser = $_SESSION['username'];
$view_users_query="SELECT user.firstname,user.lastname,user.username,user.status,game.win,game.loss,game.tie FROM user JOIN game ON (user.personid=game.personid) WHERE user.username='$curruser' ";//select query for viewing users.
$run=mysqli_query($conn,$view_users_query);


while($row=mysqli_fetch_array($run))
{
    $firstname=$row[0];
    $lastname=$row[1];
    $username=$row[2];
    $status=$row[3];
    $wins=$row[4];
    $losses=$row[5];
    $ties=$row[6];

?>
<h1><?php echo $firstname?></h1>
<br></br>
<table style="width:50%">

<tr>
    <th>First Name</th>
    <td><?php echo $firstname;  ?></td>
</tr>
<tr>
    <th>Last Name</th>
    <td><?php echo $lastname;  ?></td>
</tr>
<tr>
    <th>User Name</th>
    <td><?php echo $username;  ?></td>
</tr>
<tr>
    <th>Status</th>
    <td><?php echo $status;  ?></td>
</tr>
<tr>
    <th>Wins</th>
    <td><?php echo $wins;  ?></td>
</tr>
<tr>
    <th>Losses</th>
    <td><?php echo $losses;  ?></td>
</tr>
<tr>
    <th>Ties</th>
    <td><?php echo $ties;  ?></td>
</tr>
<?php } ?>
</table>

</body>
</html>
