<?php
include 'connect.php';

$sql = "SELECT * FROM itemdata";
$result = $conn->query($sql);
$sql1 = "SELECT * FROM itemadddata";
$result1 = $conn->query($sql1);

// if(isset($_POST['done'])){
//   echo
// }
// else if(isset($_POST['delete'])){
//   include 'connect.php';
//  $sql = "DELETE FROM itemdata WHERE itemID=1";

//  if($conn->query($sql) === TRUE) {
//     echo "Record is updated successfully";
//  } else {
//    echo "Error during updating record: " . $conn->error;
//  }
// }
?>
<!DOCTYPE html1>
<html>
<head>
    <title>main</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


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
            echo "<td>". $row["Itemname"] . "</td>";
            echo "<td>" . $row["Amount"] . "</td>";
        }}else{
        echo "0 results";
    }
    if ($result1->num_rows > 0){
        while($row1 = $result1->fetch_assoc()){
            echo "<td>". $row1["Startday"] . "</td>";
            echo "<td>";
            echo "<input type='date' value=''>";
            echo "<form action='main.php' method='post'>";
            echo "<input type='submit' name='done' value='Done' />";
            echo "</form>";
            echo "</td>";
            echo "<td>". $row1["Average"] . "</td>";
            echo "<td>". $row1["Daysleft"] . "</td>";
            echo "<td>";
            echo "<a href='edit.php'>";
            echo "<button>Edit</button></a>";
            echo "<form action='main.php' method='post'>";
            echo "<input type='submit' name='delete' value='Delete' />";
            echo "</form>";
            echo "</td>";
            echo "<td>";
            echo "<a href='update.php'>";
            echo "<button>Update</button></a>";
            echo "</td>";
            echo "</tr>";
        }}
    else{
        echo "0 results";
    }
    ?>
</table>
<div calss="calculater">
    <form>
        <outinput="resilt.value = average.value * tripday.value"></outinput="resilt.value>
        <div class="average">
            <p>Average</p>
            <input type="text" name="average">
            <span>ml</span>
        </div>
        <p>×</p>
        <div class="trip">
            <p>Trip Day</p>
            <input type="text" name="average">
            <p>→</p>
            <p>You need</p>
            <output type="text" name="result"></output>
            <p>ml</p>
        </div>
    </form>
</div>
</body>
</html>