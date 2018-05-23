<?php
include 'connect.php';

$sql = "SELECT * FROM itemdata LEFT JOIN itemadddata ON itemdata.itemID = itemadddata.itemID";
$result = $conn->query($sql);

//button action
$errorMessage = "";
$answer = "";
$target_day = "";

 if (isset($_POST['done'])) {
  $today = date("Y/m/d");
  $target_day= $_POST['endday'];
  $startday = $_POST['startday'];



    if (strtotime($target_day) < strtotime($startday)) {
      $errorMessage = "Please select end day after start day you selected";
    } elseif (strtotime($today) === strtotime($target_day)) {
       $sql4 = "SELECT itemID FROM itemadddata GROUP BY itemID HAVING COUNT(itemID) > 1";



     echo $sql = "UPDATE itemadddata SET WHERE Endday";
    } elseif (strtotime($today) > strtotime($target_day)) {
     echo $sql = "UPDATE itemadddata SET WHERE Endday";
    } elseif (strtotime($today) < strtotime($target_day)) {
      $errorMessage= "Please select the date before the current date.";
   } 
  

 } elseif (isset($_POST['delete'])) {
  $itemID = $_POST["itemID"];
  $sql = "DELETE FROM itemdata WHERE itemID=$itemID";
  $sql1 = "DELETE FROM itemadddata WHERE itemID=$itemID";

var_dump($itemID);
    if ($conn->query($sql) === TRUE) {
      echo "<br>Record is updated successfully  <br>";
    } else {
      echo "1 Error during updating record: " . $conn->error . "<br>";
    }

    if ($conn->query($sql1) === TRUE) {
      echo "Record is updated successfully <br>";
    } else {
      echo "2 Error during updating record: " . $conn->error. "<br>";
    }


 } elseif (isset($_POST['calculate'])) {
  $number1 = $_POST['average'];
  $number2 = $_POST['tripday'];
  $answer = $number1 * $number2;
 }
 


// if (isset($row["Endday"])) {
//   $result = $conn->query($sql);

//   if ($result->num_rows > 0){
//     while($row = $result->fetch_assoc()){
//     $Startday = $row["Startday"];
//     $Endday = $row["Endday"];
//   }
// }

// $day1 = strtotime($Startday);
// $day2 = strtotime($Endday);
// $seconddiff = abs($day2 - $day1);
// $daydiff = $seconddiff / (60 * 60 * 24);
// $sql = "UPDATE itemadddata SET WHERE Average = $daydiff";
//                   }
?>


<!DOCTYPE html>
 <html>
  <head>
    <title>main</title>
    <link rel="stylesheet" href="style.css">
    <script>
      // Change the selector if needed
var $table = $('table.scroll'),
    $bodyCells = $table.find('tbody tr:first').children(),
    colWidth;

// Adjust the width of thead cells when window resizes
$(window).resize(function() {
    // Get the tbody columns width array
    colWidth = $bodyCells.map(function() {
        return $(this).width();
    }).get();
    
    // Set the width of thead columns
    $table.find('thead tr').children().each(function(i, v) {
        $(v).width(colWidth[i]);
    });    
}).resize(); // Trigger resize handler
    </script>

  </head>
  <body>
    <div class="header">
      
    
    </div>
    <a href="add.php"><button class="additem">Add New Item</button></a>


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
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>". $row["Itemname"] . "</td>";
          echo "<td>" . $row["Amount"] . "</td>";
          echo "<td>". $row["Startday"] . "</td>";
          echo "<td>";

          if (isset($row["Endday"])) {
            echo  $row['Endday'];
          }else{
            echo "<form action='main.php' method='post'>";
            echo "<input type='date' value='' name='endday' required>";
            echo "<input type='hidden' name='startday' value='". $row["Startday"] ."'>";
            echo "<input type='submit' name='done' value='Done' />";
            echo "</form>";
          };
          echo "</td>";
          echo "<td>";
          if ($row["Endday"] != "") {
            $Startday = $row["Startday"];
            $Endday = $row["Endday"];
            $Amount = $row["Amount"];
            $day1 = strtotime($Startday);
            $day2 = strtotime($Endday);
            $seconddiff = abs($day2 - $day1);

            $daydiff = $seconddiff / (60 * 60 * 24);
            $average = $Amount / $daydiff;

            $sql3 = "UPDATE itemadddata SET WHERE Average = $average";
            $conn->query($sql3);

          }
          echo round($average, 2, PHP_ROUND_HALF_DOWN);
          $average = "";
          echo "</td>";
          echo "<td>". $row["Daysleft"] . "</td>";
          echo "<td>";
          echo "<a href='editdata.php'>";
          echo "<button class='edit'>Edit</button></a>";
          echo "<form action='main.php' method='post'>";
          echo "<input type='hidden' name='itemID' value='". $row["itemID"]  ."'>";
          echo "<input class='delete' type='submit' name='delete' value='Delete' >";
          echo "</form>";
          echo "</td>";
          echo "<td>";
          echo "<a href='update.php'>";
          echo "<button class='update' S>Update</button></a>";
          echo "</td>";
          echo "</tr>";
      } } else {
        echo "0 results";
      }
      ?>
   </table>

   <?php 
    echo $errorMessage;
   ?>
   <div class="calculater">
       <form action='main.php' method='post'>
       <div class="subtittle">
         <p>Average</p>
          <p>Trip Day</p>
        </div>
        <div class="bottom">
         <input class='average' type="number" name="average" value="<?= $_POST['average'] ?>">
         <span>ml</span>
      　<p>×</p>
        <div class="trip">
        <p>Trip Day</p>
      　 <input class='tripday' type="number" name="tripday" value="<?= $_POST['tripday'] ?>">
      　 <p>→</p>
   　　 　 <p>You need</p>
    　　　 <?php
         echo $answer;
         ?>
    　　  <p>ml</p> 
        <input class='calculate' type="submit" name="calculate" value="Calculate">
       </div>
      </div>
    </form>
   </div>
  </body>
</html>