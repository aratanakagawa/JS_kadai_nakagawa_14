<?php

session_start();

$id=intval($_POST["id"]);
$num=intval($_POST["num"]);
$fname=$_POST["fname"];
$item=$_POST["item"];
$price=intval($_POST["price"]);

$_SESSION["cart"]["$id"]=array($item,$price,$num,$fname);

$view="";
foreach($_SESSION["cart"] as $key->$value){
  $view.='<li class="cart-list">';
  $view.='<p class="cart-thumb"><img
  src="../img/'.$value[1].'" width="200" class="cart-img"></p>';
  $view.='<p class="cart-title">'.$value[0].'</p>';
  $view.='<p class="cart-price">'.$value[1].'</p>';
  $view.='<p class="cart-number">'.$value[2].'</p>';
  // $view.='<p class="cart-number"></p>';
  // $view.='<a href="#" class="btn-update">Edit</a>';
  $view.='<a href="cartremove.php?id='.$key.'" class="btn-delete">Delete</a>';
  $view.='</li>';
}

header("Location: cart.php");
exit();
 ?>
