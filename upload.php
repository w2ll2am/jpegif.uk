<?php
include("header.php");
if(isset($_COOKIE['IDCookie'])){
			  $cookie = $_COOKIE['IDCookie'];
			  
		  }
$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$id = '';
$max = strlen($characters) -1;
		
for ($i = 0; $i < 8; $i++) {
	$id .= $characters[mt_rand(0,$max)];
}
mkdir("threads/$id/",0777,true);
$target_dir = "threads/$id/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	$temp = explode(".", $_FILES["fileToUpload"]["name"]);
	$newfilename = "1" . '.' . end($temp);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir . $newfilename)) {
        echo "Success! The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded at /threads/$id. You will now be redirected to this page";
		$now = date('Y-m-d H:i:s');
		$description = $_POST["description"];
		$title = $_POST["title"];
		$sql="INSERT INTO threads (threadsID, threadsDate, threadsDescription, threadsUserID, threadsTitle, threadsReplies) VALUES ('$id', '$now', '$description', '$cookie','$title','0')";
		$mysqli = new MySQLi("localhost","root","root","jpegif");
		if ($result = $mysqli->query($sql) === TRUE) {
			header("Refresh: 2; URL=thread.php?t=$id");
		} else {
			echo "Error: . $mysqli->error";
		}
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


?>