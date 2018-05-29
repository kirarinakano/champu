<?php
include 'connect.php';
session_start();

$target_dir = "pics/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["upload"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpegg") {
    echo "Sorry, only JPG and PNG files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>

<!DOCTYPE>
<html>
<head>

    <title>mypage</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="mypage.css">

</head>
<body>




    <div class="top">
    	<form>
    		<input type="button" value="Log out" name="logout" class="logout">
    	</form>
    </div>  
      <p class="title">My page</p><br>

<div class="prof">
<img src="<?php echo $target_file; ?>" height="400px" width="400px" ><br>
</div>

<?php
  
?>


<div align="center">
    <form action="mypage.php" method="post" enctype="multipart/form-data">
	    Change profile picture:
	    <input type="file" name="fileToUpload" id="fileToUpload"><br>
	    <input type="submit" value="Update" name="upload" class="upload"><br><br>

	    <input class="button" type="submit" formaction="changeemailaddress.php" value="Change email address" >&ensp;&ensp;&ensp;&emsp;&emsp;&emsp;&emsp;
	    <input class="button" type="submit" formaction="changepassword.php" value="Change password" >
	    <br><br><br>
	    <p class="text"><strong>Connect a Social Network</strong></p>







	    <a href="main.php">Back to main</a>
	</form>

</div>


</body>	