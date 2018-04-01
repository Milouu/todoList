<?php
  session_start();

  include '../includes/config.php';

  $exec = $pdo->exec('DELETE FROM tasks WHERE id = ' . $_GET['task_id']);

  header('Location: ../index.php')
?>