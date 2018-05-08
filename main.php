<?php
include 'connect.php';

$sql = "SELECT * FROM itemdata";
$result = $conn->query($sql);
?>
<!DOCTYPE html1>
<html>
<head>
    <title>main</title>
    <link rel="stylesheet" href="style.css">
    <script src="getDate.js"></script>
</head>
  <body>
    <div class="header">
      
  <a href="login.php"><button>Logout</button></a>
    </div>
    <a href="additem.php"><button>Add New Item</button></a>
    <table>
      <tr>
      <th>Item</th>
      <th>ml</th>
      <th>Start day</th>
      <th>End day</th>
      <th>Average</th>
      <th>Days left</th>
      <th></th>
      <th></th>
      </tr>
     <?php
       if ($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>". $row["itemname"] . "</td>";
    echo "<td>" . $row["ml"] . "</td>";
    echo "<td>". $row["startday"] . "</td>";
    echo "<td>";
    echo "<a id='year'></a><a id='month'></a><a id='day'></a>";
    echo "</td>";
    echo "<td>". $row["average"] . "</td>";
    echo "<td>". $row["daysleft"] . "</td>";
    echo "<td>";
    echo "<a href='edit.php?userID=" . $row['userID'] . "'>";
    echo "<button>Edit</button></a>";
    echo "<a href='delete.php?userID=" . $row['userID'] . "'>";
    echo "<button>Delete</button></a>";
    echo "</td>";
    echo "<td>";
    echo "<a href='update.php?userID=" . $row['userID'] . "'>";
    echo "<button>Update</button></a>";
    echo "</td>";
    echo "</tr>";
  }}else{
    echo "0 results";
  }

?>
</table>
<div calss="calculater">
  <form
  outinput="resilt.value = average.value * tripday.value">
  <div class="average">
   <p>Average</p>
   <input type="text" name="average">
   <span>ml</span>
  <div>
  <p>×</p>
  <div class="trip">
   <p>Trip Day</p>
   <input type="text" name="average">
   <p>→</p>
   <p>You need</p>
   <output name="result">
   <p>ml</p>
