<?php
session_start();

include 'connect.php';

$errormessage = "";

if (isset($_POST["submit"])){
  $Password = $_POST['Password'];
  $Emailaddress = $_POST['Emailaddress'];

  $sql = "SELECT * FROM userinfo WHERE Emailaddress = '$Emailaddress' AND Password = '$Password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  $_SESSION["password"] = $Password;
  $_SESSION["Emailaddress"] = $Emailaddress;

    $sql1 = "SELECT * FROM itemadddata";
    $result = $conn->query($sql1);

        if ($result->num_rows == 0) {
          header('Location: add.php');
        } else {
          header('Location: main.php');
        }
  } else {
    $errormessage = "*Your email address or/and password is wrong.";
  }

}

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
<!DOCTYPE>
<html>
<head>

    <title>login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">

</head>
<body>
    <div class="top"></div>

      <p class="title">Log in</p><br>
        <div class="biggest">
        <div class="form">
        <form method='POST' action='login.php'>
        <table>
          
            <tr>

              <td class="sub">E-mail address</td>
              <td align="center"><input class="box" type="email" placeholder="" name="Emailaddress" required></td>

            </tr>
            <tr>
                  <td></td>
                  <td class="limitation"><br></td>
              </tr>
            <tr>

              <td class="sub">Password</td>
              <td align="center"><input class="box" type="password" maxlength="12" minlength="6" placeholder="" name="Password" required></td>  

            </tr>  
            <tr>
              <td colspan="2" align="center"><?php echo $errormessage; ?></td>
            </tr>
        </table>
      </div>
    

     <br><br><br><br><br>

        <p><input class="logi"  type="submit" value="log in" name="submit"></p>
      <br>
      <a href='register.php' class="link">Sign up</a><br><br>
    
      <a href='forgot.php' class="link">Forgot password ?</a>   
        </form>
      </div>
</body>
</html>
