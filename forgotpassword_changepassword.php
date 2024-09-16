<?php

$errormessage = ""; //initialize error message

if (isset($_POST["submit"])) {
    $password = $_POST["password"]; // get data of password
    $passwordagain = $_POST["passwordagain"]; // get data of passwordagain

    if ($password!= $passwordagain) { // if password and password again is not the same.
        $errormessage = "Please input same password in both password form."; // error message
    }
}

?>




<!DOCTYPE html>
<html>
<head>
    <title>register</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="mypage_changepassword.css">
</head>
<body>
    <div class="top"></div>
    <div class="title">
        <p class="page">Change Password</p>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="fram">
        <div class="table">
            <table>
                <tr>
                    <td class="sub">Password</td> 
                    <td align="center">
                        <input class="box" type="password" minlength="6" maxlength="12" autocomplete="off" name="password" required>
                    </td>
                </tr> 
                <tr>
                    <td></td>
                    <td class="limitation">✳︎input only half-digit alphanumeric, 6-12 characters<br></td>
                </tr>
                <tr>
                    <td class="sub">Password again</td>  
                    <td align="center">
                        <input class="box" type="password" minlength="6" maxlength="12" autocomplete="off" name="passwordagain" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="limitation">✳︎input only half-digit alphanumeric, 6-12 characters</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <br>
                        <p class="errormsg"> <?php echo $errormessage; ?> </p>
                    </td>
                </tr>
            </table>
        </div>
        <br><br>
        <p><input class="register" type="submit" value="Submit" title="Change Password" name="submit"></p>
    </div>
    </form>
</body>
</html>