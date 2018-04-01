<?php
  $query = $pdo->query('SELECT * FROM users');
  $users = $query->fetchAll();


  $errorMessages = [];
  $successMessages = [];
  
  /** Takes a login, a password and a list of users as paramaters.
   * Checks if a user in the list has this login and password.
   * Return 1 if there is, 0 if not.
  **/
  function connection_check($login, $password, $users) 
  { 
    foreach($users as $user)
    {
      if($login == $user->login && password_verify($password, $user->password))
      {
        $_SESSION['id'] = $user->id;
        return 1;
      }
    }
    return 0;
  }

  //Form sent
  if(!empty($_POST))
  {  
    if(connection_check($_POST['login'], $_POST['password'], $users))
    {
      // $successMessages[] = 'Connection successfull';
      $_SESSION['user'] = $_POST['login'];
      
      // Redirecting to index.php after successfull connection
      header('Location: ../index.php');
    }
    else
    {
      $errorMessages[] = 'Login and/or password incorrect';
   }
  }
  // Form not sent
  else 
  {
    $_POST['login'] = '';
    $_POST['password'] = '';
  }
?>


