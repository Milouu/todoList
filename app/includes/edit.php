<?php

if(!empty($_GET))
{
  // Retrieve task data
  $title = $_GET['title'];
  $due_date = $_GET['due_date'];
  $content = $_GET['content'];

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
    $exec = $pdo->exec('UPDATE tasks SET title = '.$title.', due_date = ' .$due_date. ', content = ' .$content. 'WHERE id = ' .$_GET['editTask_id']);

    $_GET['title'] = '';
    $_GET['due_date'] = '';
    $_GET['content'] = '';
  }
}

?>