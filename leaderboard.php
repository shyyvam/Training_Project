<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0\dist\css\bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>View Users</title>
</head>
<style>
    .login-panel {
        margin-top: 150px;
    }
    .table {
        margin-top: 50px;
     }
</style>

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
    <li><a href="g.php">Home</a></li>
    <li><a href="updatepass.php">Update Password</a></li>
    <li><a href="allusers.php">View Players</a></li>
    <li style="float:right"><a class="active" href="#about">About</a></li>
    <li style="float:right"><a href="logout.php">Log out</a></li>
  </ul>
<div class="table-scrol">
    <h1 align="center">Leaderboard</h1>

<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
        <thead>

        <tr>

            <th>First Name</th>
            <th>Last Name</th>
            <th>User Name</th>
            <th>Status</th>
            <th>Wins</th>
            <th>Losses</th>
            <th>Ties</th>
        </tr>
        </thead>

        <?php
        include("connect.php");
        $view_users_query="SELECT user.firstname,user.lastname,user.username,user.status,game.win,game.loss,game.tie FROM user JOIN game ON (user.personid=game.personid) ORDER BY game.win DESC, game.loss ASC";//select query for viewing users.
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

        <tr>
            <td><?php echo $firstname;  ?></td>
            <td><?php echo $lastname;  ?></td>
            <td><?php echo $username;  ?></td>
            <td><?php echo $status;  ?></td>
            <td><?php echo $wins;  ?></td>
            <td><?php echo $losses;  ?></td>
            <td><?php echo $ties;  ?></td>

        </tr>

        <?php } ?>

    </table>
        </div>
</div>
</body>

</html>
