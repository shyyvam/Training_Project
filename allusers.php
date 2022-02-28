<html>
<head lang="en">
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0\dist\css\bootstrap.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>View Users</title>
    <style>
        .login-panel {
            margin-top: 100px;
        }
        .table {
            margin-top: 50px;
         }
         .navbar {
           padding-bottom: 0;
           height: 8px;
           margin-top: 15px;
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
    <li><a href="g.php">Home</a></li>
    <li><a href="profile.php"><?php echo $_SESSION['username'];?></a></li>
    <li><a href="updatepass.php">Update Password</a></li>
    <li><a href="leaderboard.php">Leaderboard</a></li>
    <li style="float:right"><a class="active" href="#about">About</a></li>
    <li style="float:right"><a href="logout.php">Log out</a></li>
  </ul>
</nav>
<div class="table-scrol">
    <h1 align="center">All the Users</h1>

<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped" style="table-layout: fixed">
        <thead>

        <tr>

            <th>First Name</th>
            <th>Last Name</th>
            <th>User Name</th>
            <th>Wins</th>
            <th>Losses</th>
            <th>Ties</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody id="user_grid">
        <?php
        include("connect.php");
        $view_users_query="SELECT user.firstname,user.lastname,user.username,game.win,game.loss,game.tie,user.last_login FROM user JOIN game ON (user.personid=game.personid)";//select query for viewing users.
        $run=mysqli_query($conn,$view_users_query);
        $time = time();
        while($row=mysqli_fetch_array($run))
        {
            $status='Offline';
            $class="btn-danger";
            if($row['last_login']>$time)
            {
              $status='Online';
              $class="btn-success";
            }
            $firstname=$row[0];
            $lastname=$row[1];
            $username=$row[2];
            $wins=$row[3];
            $losses=$row[4];
            $ties=$row[5];

        ?>

        <tr>
            <td><?php echo $firstname;  ?></td>
            <td><?php echo $lastname;  ?></td>
            <td><?php echo $username;  ?></td>
            <td><?php echo $wins;  ?></td>
            <td><?php echo $losses;  ?></td>
            <td><?php echo $ties;  ?></td>
            <td><button type="button" class="btn <?php echo $class?>"><?php echo $status?></button></td>
        </tr>

        <?php } ?>
      </tbody>

    </table>
    </div>
</div>
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
