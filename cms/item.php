
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/reset.css">
  <title>EC登録ページへようこそ</title>
</head>
<body>
  <header class="header">
    <p class="title"><a href="index.php">
    <img src="https://wac-cdn.atlassian.com/dam/jcr:616e6748-ad8c-48d9-ae93-e49019ed5259/Atlassian-horizontal-blue-rgb.svg?cdnVersion=jy"
    alt="EC site" class='logo'></a>
      </p>
  </header>

  <form action="insert.php" method="POST" enctype="multipart/form-data" class="form">
      <div class="cms-thumb"><img src="http://www.worldcareer.jp/files/photo/2.jpg" alt="" width="200" class="thumb"></div>
    <dl>
      <dt>Image</dt>
      <dd><input type="file" name="fname" accept="image/*"></dd>
      <dt>Item name</dt>
      <dd><input type="text" name="item" placeholder="item name"></dd>
      <dt>Price</dt>
      <dd><input type="text" name="price" placeholder="price"></dd>
      <dt>Description</dt>
      <dd><textarea name="description" rows="8" cols="80">Description</textarea></dd>
    </dl>
    <ul class="btn_action">
      <li id="btn_back">
        <a href="./">Back</a>
      </li>
      <li>
        <input type="submit" value="submit">
      </li>
    </ul>

  </form>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="main.js" charset="utf-8"></script>

  </script>

</body>
</html>
