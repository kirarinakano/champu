 <?php
  $host = "127.0.0.1";
  $user="root";
  $pass="";
  $db="champu";
  
  $conn = mysqli_connect($host,$user,$pass,$db)or
   die("Datebase connection failed: " .
      mysqli_connect_error());
  ?>
  