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
<?php
function setConfirmMessage(confirm_password) {
 var password = document.getElementById("password").value;
 var message = "";
 if (password == confirm_password) {
   message = "";
 } else {
   message =  "please input same characters in both password form";
 }

 var div = document.getElementById("pass_confirm_message");
 if (!div.hasFistChild) {div.appendChild(document.createTextNode(""));}
 div.firstChild.data = message;
}
?>


