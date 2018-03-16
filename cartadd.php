<?php

session_start();

if(!isset($_POST["item"]) || $_POST["item"]==""){
  exit("ParamError");
}

if(!isset($_POST["price"]) || $_POST["price"]==""){
  exit("ParamError");
}

if(!isset($_POST["id"]) || $_POST["id"]==""){
  exit("ParamError");
}

if(!isset($_POST["num"]) || $_POT["num"]==""){
  exit("ParamError");
}

if(!isset($_POST["fname"]) || $_POT["fname"]==""){
  exit("ParamError");
}

$id=intval($_POST["id"]);
$num=intval($_POST["num"]);
$fname=$_POST["fname"];
$item=$_POST["item"];
$price=intval($_POST["price"]);

$_SESSION["cart"]["$id"]=array($item,$price,$num,$fname);

header("Location: cart.php");
exit();
 ?>
