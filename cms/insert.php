<?php

if(!isset($_POST["item"]) || $_POST["item"]==""){
  exit("ParamError");
}

if(!isset($_POST["price"]) || $_POST["price"]==""){
  exit("ParamError");
}

if(!isset($_POST["description"]) || $_POST["description"]==""){
  exit("ParamError");
}

if(!isset($_FILES["fname"]["name"]) || $_FILES["fname"]["name"]==""){
  exit("ParamError");
}

$fname=$_FILES["fname"]["name"];
$item=$_POST["item"];
$price=$_POST["price"];
$description=$_POST["description"];

// echo "ここに出る";
// var_dump($_FILES["fname"]);
// echo $item;
// echo $price;
// echo $description;

$upload="./img/";
if(move_uploaded_file($_FILES["fname"]["tmp_name"],$upload.$fname)){

}else{
  echo "upload failed";
  echo $_FILES['fname']['error'];
}

try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

$stmt=$pdo->prepare("insert into ec_table(id,item,price,description,fname,indate)
values(null, :item, :price,:description, :fname, sysdate())");
$stmt->bindValue(':item', $item, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_INT);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
$status=$stmt->execute();


if($status==false){
  $error=$stmt->errorInfo();
  exit("QueryEror:".$error[2]);
}else{
  header("Location: item.php");
  exit;
}



 ?>
