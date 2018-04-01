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

    if(isset($due_date))
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
        users (title, creation_date, due_date, content, user_id)
      VALUES
        (:title, :creation_date, :due_date, :content, :user_id)
      ');

      // Binds values to form data
      $prepare->bindValue('title', $tile);
      $prepare->bindValue('creation_date', date('Y-m-d'));
      $prepare->bindValue('due_date', $due_date);
      $prepare->bindValue('content', $content);
      $prepare->bindValue('user_id', $_SESSION['id']);

      $prepare->execute();

      $_POST['title'] = '';
      $_POST['due_date'] = '';
      $_POST['content'] = '';
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