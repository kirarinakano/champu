<?php

session_start();
include 'connect.php';
$userID = 3;
$sql = "SELECT * FROM userinfo LEFT JOIN itemdata ON userinfo.userID = itemdata.userID
LEFT JOIN ";
$result = $conn->query($sql);
// $sql2 = "SELECT * FROM itemdata LEFT JOIN itemadddata ON itemdata.itemID = itemadddata.itemID";
// $result2 = $conn->query($sql2);

// if($conn->query($sql) ===TRUE){
//   echo "";
// }else{
//   echo "Error:" .$sql."<br>".$conn->error;
// }
// var_dump(isset($_POST["itemdata"]));
if (isset($_POST["itemdata"])) {
$item = $_POST["Itemname"];
$amount = $_POST["amount"];
$startday = $_POST["startday"];


$sql1 ="INSERT INTO itemdata (Itemname, Amount,userID)
  VALUES ('$item', '$amount', '$userID') ";

$sql4 = "SELECT itemID FROM itemdata";
$result1 = $conn->query($sql4);
 if ($result1->num_rows > 0){
  while($row = $result1->fetch_assoc()){
    $itemID = $row["itemID"];
  }} else {
      echo "0 results";
  }

$sql3 = "INSERT INTO itemadddata (Startday,itemID) VALUES('$startday','$itemID')";

if ($conn->query($sql1) ===TRUE) {
  echo "";
} else {
  echo "Error:" .$sql1."<br>".$conn->error;
}

if ($conn->query($sql3) ===TRUE) {
  echo "";
} else {
  echo "Error:" .$sql3."<br>".$conn->error;
}
}


if (isset($row["Itemname"])) {
 echo "<a style= 'color: #6ba3ff;' href='main.php'  class='link' >Back to main page</a>";     
 } else {
 
 }
// header("Location: main.php");
// exit();

?>

<html>
  
  <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="add.css">
  </head>
  <body>
    <div class="shy">
      <div class="syky">
        <div class="right">
         <button type="submit" class="logout">log out</button>
        </div>
         <form action="add.php" method="POST" >
         <br><br><br><br>
         <p class="item"> item name 
         <input type="text" class="size"name="Itemname"maxlength="20" minlength="1" required placeholder="1-20" autocomplete="off">Amount 
         <input type="number" class="amount"name="amount" min="1" required autocomplete="off">ml</p>
         <br><br>
         <p class="item">use start date</p> 
          <br>
      <div class="syky">  
        <input type="date" value="" name="startday" required>

<br><br><br> 
<button  type="submit" name="itemdata" class="register">Register</button><br><br>


    </div></form>
  </body>
  
</html>
