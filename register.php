<?php
include 'connect.php';

$Password = $_POST['Password'];
$Emailaddress = $_POST['Emailaddress'];
$UserName = $_POST['UserName'];


$sql = "INSERT INTO userinfo (UserName, Emailaddress, Password)
VALUES ('$UserName', '$Emailaddrss' '$Password')";

if ($conn->query($sql)) {
  echo "New record created successfully<br><a href='login.html'>login</a>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


    $pages    = mb_convert_kana($_POST['pages'], "ans", "utf-8");
?>    