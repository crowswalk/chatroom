<?php
  $path = getcwd() . '/data/';

  $message = $_POST['message'];

    $nickname = $_POST['nickname'];
    $roomNum = $_POST['chatNum'];
    $bannedtext = file_get_contents($path."banned.txt");
    $badwords = false;
    $pattern = array('/{/i', '/}/i', '/;/i', '/:/i',);

    $bannedWords = explode(" ", $bannedtext);

    for ($i = 0; $i < sizeof($bannedWords); $i++) {
      $containsWord = strpos($message, $bannedWords[$i]);
      if($containsWord !== false) {
          $badwords = true;
      }
    }
  if ($badwords) {
    file_put_contents($path . $roomNum . '.txt', "$nickname : [Message contained banned word(s)]\n", FILE_APPEND);
  } else {
    $findchars = preg_replace($pattern, '', $message);
    if (sizeof($findchars) > 0) {
      $message = $findchars;
    }
    file_put_contents($path . $roomNum . '.txt', "$nickname : $message\n", FILE_APPEND);
  }

  // tell the client that we are done
  print "ok";

 ?>