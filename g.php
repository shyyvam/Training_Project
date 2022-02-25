<?php

session_start();
if(!$_SESSION['username'])
{
  header("Location: index.php");//redirect to the login page to secure the welcome page without login access.
}
/*(if($_SERVER["REQUEST_METHOD"] == "POST") {
   include("connect.php");
 }*/

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
        $GLOBAL['loss']++;
        return "You Lose";
    }
    return false;
}

// Check to see how the play happenned
$result = check($computer, $human);
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
        echo "Play again!";
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
        echo "Play again!";
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
        echo "Play again!";
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
<?php require_once "bootstrap.php"; ?>
</head>
<body>
<ul>
    <li><a href="profile.php"><?php echo $_SESSION['username']?></a></li>
    <li><a href="leaderboard.php">Leaderboard</a></li>
    <li style="float:right"><a class="active" href="#about">About</a></li>
    <li style="float:right"><a href="logout.php">Log out</a></li>
</ul>
<div class="container">

<h1>Rock Paper Scissors</h1>
<form action="g.php" method="post" >
  <select name="human">
      <option value="-1">Select</option>
      <option value="0">Rock</option>
      <option value="1">Paper</option>
      <option value="2">Scissors</option>
      <option value="3">Test</option>
  </select>
  <input type="submit" value="Play">
</form>

<pre>
<?php
if ( $human == -1 )
{
    print "Please select a strategy and press Play.\n";
}
else if ( $human == 3 )
{
    for($c=0;$c<3;$c++)
    {
        for($h=0;$h<3;$h++)
        {
            $r = check($c, $h);
            print "Human=$names[$h] Computer=$names[$c] Result=$r\n";
        }
    }
}
else
{
    print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
}
?>
</pre>
</div>
</body>
</html>
