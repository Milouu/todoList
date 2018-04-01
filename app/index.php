<?php
  include 'includes/config.php';
  include 'includes/handle_taskform.php';

  session_start();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>todoList</title>
    <link rel="stylesheet" href="styles/css/base/reset.css" />
    <link rel="stylesheet" href="styles/css/main.css" />
  </head>
  <body>
    
    
    <?php
    if(!isset($_SESSION['user']))
    {
    ?>
      <div>
        <a href="pages/sign_up.php" class="signupBtn">Sign up</a>
        <a href="pages/sign_in.php" class="signinBtn">Sign in</a> 
      </div> 
    <?php
    }
    else
    {
    ?>
      <div>
        <span class="welcome">Welcome <?= $_SESSION['user'] ?></span>
        <a href="functions/deconnection.php">Deconnection</a> 
      </div>
    <?php
    }
    ?> 

    <a href="#" class="newTaskBtn">Create new task</a>

    <div class="popup newTask">
      <img src="assets/images/x.svg" alt="close" class="closeNewTask">
      <form action="#" method="post">
        <input id="title" type="text" name="title" value="">
        <label for="title">Title</label>

        <br>
        
        <input id="due_date" type="date" name="due_date" value="">
        <label for="due_date">Due date</label>

        <br>
        
        <textarea name="content" id="content" cols="30" rows="10"></textarea>

        <br>

        <input type="submit" value="Confirm">
      </form>
    </div>
      
    <script src="scripts/scripts.js"></script>
  </body>
</html>