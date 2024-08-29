<?php
//hidup selalu koneksi.php
  $server = '127.0.0.1';
  $usr = 'root';
  $pwod = '';
  $DBs = 'db_tugas';
  $conn = mysqli_connect($server, $usr, $pwod, $DBs);
  if(!$conn){
    die("Koneksi lagi malas menyambung: " . mysqli_connect_error());
  }
?>