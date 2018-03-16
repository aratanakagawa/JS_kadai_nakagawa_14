<?php
session_start();

if(!isset($_GET["id"]) || $_GET["id"]==""){
  exit("ParamError");
}else{
  $id=intval($_GET["id"]);
}

try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

$stmt=$pdo->prepare("select * from ec_table where id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status=$stmt->execute();

$view="";
if($status==false){
  $error=$stms->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  $row=$stmt->fetch();
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <form action="cartadd.php" method="post">
    <div class="outer">
      <main class="wrapper-main">
        <p><img src="./img/<?= $row["fname"] ?>" width="200"></p>
        <!-- 商品情報 -->
        <div class="flex-parent item-lable">
          <h1 class="item-name"><?= $row["item"]?></h1>
          <p class="item-price"><?= $row["price"]?></p>
          <p><input type="number" name="num" value="1" class="cartin-number"></p>
        </div>

        <!-- カートボタン -->
        <div class="flex-parent item-lable">
          <p><input type="submit" name="submit" value="AddCart" class="btn-cartin"></p>
        </div>

        <!-- 商品情報詳細 -->
        <div class="flex-parent item-lable">
          <p class="item-text"><?= $row["description"]?></p>
        </div>
        <input type="hidden" name="item" value="<?= $row["item"]?>">
        <input type="hidden" name="price" value="<?= $row["price"]?>">
        <input type="hidden" name="id" value="<?= $row["id"]?>">
        <input type="hidden" name="fname" value="<?= $row["fname"]?>">


      </main>

    </div>

  </form>

</body>
</html>
