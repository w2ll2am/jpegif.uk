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
	
	<div id="newComment" style="width: 80%; padding-left: 20px" >
		<center>
		<h2 class="newThreadTitle" style="text-align: left; font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial; ">New Comment</h2>
		</center>
		<form style=" padding-top: 5%" action="/commentUpload.php" target="_blank" method="post" id="newComment" enctype="multipart/form-data">
		<input type="text" name="content" placeholder="Comment" style="width: 50%"/> <br /> <br />
		<input class="loginButton" type="submit" value ="Submit" title="Submit" name="submit"/>
		<br /> <input type="hidden" name="isNewPost" value="true"	/>
		<input type="hidden" name="thread" value="<?php echo($threadID); ?>" />
		

		</form>
	
		
	</div>
	
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