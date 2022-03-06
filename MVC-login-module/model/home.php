<?php
  class homeModel {
    function __construct() {

    }
    function home() {
        $servername = "localhost";
        $username = "root";
        $password = "";

        $database = "rockpaper";

         // Create a connection
         $conn = mysqli_connect($servername,
             $username, $password, $database);
             if($conn)
             {
               echo "Connected";
             }
             else{
               echo "Failed";
             }

      session_start();
      $msg = '';
      if(isset($_POST['log']))
      {
        $un=$_POST['username'];
        $up=$_POST['password'];
        $sql="SELECT * from user WHERE username='$un'AND password='$up'";
        /*$stmt=$this->con->prepare($sql);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($data);*/
        $run=mysqli_query($conn,$sql);
        print_r($sql);
        if(mysqli_num_rows($run))
        {
            $_SESSION['username']=$un;
            $time=time()+10;
            $res=mysqli_query($con,"UPDATE user SET last_login=$time WHERE username='$un'");
            echo "<script>window.open('game.php','_self')</script>";


        }
        else
        {
            $msg="Please enter correct login details";
        }

        die();
        return $arr;
      }

    }
    function register()
    {
      $arr=array('title'=>'Register');
      return $arr;
    }
  }
?>
