<?php

$errorMessages = [];
$successMessages = [];

$civilities = ['mister', 'miss'];

// Form sent
if(!empty($_POST))
{
  // Default gender
  if(!isset($_POST['civility']))
  {
    $_POST['civility'] = '';
  }

  // Retrieve form data
  $login = trim($_POST['login']);
  $password = $_POST['password'];
  $age = (int)$_POST['age'];
  $civility = $_POST['civility'];

  // Handle errors
  if(empty($login))
  {
    $errorMessages[] = 'Missing login';
  }

  if(empty($password))
  {
    $errorMessages[] = 'Missing password';
  }
  else if(strlen($password) < 4)
  {
    $errorMessages[] = 'Your password is too short. It must contains at least 4 characters.';
  }

  if(empty($age))
  {
    $errorMessages[] = 'Missing age';
  }
  else if($age <= 0 || $age > 120)
  {
    $errorMessages[] = 'Wrong age';
  }

  if(empty($civility))
  {
    $errorMessages[] = 'Missing civility';
  }
  else if(!in_array($civility, $civilities))
  {
    $errorMessages[] = 'Wrong civility';
  }

  // Success
  if(empty($errorMessages))
  {
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $prepare = $pdo->prepare('
      INSERT INTO 
        users (login, password, age, civility)
      VALUES
        (:login, :password, :age, :civility)
    ');

    $prepare->bindValue('login', $login);
    $prepare->bindValue('password', $hash);
    $prepare->bindValue('age', $age);
    $prepare->bindValue('civility', $civility);

    $prepare->execute();

    $successMessages[] = 'User registered';

    $_POST['login'] = '';
    $_POST['password'] = '';
    $_POST['age'] = '';
    $_POST['civility'] = '';
  }
}

// Form not sent
else
{
  $_POST['login'] = '';
  $_POST['password'] = '';
  $_POST['age'] = '';
  $_POST['civility'] = '';
}

?>