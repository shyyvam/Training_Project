<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <style>
  h1
  {
      text-align: center;
  }
  tr:hover {
    background-color: #6f4e37;
  }
  table, th, td {
  border: 1px solid black;

  }
th, td {
  padding: 5px;
  text-align: left;
}
  .data {
    margin: auto;

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
<nav class="navbar">
  <ul>
    <li><a href="g.php">Home</a><li>
    <li><a href="allusers.php">View Players</a></li>
    <li><a href="updatepass.php">Update Password</a></li>
    <li style="float:right"><a class="active" href="#about">About</a></li>
    <li style="float:right"><a href="logout.php">Log out</a></li>
  </ul>
</nav>


<?php
$curruser = $_SESSION['username'];
$view_users_query="SELECT user.firstname,user.lastname,user.username,game.win,game.loss,game.tie FROM user JOIN game ON (user.personid=game.personid) WHERE user.username='$curruser' ";//select query for viewing users.
$run=mysqli_query($conn,$view_users_query);


while($row=mysqli_fetch_array($run))
{
    $firstname=$row[0];
    $lastname=$row[1];
    $username=$row[2];
    $wins=$row[3];
    $losses=$row[4];
    $ties=$row[5];

?>
<h1><?php echo $firstname?></h1>
<br></br>
<table style="width:50%" class="data">

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
<script>
  function updateUserStatus()
  {
    jQuery.ajax({
        url:'update_user_status.php',
        success:function(){

        }
    });
  }
  function getUserStatus()
  {
    jQuery.ajax({
        url:'get_user_status.php',
        success:function(result){
          jQuery('#user_grid').html(result);
        }
    });
  }
  setInterval(function(){
    updateUserStatus();
  },1000);
  setInterval(function(){
    getUserStatus();
  },2000);
</script>
</body>
</html>
