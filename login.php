<?php
 include 'insert.php';

$Password = $_POST['Password'];
$UserName = $_POST['UserName'];

 $sql = "SELECT * FROM  WHERE UserName = '$UserName' AND Password = '$Password'";
 $result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "Welcome back " . $UserName . "<br><a href='login.php'>logout</a><br><a href='main.html'>enter</a>";
} else {
  echo "Error: " . $UserName . " and " . $Password . "are not correct.";
}
$pages    = mb_convert_kana($_POST['pages'], "ans", "utf-8");
?>
