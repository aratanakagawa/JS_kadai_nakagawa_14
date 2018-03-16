<?php

try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

$stmt=$pdo->prepare("select * from ec_table");
$status=$stmt->execute();

$view="";
if($status==false){
  $error=$stmt->errorInfo();
  exit("QueryEror:".$error[2]);
}else{
  while($res=$stmt->fetch(PDO::FETCH_ASSOC)){
    $view.='<li class="cart-list">';
    $view.='<p class="cart-thumb"><img
    src="../img/'.$res["fname"].'" width="200" class="cart-img"></p>';
    $view.='<p class="cart-title">'.$res["price"].'</p>';
    $view.='<p class="cart-price">'.$res["fname"].'</p>';
    // $view.='<p class="cart-number"></p>';
    // $view.='<a href="#" class="btn-update">Edit</a>';
    $view.='<a href="#" class="btn-delete">Delete</a>';
    $view.='</li>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/reset.css">
  <title>Document</title>
</head>
<body>
  <header class="header">
    <p class="site-title"><a href="index.php">
    <img src="https://wac-cdn.atlassian.com/dam/jcr:616e6748-ad8c-48d9-ae93-e49019ed5259/Atlassian-horizontal-blue-rgb.svg?cdnVersion=jy"
    alt="EC site" class='logo'></a></p>
  </header>

  <div class="outer">
    <h1 class="pate-title">
      <div class="wapper wrapper-main flex-parent">
        <div class="wapper-main">
          <ul class="cart-products">
            <?= $view; ?>
          </ul>
        </div>
        <!-- <div class="wapper-thumb">
          <p class="pick-thumb">
            <img src="../img/is.jpg" alt="" width="200" class="pick-img">
          </p>
        </div> -->

      </div>
    </h1>
  </div>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="main.js" charset="utf-8"></script>

</body>
</html>
