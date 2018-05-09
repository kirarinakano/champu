<?php
 include 'insert.php';

$Password = $_POST['Password'];
$UserName = $_POST['UserName'];

 $sql = "SELECT * FROM  WHERE UserName = '$UserName' AND Password = '$Password'";
 $result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "Welcome back " . $UserName . "<br><a href='login.php'>logout</a><br><a href='main.html'>enter</a>";
} else {
  echo "Error: Your username or/and password are wrong.";
}


function setConfirmMessage(confirm_password) {
 var password = document.getElementById("password").value;
 var message = "";
 if (password == confirm_password) {
   message = "";
 } else {
   message =  "please input same characters in both password form";
 }







?>
