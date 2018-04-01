<?php
  session_start();

  include '../includes/config.php';

  if($_GET['task_validation'])
  {
    $exec = $pdo->exec('UPDATE tasks SET validated = 0 WHERE id = '. $_GET['task_id']);
  }
  else
  {
    $exec = $pdo->exec('UPDATE tasks SET validated = 1 WHERE id = '. $_GET['task_id']);
  }

  header('Location: ../index.php');
?>