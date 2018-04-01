<?php
  session_start();
  
  include '../includes/config.php';
  include '../includes/handle_signup.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon-16x16.png">
  <link rel="manifest" href="../assets/images/manifest.json">
  <link rel="mask-icon" href="../assets/images/safari-pinned-tab.svg" color="#20e905">
  <meta name="theme-color" content="#ffffff">

  <link href="https://fonts.googleapis.com/css?family=Chicle|Roboto+Slab" rel="stylesheet">

  <title>Sign up</title>
  <link rel="stylesheet" href="../styles/css/base/reset.css" />
  <link rel="stylesheet" href="../styles/css/main.css" />
</head>
<body>
  <header>
    <a href="../index.php">
      <h1>Simple todoList</h1>
    </a>  
    <div class="headerButtons">
      <a href="#" class="signupBtn">Sign up</a>
      <a href="sign_in.php" class="signinBtn">Sign in</a> 
    </div> 
  </header> 

  <?php foreach($errorMessages as $message): ?>
    <p class="errorMessages"><?= $message ?></p>
  <?php endforeach; ?>

  <?php foreach($successMessages as $message): ?>
    <p class="successMessages"><?= $message ?></p>
  <?php endforeach; ?>
  
  <div class="onePageForms signupForm">
    
    <h2>Sign up</h2>

    <form action="#" method="post">
      <div class="formContainer signupformContainer">

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
            <input type="radio" name="civility" value="mister" <?= $_POST['civility'] == 'Mister' ? 'checked' : '' ?>>
            Mister
        </label>

        <label>
            <input type="radio" name="civility" value="miss" <?= $_POST['civility'] == 'miss' ? 'checked' : '' ?>>
            Miss
        </label>

        <br>

        <input type="submit" value="Submit">

      </div>
    </form>  
  </div>

</body>
</html>
