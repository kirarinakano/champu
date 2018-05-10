<?php
include 'connect.php';

$Password = $_POST["Password"];
$Emailaddress = $_POST['Emailaddress'];
$UserName = $_POST['UserName'];


$sql = "INSERT INTO userinfo (userID, Username, Emailaddress, Password)
VALUES ('','$UserName', '$Emailaddress', '$Password')";

if ($conn->query($sql)) {
  header('Location: login.html');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


    //$pages    = mb_convert_kana($_POST['pages'], "ans", "utf-8");
?>
<?php

?>


