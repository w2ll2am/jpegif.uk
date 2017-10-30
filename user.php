<!doctype html>
<html>
<head>
	<?php include("header.php"); 
	$user=$_GET['u'];
	?>
<meta charset="utf-8">
	<?php $mysqli = new MySQLi("localhost","root","root","jpegif");
	$query = "SELECT userUsername, userDateCreated FROM user WHERE userID = '$user'";
	//$query = "SELECT threadsDate, threadsDescription, threadsUserID, threadsTitle, threadsReplies FROM threads WHERE threadsID = 'O6XyA5eL'"; 
	if ($result = $mysqli->query($query)) {
		while($row = $result->fetch_array()) {
			$userName = $row['userUsername'];
			$userDate = $row['userDateCreated'];
			//$date = $row['threadsDate'];
		
		}
	}
	$result->close();
	$query = "SELECT * FROM threads WHERE threadsUserID = '$user' ORDER BY threadsDate";
	$result = $mysqli->query($query);
	$numPosts = mysqli_num_rows($result);
	$titles = array();
	$dates = array();
	$replies = array();
	while($row = $result->fetch_array()) {
			array_push($titles, $row['threadsTitle']);
			array_push($dates, $row['threadsDate']);
			array_push($replies, $row['threadsReplies']);
		
		}
	?>
<title>Profile of <?php echo($userName); ?></title>
</head>

<body>
	<div id='userInfo' style='padding-left: 25px'>
	<?php include 'navbar.php'; ?>
	<h2><?php echo ("Username: $userName");?></h2>
	<br>
	<br>
	<h2><?php echo ("Date Created: $userDate");?></h2>
	<br>
	<br>
	<h2><?php echo ("Posts Created: $numPosts");?></h2>
	</br></br>
	<table width="40%">
	<tr>
		<th><strong>Title</strong></th>
		<th><strong>Date</strong></th>
		<th><strong>Replies</strong></th>
	</tr>
	<?php
		for( $i = 0; $i<$numPosts; $i++)
		{
			echo("<tr><td>$titles[$i]</td>
			<td>$dates[$i]</td>
			<td>$replies[$i]</td></tr>");
		}	
	?>
	</table>
	
	</div>
	
	
</body>
</html>