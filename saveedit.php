<?php
include 'champuconnect.php';

$Itemename = $_POST["Itemename"];
$Amount = $_POST["amount"];

$sql= "UPDATE champu SET Itemename='$itemname', Amount='$amount' WHERE infoID=$infoID";

if ($conn ->query($sql)=== TRUE) {
  echo "record is updated successfully";
}else {
  echo "Error during updating record:" . $conn->error;
}

?>

<a href="home.php">HOME</a>