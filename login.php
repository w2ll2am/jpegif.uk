<!doctype html>
<html>
<head>
<title>Login</title>
<?php include("header.php");

	?>

<script type="text/javascript">
	var loginStr = `
		<h2 class="loginTitle" style="text-align: center; font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial;" w>Login</h2>
		<form id="loginBox" style="text-align: center; padding-top: 5%" action="/login.php" method="post">
		

		<input id="Username" type="text" name ="Username" placeholder=" Username"/>
		<br />
		<input id="Password" type="password" name="Password" placeholder=" Password"/>
		<br /><br />
		<input class="loginButton" type="submit" value ="Log in" title="Log in"/>
		<br/>
		<input type="hidden" name="submissionType" value="login"	/>	
			
		</form>
	`;
	
	var registerStr = `
		<h2 class="loginTitle" style="text-align: center; font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial;">Register</h2>
		<form id="loginBox" style="text-align: center; padding-top: 5%" action="/login.php" method="post">
		<input id="Username" type="text" name ="Username" placeholder=" Username"/>
		<br />
		<input id="Password" type="password" name="Password" placeholder=" Password"/>
		<br /><br />
		<input class="loginButton" type="submit" value ="Register" title="Register" />
		<br/>
		<input type="hidden" name="submissionType" value="register"	/>
			
		</form>
	`;
	var count = 0
	function toggleLogin() {
		if (count%2 == 0){ 
		document.getElementById("loginForm").innerHTML = registerStr;
		document.getElementById("toggleButton").innerHTML = "Already have an account? Log in";
		} else {
			document.getElementById("loginForm").innerHTML = loginStr;
			document.getElementById("toggleButton").innerHTML = "Don't have an account? Register";
		}
		initTips();
		count++;
	}
	function initTips() {
		$('.loginButton').qtip({
			content: {
				text: "Testing"
			},
			
		});
	}
	$(document).ready(function () {
		initTips();
	});
	</script>
	

</head>

<body>

	<?
	$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
	$mysqli = new MySQLi("localhost","root","root","jpegif");
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_errno);
	}
	
	$type=$_POST["submissionType"];
	
	
	if ($type=="login"){
		$username=$_POST["Username"];
		$password=$_POST["Password"];
		$passwordHashed=hash("sha3-512",$password);
		unset($password);
		
		$result = $mysqli->query("SELECT userPassword,userID FROM user WHERE userUsername = '$username'");
		if (!$result) {
			echo("Something went wrong. DFU");
		}
		$rowCount = $result->num_rows;
		if ($rowCount == 1) {
			while($row = $result->fetch_array()) {
				$dbPass = $row['userPassword'];
				$loginID = $row['userID'];
			}
			
			if ($dbPass == $passwordHashed) {
				setCookie("IDCookie",$loginID);
				echo($p);
				header('Location: index.php');
				
			
			}	else {
				echo("<script>alert('That was the wrong password.')</script>");
			}
		} elseif ($rowCount == 0) {
			echo("<script>alert('That user does not exist')</script>");
		} 
		
	}
		

		
		
		
		
	
	elseif($type == "register"){
		
		$username=$_POST["Username"];
		$password=$_POST["Password"];
		$passwordHashed=hash("sha3-512",$password);
		unset($password);
		
		$now = date('Y-m-d H:i:s');
		$id = '';
		$max = strlen($characters) -1;
		
		for ($i = 0; $i < 8; $i++) {
			$id .= $characters[mt_rand(0,$max)];
		}
		
		$result = $mysqli->query("SELECT * FROM user WHERE userUsername = '$username'");
		if (!$result) {
			die($mysqli->error);
		}

		if ($result->num_rows > 0) {
			echo ("<script>alert('Username already exists!)</script>");
		} elseif ($result->num_rows == 0) {

			$sql="INSERT INTO user (userID, userUsername, userPassword, userDateCreated) VALUES ('$id', '$username', '$passwordHashed', '$now')";
			$result = $mysqli->query($sql);
			if ($result === false) {
				echo "SQL error:".$mysqli->error;
			} else {
				echo("New record created!");
			}
		}
	}
include 'navbar.php';	
?>




<center>
<div id="loginForm" style="width: 10%" >

	<h2 class="loginTitle" style="text-align: center; font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial; ">Login</h2>
	<form style="text-align: center; padding-top: 5%" action="/login.php" method="post" id="loginBox">

	
 	<input id="Username" type="text" name ="Username" placeholder=" Username"/>
	<br />
	<input id="Password" type="password" name="Password" placeholder=" Password"/>
	<br /><br />
	<input class="loginButton" type="submit" value ="Log in" title="Log in"/>
	<br /> <input type="hidden" name="submissionType" value="login"	/>

	</form>
	</div>
	</center>


<center>
	<br />
	<button id="toggleButton" class="loginButton" onclick='toggleLogin()'>Don't have an account? Register</button>

</center>
	
	
	
</body>
</html>