<?php
  // Destroys the current session
  session_start();
  session_destroy();
  header('Location: ../index.php');
  exit;
?>