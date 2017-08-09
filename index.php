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
	$query = "SELECT threadsID FROM threads ORDER BY threadsDate DESC LIMIT 6";
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
	<button onClick="togglePost()" class="loginButton">New Post</button>
</center>
<div id="newPost">

</div>
<hr>
<ul style="align: center;">
	<li>Sort By:</li>
	<li><a class="text-center">Most Replies</a></li>
	<li><a class="text-center">Most Recent</a></li>
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
  
</div>
<hr>


<footer class="text-center">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <p>Copyright © MyWebsite. All rights reserved.</p>
      </div>
    </div>
  </div>
  
</footer>
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