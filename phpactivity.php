<!DOCTYPE html>
<?php
include 'champuconnect.php';
$sql ="SELECT * FROM itemdata";
$result = $conn->query($sql);
?>
<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<a href="champu.html"><button>
    Add Info
  </button></a>
<br><br>
<table>
  <tr>
    <th>userID</th>
    <th>item</th>
    <th>Amount</th>


  </tr>
<?php
if($result->num_roms > 0) {
  while($row =$result->fetch_assoc()){
    echo"<tr>";
    echo"<td>". $row["usreID"] . ""
      echo"<td>"
      echo"<td>"
      echo"<td>"
      echo"<td>"
      echo"<td>"
      echo"<td>"
    }
}


</table>



</body>
</html>
