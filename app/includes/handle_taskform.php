<?php
  require './functions/validateDate.php';

  $errorMessages = [];
  $successMessages = [];

  // Form sent
  if(!empty($_POST))
  {
    // Retrieve form data
    $title = $_POST['title'];
    $due_date = $_POST['due_date'];
    $content = $_POST['content'];

    // Handle erros
    if(empty($title))
    {
      $errorMessages[] = 'Missing title';
    } 

    if(!empty($due_date))
    {
      if(!validateDate($due_date))
      {
        $errorMessages[] = 'Wrong date format';
      }
    }

    if(empty($errorMessages))
    {
      // Prepares INSERT INTO values
      $prepare = $pdo->prepare('
      INSERT INTO 
        tasks (title, creation_date, due_date, content, user_id)
      VALUES
        (:title, :creation_date, :due_date, :content, :user_id)
      ');

      // Binds values to form data
      $prepare->bindValue('title', $title);
      $prepare->bindValue('creation_date', date('Y-m-d'));
      $prepare->bindValue('due_date', !empty($due_date) ? $due_date : '0000-01-01');
      $prepare->bindValue('content', $content);
      $prepare->bindValue('user_id', isset($_SESSION['id']) ? $_SESSION['id'] : 0);

      $prepare->execute();

      $_POST['title'] = '';
      $_POST['due_date'] = '';
      $_POST['content'] = '';

      header('Location: index.php');
    }
  }
  // Form not sent
  else
  {
    $_POST['title'] = '';
    $_POST['due_date'] = '';
    $_POST['content'] = '';
  }

  ?>