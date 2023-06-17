<?php
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'biliklah_db';

  $sambungan = mysqli_connect($host, $user, $password, $database)
  or die('Connection error');
  echo "";      
?>