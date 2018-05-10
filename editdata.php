<?php
include 'champuconnect.php';

$item = $_POST["Itemname"];
$amount = $_POST["amount"];


$sql ="INSERT INTO itemdata (Itemname, Amount)
  VALUES ('$item', '$amount') ";

if($conn->query($sql) ===TRUE){
  echo "New record created successfully";
}else{
  echo "Error:" .$sql."<br>".$conn->error;
}

?>
<br><br><br>
<a href="champu.html">HOME</a>