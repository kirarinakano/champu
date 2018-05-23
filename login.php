<?php
 include 'connect.php';
 session_start();
 if (isset($_POST["submit"])){
$Password = $_POST['Password'];
$Emailaddress = $_POST['Emailaddress'];
var_dump($Password);
}


$_SESSION["password"] = $Password;
$_SESSION["Emailaddress"] = $Emailaddress;
$_SESSION["userID"] = 3;
header('Location: add.php');
exit();






?>

<!DOCTYPE>
<html>
<head>
  <title>login</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="login.css">

</head>
  <body>
    <div class="top">
</div>
      <div>

    <p class="login">log in</p><br>
    <form method='POST' action="" >

<div class="form">
  <div class="username">
    <p>e-mail <input class="email" type="email" placeholder="" name="Emailaddress" required></p>
  </div>

  <div class="password">
    <p>Password <input class="pass" type="password" maxlength="12" minlength="6" placeholder="6-12" name="Password" required></p>


<?php
// $sql = "SELECT * FROM userinfo WHERE Emailaddress = '$Emailaddress' and Password = '$Password'";
//  $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   header('Location: add.php');
// } else {
//   echo "Error: Your username or/and password are wrong.";
// }
?>

  </div>
  
  <div class="login">
     <p><input class="logi"  type="submit" value="log in" name="submit"></p>
  </div>
  <a href='register.php' class="link">Sign up</a><br><br>
</div>
  <a href='forgot.php' class="link">Forgot password ?</a>   
  </form>
</div>
    </body>
</html>
