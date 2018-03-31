<?php
  include '../includes/config.php';
  include '../includes/handle_form.php';
  
  $query = $pdo->query('SELECT * FROM users');
  $users = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign up</title>
  <!-- <link rel="stylesheet" href="../styles/css/base/reset.css" /> -->
  <link rel="stylesheet" href="../styles/css/main.css" />
</head>
<body>

  <a href="../index.php">Accueil</a>

  <?php foreach($errorMessages as $message): ?>
    <p style="color: red;"><?= $message ?></p>
  <?php endforeach; ?>

  <?php foreach($successMessages as $message): ?>
    <p style="color: green;"><?= $message ?></p>
  <?php endforeach; ?>
  
  <form action="#" method="post">

    <input id="login" type="text" name="login" value="<?= $_POST['login'] ?>">
    <label for="login">Login</label>

    <br>

    <input id="password" type="password" name="password" value="<?= $_POST['password'] ?>">
    <label for="password">Password</label>

    <br>

    <input id="age" type="number" name="age" value="<?= $_POST['age'] ?>">
    <label for="age">Age</label>

    <br>

    <label>
        <input type="radio" name="civility" value="Mister" <?= $_POST['civility'] == 'Mister' ? 'checked' : '' ?>>
        Mister
    </label>

    <label>
        <input type="radio" name="civility" value="miss" <?= $_POST['civility'] == 'miss' ? 'checked' : '' ?>>
        Miss
    </label>

    <br>

    <input type="submit" value="Submit">

  </form>  

</body>
</html>
