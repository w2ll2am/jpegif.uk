     <div class="col-sm-4">
    <?php 
		 $threadID = ${"thread" . $cardCount};
		 $cardCount += 1;
		 $query = "SELECT threadsID, threadsDate, threadsDescription, threadsUserID, threadsTitle, threadsReplies FROM threads WHERE threadsID = '$threadID'";
		if ($result = $mysqli->query($query)) {
			while($row = $result->fetch_array()) {
				$threadDate = $row['threadsDate'];
				$threadDescription = $row['threadsDescription'];
				$threadUser = $row['threadsUserID'];
				$threadTitle = $row['threadsTitle'];
				$replies = $row['threadsReplies'];
		}
	} else {
			echo("Did not connect");
		}
		 ?> 
      <div class="thumbnail"> <div style="height: 400px;"><img src="threads/<?php echo($threadID)?>/1.jpg" onerror="this.src='threads/<?php echo($threadID)?>/1.png';" alt="Thumbnail Image 1" class="img-responsive" style="max-height: auto; width: 100%; padding: 3px;"> </div><hr>
        <div class="caption">
          <h3><?php echo($threadTitle) ?></h3>
          <p><?php echo($threadDescription) ?></p>
          <p>
         	<div id="ViewComments" class="viewcomments"><a href="#">View Comments (<?php echo($replies) ?>)</a></div>
         	<div id="ViewThread" class="viewthread"><a target="_blank" href="thread.php?t=<?php echo($threadID) ?>">View Thread</a></div>
         	<div id="Date" class = "date"><?php echo($threadDate)?></div>
          </p>
		  <div id="end"></div>
          <!-- <p><a href="#" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to Cart</a></p> -->
        </div>
      </div>
      <?php unset($threadID);
		unset($threadDate);
		unset($threadDescription);
		unset($threadUser);
		unset($threadUser);
		unset($threadTitle);
		unset($replies);
		?>
    </div>