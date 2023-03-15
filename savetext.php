<?php

  // security audit - make sure the user is logged in before making changes!
  if ($_COOKIE['loggedin'] == 'yes') {
    // if they are logged in make changes to the text files
    $banned = $_POST['banned'];
    $clearlog = $_POST['clear'];

    $path = getcwd() . '/data/';

    // put this into the text file
    file_put_contents($path.'banned.txt', $banned);
    if ($clearlog != "none") {
        file_put_contents($path . $clearlog, "");
    }

    // send them back to the form
    header('Location: adminpanel.php?confirmation=savedtext');
    exit();
  }
  else {
    // send them back to the admin page
    header('Location: adminpanel.php?error=notloggedin');
    exit();
  }

 ?>