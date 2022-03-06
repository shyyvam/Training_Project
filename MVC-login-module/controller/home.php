<?php
  class homeController{
    function __construct(){
      include('model/home.php');
      $this->obj=new homeModel();
    }
    function home(){
      $arr=$this->obj->home();
      include('view/page.php');

    }
    function register(){
      $arr=$this->obj->register();
      include('view/register.php');
    }
  }
?>
