<?php
if(isset($_COOKIE['IDCookie'])){
			  $cookie = $_COOKIE['IDCookie'];
			  
		  }
$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$id = '';
$max = strlen($characters) -1;
		
for ($i = 0; $i < 8; $i++) {
	$id .= $characters[mt_rand(0,$max)];
}

$now = date('Y-m-d H:i:s');
$comment = $_POST["content"];

$thread = $_POST["thread"];
$sql="INSERT INTO comments (commentsID, commentsThreadID, commentsUser, commentsDate, commentsContent) VALUES ('$id', '$thread', '$cookie', '$now','$comment')";
$mysqli = new MySQLi("localhost","root","root","jpegif");
if ($result = $mysqli->query($sql) === TRUE) {
	header("Location: thread.php?t=$thread");
} else {
	echo "Error: . $mysqli->error";
}
?>