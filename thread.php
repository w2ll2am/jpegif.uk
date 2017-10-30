<!doctype html>
<html>
<head>
<?php include("header.php"); ?>
<?php 
	$threadID = $_GET['t'];
	$mysqli = new MySQLi("localhost","root","root","jpegif");
	$query = "SELECT threadsDate, threadsDescription, threadsUserID, threadsTitle, threadsReplies FROM threads WHERE threadsID = '$threadID'"; 
	
	if ($result = $mysqli->query($query)) {
		while($row = $result->fetch_array()) {
			$threadDate = $row['threadsDate'];
			$threadDescription = $row['threadsDescription'];
			$threadUser = $row['threadsUserID'];
			$threadTitle = $row['threadsTitle'];
			$replies = $row['threadsReplies'];
		}
		$result->close();
	} echo('<title>'.$threadTitle.'</title>');
	
	?>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php include("navbar.php"); ?>
<?php 
	if (@getimagesize("http://localhost/threads/$threadID/1.jpg")) 
	{
		$filetype = "jpg";
	} elseif (@getimagesize("http://localhost/threads/{$threadID}/1.png"))
	{
		$filetype = "png";
	}
	echo('<h1 style="text-align: center">'.$threadTitle.'</h1>');
	
	echo('<center>');
	echo('<div style>');
	echo('<img src="threads/'.$threadID.'/1.'.$filetype.'" alt="Thumbnail Image 1" class="img-responsive img-expandable" style="border-style: solid; border-width: 2px; padding: 2px"> ');
	echo('</div>');
	echo('<h3>'.$threadDescription);
	echo('<h4> Uploaded on: '.$threadDate);
	echo('</center>');
	?>
	
	</br>
	</br>
	<?php if(isset($cookie)) 
		{
			echo("
		<div id='newComment' style='width: 80%; padding-left: 20px' >
		<center>
		<h2 class='newThreadTitle' style='text-align: left; font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial;' >New Comment</h2>
		</center>
		<form style= 'padding-top: 5%' action='/commentUpload.php' method='post' id='newComment' enctype='multipart/form-data'>
		<input type='text' name='content' placeholder='Comment' style='width: 50%'/> <br /> <br />
		<input class='loginButton' type='submit' value ='Submit' title='Submit' name='submit'/>
		<br /> <input type='hidden' name='isNewPost' value='true'	/>
		<input type='hidden' name='thread' value='$threadID' />
		

		</form>
	
		
	</div>
	");
		} 
		else 
		{
			echo("<center><p>Login to make a comment</p></center>");
		}
	?>
	<h1 style='padding-left: 20px'>Comments</h1>
	<?php 
	$query = "SELECT * FROM comments WHERE commentsThreadID = '$threadID' ORDER BY commentsDate DESC";
	$result = $mysqli->query($query);
	$num_comments = mysqli_num_rows($result);
	$users = array();
	$dates = array();
	$comments = array();
	while($row = $result->fetch_array()) {
			array_push($users, $row['commentsUser']);
			array_push($dates, $row['commentsDate']);
			array_push($comments, $row['commentsContent']);
		}
	$result->close();
	?>
	<div  style="padding-left: 40px" id="comments">
	<table width="80%" style="border: 1px solid">
	<col width="10">
  	<col width="30">
  	<col width="300">
	<tr>
		<th style="table-layout: fixed"><strong>User</strong></th>
		<th><strong>Date</strong></th>
		<th><strong>Comments</strong></th>
	</tr>
	<?php
		for( $i = 0; $i<$num_comments; $i++)
		{
			
			echo("<tr><td>$users[$i]</td>
			<td>$dates[$i]</td>
			<td>$comments[$i]</td></tr>");
		}	
	?>
	</table>
	</div>
	</br></br></br></br>
</body>
<footer>
	<script type="text/javascript" >
		$(document).ready(function () {
			var small={width: '20%'};
			var large={width: '50%'};
			var count = 1;
			$(".img-expandable").css(small).on('click',function () {
				$(this).animate((count==1)?large:small);
				count = 1-count;
				});
			});
		/* $('.img-expandable').click(function() {
		$(this).animate({width:'40%'}) 
	})*/
	</script>
</footer>
</html>