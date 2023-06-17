<?php
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'biliklah_db';

  $connect = mysqli_connect($host, $user, $password, $database)
  or die('Connection error');
  echo "";      
?>