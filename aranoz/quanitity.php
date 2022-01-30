<?php
session_start();

if($_SERVER["REQUEST_METHOD"]=="GET"){
  if(isset($_GET["name"]) && $_GET["name"]=="Dencrement"){
    if( $_SESSION['products'][$_GET['id']][0]>0){
        $_SESSION['products'][$_GET['id']][0]-=1;

        $_SESSION['products'][$_GET['id']]['Total']=$_SESSION['products'][$_GET['id']][0]*intval($_SESSION['products'][$_GET['id']]['product_price']);




        $discount_percentage_product= $_SESSION['products'][$_GET['id']]['Total'] *($_SESSION['products'][$_GET['id']]['product_discount']/100);
        $Total_product_after_dicount =$_SESSION['products'][$_GET['id']]['Total'] - $discount_percentage_product;
        $_SESSION['products'][$_GET['id']]['Total_after_discount']= $Total_product_after_dicount;


        $discount_percentage_product= ($_SESSION['products'][$_GET['id']]['product_discount']/100) *intval($_SESSION['products'][$_GET['id']]['product_price']);
        $price_product_after_dicount = intval($_SESSION['products'][$_GET['id']]['product_price'])- $discount_percentage_product;
        $_SESSION['products'][$_GET['id']]['product_price_after_discount']= $price_product_after_dicount;
     
    }


    else{
      $_SESSION['products'][$_GET['id']]['Total']=$_SESSION['products'][$_GET['id']]*intval($_SESSION['products'][$_GET['id']]['product_price']); 
      $_SESSION['products'][$_GET['id']]['Total_after_discount']=$_SESSION['products'][$_GET['id']]['Total'];
    $_SESSION['products'][$_GET['id']]['product_price_after_discount']=$_SESSION['products'][$_GET['id']]['product_price'];    
  }

    if($_SESSION['products'][$_GET['id']][0]==0){
        unset ($_SESSION["products"][$_GET['id']]);
    }
  
    header("location:cart.php");

  }







  if(isset($_GET["name"]) && $_GET["name"]=="Increment"){
    $_SESSION['products'][$_GET['id']][0]+=1;
  
    if( $_SESSION['products'][$_GET['id']][0]>0){

        $_SESSION['products'][$_GET['id']]['Total']=$_SESSION['products'][$_GET['id']][0]*intval($_SESSION['products'][$_GET['id']]['product_price']);




        $discount_percentage_product= $_SESSION['products'][$_GET['id']]['Total'] *($_SESSION['products'][$_GET['id']]['product_discount']/100);
        $Total_product_after_dicount =$_SESSION['products'][$_GET['id']]['Total'] - $discount_percentage_product;
        $_SESSION['products'][$_GET['id']]['Total_after_discount']= $Total_product_after_dicount;


        $discount_percentage_product= ($_SESSION['products'][$_GET['id']]['product_discount']/100) *intval($_SESSION['products'][$_GET['id']]['product_price']);
        $price_product_after_dicount = intval($_SESSION['products'][$_GET['id']]['product_price'])- $discount_percentage_product;
        $_SESSION['products'][$_GET['id']]['product_price_after_discount']= $price_product_after_dicount;
     
    }


    else{
      $_SESSION['products'][$_GET['id']]['Total']=$_SESSION['products'][$_GET['id']]*intval($_SESSION['products'][$_GET['id']]['product_price']); 
      $_SESSION['products'][$_GET['id']]['Total_after_discount']=$_SESSION['products'][$_GET['id']]['Total'];
    $_SESSION['products'][$_GET['id']]['product_price_after_discount']=$_SESSION['products'][$_GET['id']]['product_price'];    
  }



    
    
    header("location:cart.php");

  }

  if(isset($_GET["name"]) && $_GET["name"]=="delete"){
    unset ($_SESSION["products"][$_GET['id']]);
    header("location:cart.php");

  }

}



?>