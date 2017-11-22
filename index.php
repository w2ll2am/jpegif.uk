<!DOCTYPE html>
<html lang="en">
<head>
<?php include("header.php"); ?>
<title>JPEGIF</title>



</head>

<body>
	
	<?php
	$mysqli = new MySQLi("localhost","root","root","jpegif");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_errno);
	}
	
	/* THIS BIT ACTUALLY WORKS
	$query = "SELECT userID FROM user";
	if ($result = $mysqli->query($query)) {
		while($row = $result->fetch_row()) {
			printf ("%s\n %s\n", $row[0], $row[1]);
		}
	}*/
	
?>



<?php include 'navbar.php'; ?>
<center><h1>Welcome!</h1>
<p>Welcome to our image sharing site. Please make all ze threads</p></center>
<?php 
	if(($_COOKIE["sortMode"]) == "date") {
		$query = "SELECT threadsID FROM threads ORDER BY threadsDate DESC LIMIT 9";
	} else if ($_COOKIE["sortMode"] == "replies") {
		$query = "SELECT threadsID FROM threads ORDER BY threadsReplies DESC LIMIT 9";
	} else {
		$query = "SELECT threadsID FROM threads ORDER BY threadsDate DESC LIMIT 9";
	}
	
	$cardCount = 1;
	$varname = 'thread';
	if ($result = $mysqli->query($query)){
		while ($row=$result->fetch_assoc()) {
			${"thread$cardCount"} = ($row["threadsID"]);
			$cardCount++;
		}
		$cardCount = 1;
		
	}
	
			
		
	//echo($result[1]);
	
	?>
<hr>
<h2 class="text-center">Threads</h2>


<center>
	<?php if(isset($cookie)) 
		{
			echo("<button onClick='togglePost()' class='loginButton'>New Thread</button>");
		} 
		else 
		{
			echo("<p>Login to make a post</p>");
		}
	?>
	<div id='newPost'></div>
</center>
<hr>
<ul style="align: center;">
	<li>Sort By:</li>
	<li><a href="resort.php?mode=replies"  class="text-center">Most Replies</a></li>
	<li><a href="resort.php?mode=date"  class="text-center">Most Recent</a></li>
</ul>
<div class="container">
 
  <div class="row text-center">
    
    
    <?php include('card.php'); ?>

    <?php include('card.php'); ?>

    <?php include('card.php'); ?>
    
   
    
  </div>
  
  <div class="row text-center hidden-xs">
   
    <?php include('card.php'); ?>
    
    <?php include('card.php'); ?>
    
    <?php include('card.php'); ?>
   
  </div>
  
  <div class="row text-center hidden-xs">
   
    <?php include('card.php'); ?>
    
    <?php include('card.php'); ?>
    
    <?php include('card.php'); ?>
   
  </div>
  
</div>
<hr>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script type-"text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery.qtip.min.js"></script>

<script src="js/bootstrap.js"></script>


<script type="text/javascript">
	
	function initTips() {
		$('.viewcomments').qtip({
			content: {
				text: "<iframe src='testthread.html'>"
			},
			style: {
				
				classes: 'qtip-bootstrap'
			},
			show: {
				event: 'click'
			},
			hide: {
				event: 'click'
			}
			
			
		});
	}
	$(document).ready(function () {
		initTips();
		
	});
	var count = 0;
	
	function togglePost() {
		d = document.getElementById("newPost");
		if (count%2 == 0) {
			d.innerHTML = "<iframe height=380px style='margin-left: 5%; padding-left: 1%' src='newPost.php'></iframe>";
		} else if (count%2==1) {
			d.innerHTML = "";
		}
		count++;
		
	}
</script>



</body>
</html>