<!DOCTYPE html1>
<html>
 <head>
  <link rel="stylesheet" href="forgotpassword.css">
</head>
<body>
  <div class="header">
  </div>
  <div class="tittle">
    <p>Forgot password</p>
  </div>
  <ul>
<div class="subtittle">
  <li><p>Username</p></li>
  <div class="caution">
    <li><p>*Input only half-digit alphanumeric,4-32 characters</p>
  </div>
  <form>
  <input type="text" name="username" maxlength="32" minlength="4" pattern="^[A-Za-z]+$"></li>
  </div>
  </ul>
  <ul>
    <div class="subtittle">
    <li><p>Email address</p></li>
        </div>
    <div class="caution">
      <li><p>*Input only half-digit alphanumeric,include @ and .</p>
   </div>
   <input type="text" name="email">
     </li>
    <input class= "button" type="submit" value="Submit">
  </form>
</body>
</html>



<?php
include 'connect.php';
$sql = "SELECT * FROM userinfo where Username='$username' and Emailaddress='$emailaddress'";
$result = $conn->query($sql);
 if ($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
   $Username=$row["Email"];
   $Emailaddress=$row["Emailaddress"];
  }}

 // if(!isset($Username) && !isset($Emailaddress)){
 //  echo "<p>*Your Username or/and Emailaddress is wrong. </p><br>";
 // } elseif($username == $Username && $emailaddress==$Emailaddress ){
 //  echo "<h1>Welcome!!!</h1>";
    ?>