<?php
session_start();

if($_SERVER["REQUEST_METHOD"]=="GET"){
  if(isset($_GET["name"]) && $_GET["name"]=="Dencrement"){
    if( $_SESSION['products'][$_GET['id']][0]>0){
        $_SESSION['products'][$_GET['id']][0]-=1;
    }
    if($_SESSION['products'][$_GET['id']][0]==0){
        unset ($_SESSION["products"][$_GET['id']]);
    }
  
    header("location:cart.php");

  }

  if(isset($_GET["name"]) && $_GET["name"]=="Increment"){
    $_SESSION['products'][$_GET['id']][0]+=1;
    header("location:cart.php");

  }

  if(isset($_GET["name"]) && $_GET["name"]=="delete"){
    unset ($_SESSION["products"][$_GET['id']]);
    header("location:cart.php");

  }

}



?>