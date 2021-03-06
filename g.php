<?php

session_start();
if(!$_SESSION['username'])
{
  header("Location: index.php");//redirect to the login page to secure the welcome page without login access.
}

if ( isset($_POST['logout']) )
{
    header('Location: logout.php');
    return;
}

$curuser = $_SESSION['username'];
$names = array('Rock', 'Paper', 'Scissors');
$human = isset($_POST["human"]) ? $_POST['human']+0 : -1;

$computer = 0;
$computer = rand(0,2);
$win = $loss = $tie = 0;
function check($computer, $human) {
    if ( $human == $computer )
    {
        $GLOBALS['tie']++;
        return "Tie";
    }
    else if ( $human == 0 && $computer == 2)
    {
        $GLOBALS['win']++;
        return "You Win";
    }
    else if ( $human == 1 && $computer == 0)
    {
        $GLOBALS['win']++;
        return "You Win";
    }
    else if ( $human == 2 && $computer == 1)
    {
        $GLOBALS['win']++;
        return "You Win";
    }
    else if ( $human == 0 && $computer == 1)
    {
        $GLOBALS['loss']++;
        return "You Lose";
    }
    else if ( $human == 1 && $computer == 2)
    {
        $GLOBALS['loss']++;
        return "You Lose";
    }
    else if ( $human == 2 && $computer == 0)
    {
      $GLOBALS['loss']++;
      return "You Lose";
    }
    return false;
}

// Check to see how the play happenned
$result = check($computer, $human);
$msg=0;
if($result)
{
    $usernamenew=$_SESSION['username'];
    include("connect.php");
    if($win)
    {
      if(mysqli_query($conn, "UPDATE `game`
      SET `win`= `win`+1
      WHERE `username` = '$usernamenew'"))
      {
        $msg= 1;
      }
      else
      {
        echo "ERROR: Hush! Sorry. ". mysqli_error($conn);
      }
    }
    else if($loss)
    {
      if(mysqli_query($conn, "UPDATE `game`
      SET `loss`= `loss`+1
      WHERE `username` = '$usernamenew'"))
      {
        $msg=1;
      }
      else
      {
        echo "ERROR: Hush! Sorry. ". mysqli_error($conn);
      }
    }
    else if($tie)
    {
      if(mysqli_query($conn, "UPDATE `game`
      SET `tie`= `tie`+1
      WHERE `username` = '$usernamenew'"))
      {
        $msg=1;
      }
      else
      {
        echo "ERROR: Hush! Sorry. ". mysqli_error($conn);
      }
    }
    else
    {
        echo "NOTHING";
    }

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Training Project- Rock, Paper, Scissors Game</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <?php //require_once "bootstrap.php"; ?>
  <style>
  .container {
    text-align: center;
    border: 1px solid #FFFF00;
    background-color: #6f4e37;
    border-radius: 10px;
    margin-top: 90px;
    width: 50%;
    height: auto;
    margin: auto;
    margin-top: 90px;

  }
  .heading{
    text-align: center;
  }
  /* HIDE RADIO */
  [type=radio] {
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* IMAGE STYLES */
[type=radio] + img {
  cursor: pointer;
}

/* CHECKED STYLES */
[type=radio]:checked + img {
  outline: 2px solid #EFE2BA;
  border-radius: 2px;
}
  </style>

</head>
<body>
<header>
  <nav class="navbar">
    <ul>
      <li><a href="profile.php"><?php echo $_SESSION['username']?></a></li>
      <li><a href="leaderboard.php">Leaderboard</a></li>
      <li style="float:right;"><a class="active" href="#about">About</a></li>
      <li style="float:right;"><a href="logout.php">Log out</a></li>
    </ul>
  </nav>
</header>

<div class="container">
<h1 style="color:#EFE2BA;" class="heading">Rock Paper Scissors</h1>
<form action="g.php" method="post" >
  <label>
    <input style="height: 30px; width: 30px;" type="radio" name="human" value="0" checked>ROCK
    <img src="icons8-rock-50.png">
  </label>

  <label>
    <input style="height: 30px; width: 30px;" type="radio" name="human" value="1">PAPER
    <img src="icons8-paper-50.png">
  </label>
  <label>
    <input style="height: 30px; width: 30px;" type="radio" name="human" value="2">SCISSORS
    <img src="scissors.png">
  </label>
  <br><br>
  <input style="background-color: RED; border-radius: 6px;" type="submit" name="btn" value="Play">
</form>


<pre style="color:#EFE2BA;">
<?php
if ( $human == -1 )
{
    print "Please select a strategy and press Play.\n";
}
else
{
    if($computer == 0)
    {
      echo '<img src="icons8-rock-50.png"><br>';
      echo "Computer chooses ROCK";
      echo '<br>';
      echo "$result";
    }
    else if($computer == 1)
    {
      echo '<img src="icons8-paper-50.png"><br>';
      echo "Computer chooses PAPER";
      echo '<br>';
      echo "$result";
    }
    else if($computer == 2)
    {
      echo '<img src="scissors.png"><br>';
      echo "Computer chooses SCISSORS";
      echo '<br>';
      echo "$result";
    }
    //print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
}

?>
</pre>
<p style="color:#04AA6D;"><?php if($msg===1)
{
  echo "Play Again!";
  $msg=0;
}

?></p>
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
