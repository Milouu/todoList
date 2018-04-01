<?php
  session_start();
  
  include 'includes/config.php';
  include 'includes/handle_taskform.php';

  if(isset($_SESSION['user']))
  {
    $query = $pdo->query('SELECT * FROM tasks WHERE user_id = '. $_SESSION['id']);
    $tasks = $query->fetchAll();
  }
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">
    <link rel="manifest" href="assets/images/manifest.json">
    <link rel="mask-icon" href="assets/images/safari-pinned-tab.svg" color="#20e905">
    <meta name="theme-color" content="#ffffff">

    <link href="https://fonts.googleapis.com/css?family=Chicle|Roboto+Slab" rel="stylesheet">

    <title>todoList</title>
    <link rel="stylesheet" href="styles/css/base/reset.css" />
    <link rel="stylesheet" href="styles/css/main.css" />
  </head>
  <body>
    <header>
      <a href="#">
        <h1>Simple todoList</h1>
      </a>

    <?php
    if(!isset($_SESSION['user']))
    {
    ?>
      <div class="headerButtons">
        <a href="pages/sign_up.php" class="signupBtn">Sign up</a>
        <a href="pages/sign_in.php" class="signinBtn">Sign in</a> 
      </div> 
    </header>  

    <?php
    }
    else
    {
    ?>
      <div class="headerButtons">
        <span class="welcome">Welcome <?= $_SESSION['user'] ?></span>
        <a href="functions/deconnection.php">Deconnection</a> 
      </div>
    </header>  
      <div class="taskList">
        <?php foreach($tasks as $task): ?>
        <div class="task">
          <a href="functions/deleteTask.php?task_id=<?= $task->id ?>">
            <img src="assets/images/x.svg" alt="close" class="close">
          </a>  
          <h3><?= $task->title ?></h3>
          <span><?= $task->due_date != '0000-01-01' ? $task->due_date : '' ?></span>
        </div>
        <?php endforeach; ?> 
      </div>

    <?php
    }
    ?> 

    <a href="#" class="newTaskBtn">Create new task</a>

    <div class="popup newTask">
      <h2>New Task</h2>
      <img src="assets/images/xw.svg" alt="close" class="close closeNewTask">

      <?php foreach($errorMessages as $message): ?>
      <p class="errorMessages"><?= $message ?></p>
      <?php endforeach; ?>

      <?php foreach($successMessages as $message): ?>
        <p class="successMessages"><?= $message ?></p>
      <?php endforeach; ?>

      <form action="#" method="post">
        <div class="formContainer taskformContainer">
          <input id="title" type="text" name="title" value="<?= $_POST['title'] ?>">
          <label for="title">Title</label>

          <br>
          
          <input id="due_date" type="date" name="due_date" value="<?= $_POST['due_date'] ?>">
          <label for="due_date">Due date</label>

          <br>
          
          <textarea name="content" id="content" cols="30" rows="10"><?= $_POST['content'] ?></textarea>
          <p>Description</p>

          <br>

          <input type="submit" value="Confirm">
        </div> 
      </form>
    </div>
      
    <script src="scripts/scripts.js"></script>
  </body>
</html>