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
      // echo '<pre>';
      // var_dump($user->password, $hash);
      // echo '</pre>';
     

      if($login == $user->login && password_verify($password, $user->password))
      {
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
      $successMessages[] = "Connection successfull";
    }
    else
    {
      $errorMessages[] = "Login and/or password incorrect";
   }
    
    // if(connection_check($_POST['login'], $_POST['password'], $users))
    // {
    //   $successMessages[] = 'Connection successful';
    // }
    // else
    // {
    //   $errorMessages[] = 'Login and/or password incorrect';
    // }   
  }
  // Form not sent
  else 
  {
    $_POST['login'] = '';
    $_POST['password'] = '';
  }
?>


