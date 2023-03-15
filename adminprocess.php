<?php

  // grab the username & password
  $username = $_POST['username'];
  $password = $_POST['password'];
  $correctUser = "pikachu";
  $correctPass = "pokemon";


  // make sure they entered something into both blanks
  if ($username && $password) {

    // check to make sure the username & password are correct
    if ($username == $correctUser && $password == $correctPass) {
      // login successful!

      // drop a cookie on the client computer
      setcookie('loggedin', 'yes');

      // send them back to the form
      header('Location: adminpanel.php');
      exit();
    }
  
      // send them back to the form
      header('Location: adminpanel.php?error=incorrect');
      exit();
  }
  else {
    // send them back to the form
    header('Location: adminpanel.php?error=missinginfo');
    exit();
  }

 ?>