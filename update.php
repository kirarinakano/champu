<?php
include 'connect.php';
$itemID = $_GET['itemID'];

$errorMessage = "";

$sql = "SELECT * FROM itemdata WHERE itemID='$itemID'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $Itemname = $row['Itemname'];
          $Amount = $row['Amount'];
         }
}

$sql = "SELECT * FROM itemadddata WHERE itemID='$itemID'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $Endday = $row['Endday'];
         }
}


if (isset($_POST["update"])) {
	$startday = $_POST["startday"];
	$today = date("Y/m/d");

	if (strtotime($today) < strtotime($startday)) {
      $errorMessage = "The start day should be before or today. Please reselect.";
    } elseif (strtotime($startday) < strtotime($Endday)){
    	$errorMessage = "The startday should be after end day of previous one.";
    } else {
    	$sql1 ="INSERT INTO itemadddata (itemID,Startday)
			VALUES ('$itemID','$startday')";
	     if ($conn->query($sql1) === TRUE) {
	     header('Location: main.php');
	    } else {
	    echo "Error:" .$sql1."<br>".$conn->error;
	      }
      }    
}
	


?>


<!DOCTYPE html>
<html>
<head>
	<title>update</title>
	<link rel="stylesheet" href="update.css">
</head>
<body>
	<div class="header">
      <div class="logo">
        <img src="image/champulogo.png" width="80px" height="50px" alt="champulogo">
         <p>CHAMPU</p>
    
     </div>
  </div>
	<div class = "tittle">
		<p>Update</p>
	</div>
	<div class = "subtittle">
		<p>Item name</p>
		<p>Amount</p>
	</div>
	<div class="itemdata">
		<p><?php echo $Itemname ?></p>
		<p><?php echo $Amount ?></p>
	</div>
	<div class = "subtittle">
		<p>Use start day</p>
	</div>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>
		<input type="date" value="" name="startday" class="date" required><br>
	       <?php 
	        echo $errorMessage;
	        ?>
	    <div class="wrap_update">
	    <button type="submit" name="update" class="update">Update</button>
		</div>
	    <br>
	    <div class = "wrap_link">
	    <a href='main.php'  class='link' >Back to main</a>
		</div>
	</form>

</body>
</html>
