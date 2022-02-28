<?php
  session_start();
  include("connect.php");
  $uid=$_SESSION['username'];
  $time=time();
  $view_users_query="SELECT user.firstname,user.lastname,user.username,game.win,game.loss,game.tie,user.last_login FROM user JOIN game ON (user.personid=game.personid)";//select query for viewing users.
  $run=mysqli_query($conn,$view_users_query);
  $html='';
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
      $html.='<tr>
                <td>'.$firstname.'</td>
                <td>'.$lastname.'</td>
                <td>'.$username.'</td>
                <td>'.$wins.'</td>
                <td>'.$losses.'</td>
                <td>'.$ties.'</td>
                <td><button type="button" class="btn '.$class.'">'.$status.'</button></td>
            </tr>';

    }
    echo $html;
 ?>
