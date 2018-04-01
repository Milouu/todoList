<?php
  include '../includes/config.php';
  include '../includes/handle_signin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign in</title>
  <link rel="stylesheet" href="../styles/css/base/reset.css" />
  <link rel="stylesheet" href="../styles/css/main.css" />
</head>
<body>

  <a href="../index.php">Accueil</a>

  <?php foreach($errorMessages as $message): ?>
    <p class="errorMessages"><?= $message ?></p>
  <?php endforeach; ?>

  <?php foreach($successMessages as $message): ?>
    <p class="successMessages"><?= $message ?></p>
  <?php endforeach; ?>
  
  <form action="#" method="post">

    <input id="login" type="text" name="login" value="">
    <label for="login">Login</label>

    <br>

    <input id="password" type="password" name="password" value="">
    <label for="password">Password</label>

    <br>

    <input type="submit" value="Connect">

  </form>  

</body>
</html>
