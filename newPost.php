<link type="text/css" rel="stylesheet" href="css/style.css">
<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
<div id="newPost" style="width: 20%" >
	<center>
	<h2 class="newThreadTitle" style="text-align: center; font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial; ">New Thread</h2>
	<textarea form="newThread" placeholder="Thread Description" name="description" style="resize: vertical; width:200"></textarea>
	<form style=" padding-top: 5%" action="/upload.php" target="_blank" method="post" id="newThread" enctype="multipart/form-data">

	
 	<input id="title" type="text" name ="title" placeholder="Thread Title"/>
 	<input id="fileToUpload" name="fileToUpload" type="file">
	<br />
	
	<br /><br />
	<input class="loginButton" type="submit" value ="Submit" title="Submit" name="submit"/>
	<br /> <input type="hidden" name="isNewPost" value="true"	/>

	</form>
	
	</center>
	</div>