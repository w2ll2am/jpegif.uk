<!doctype html>
<html>
<head>
<title>About us</title>
<?php include("header.php"); ?>
<?php
	$mysqli = new MySQLi("localhost","root","root","jpegif");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_errno);
	} ?>
</head>

<body>
<?php include 'navbar.php'; ?>
</body>
</html>