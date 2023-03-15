<?php
    $path = getcwd() . '/data/';
    $username = $_POST['username'];
    $time = $_POST['time'];
$ip = $_SERVER['REMOTE_ADDR']; 
    file_put_contents($path . 'admin_report.txt', "$username : $time : $ip\n", FILE_APPEND);
?>