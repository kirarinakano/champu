<?php

session_start();
include 'connect.php';
$Emailaddress = $_SESSION["Emailaddress"];
// $userID = 3;
$sql = "SELECT * FROM userinfo LEFT JOIN itemdata ON userinfo.userID = itemdata.userID";
$result = $conn->query($sql);
$sql2 = "SELECT * FROM itemdata LEFT JOIN itemadddata ON itemdata.itemID = itemadddata.itemID";
$result2 = $conn->query($sql2);

$sql6 = "SELECT userID FROM userinfo WHERE Emailaddress='$Emailaddress'";
$result3 = $conn->query($sql6);
if ($result3->num_rows > 0) {
    while ($row = $result3->fetch_assoc()) {
        $user = $row["userID"];
        $userID = $user;
    }}



// if($conn->query($sql) ===TRUE){
//   echo "";
// }else{
//   echo "Error:" .$sql."<br>".$conn->error;
// }
// var_dump(isset($_POST["itemdata"]));

$errorMessage = "";


if (isset($_POST["itemdata"])) {
    $item = $_POST["Itemname"];
    $amount = $_POST["amount"];
    $startday = $_POST["startday"];


    $sql1 ="INSERT INTO itemdata (Itemname, Amount,userID)
    VALUES ('$item', '$amount', '$userID') ";

    if ($conn->query($sql1) === TRUE) {
        echo "";
    } else {
        echo "Error:" .$sql1."<br>".$conn->error;
    }


    $sql4 = "SELECT itemID FROM itemdata";
    $result1 = $conn->query($sql4);
    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
            $itemID = $row["itemID"];
        }} else {
        echo "0 results";
    }

    $today = date("Y/m/d");
    if (strtotime($today) < strtotime($startday)) {
        $errorMessage = "The start day should be before or today. Please reselect.";
    } else if (strtotime($today) === strtotime($startday)) {
        $sql3 = "INSERT INTO itemadddata (Startday,itemID) VALUES('$startday','$itemID')";
        if ($conn->query($sql3) === TRUE) {
            echo "";
        } else {
            echo "Error:" .$sql3."<br>".$conn->error;
        }
    } else if (strtotime($today) > strtotime($startday)) {
        $sql3 = "INSERT INTO itemadddata (Startday,itemID) VALUES('$startday','$itemID')";
        if ($conn->query($sql3) === TRUE) {
            echo "";
        } else {
            echo "Error:" .$sql3."<br>".$conn->error;
        }
    }
}


// header("Location: main.php");
// exit();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="add.css">
    <title>additem</title>
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
                <?php
                echo $errorMessage;
                ?>

                <br><br><br>
                <button type="submit" name="itemdata" class="register">Register</button><br><br>



                <?php
                $sql5 = "SELECT * FROM itemdata";
                $result2 = $conn->query($sql5);

                if ($result2->num_rows == 0) {
                } else {
                    echo "<a style= 'color: #6ba3ff;' href='main.php'  class='link' >Back to main page</a>";
                }

                ?>
            </div></form>
</body>
</html>

