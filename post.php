<?php 
	//checks if the session is not set
	//if it isnot set start the session
	if(!isset($_SESSION)) 
	{session_start();}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Blog</title>
		<link rel="stylesheet" type="text/css" href="CSS/signup.css">
	</head>
	<body>
		<div id="name">
			<!-- using session to identify current user -->
			<?php echo "welcome ";  
			echo $_SESSION['user']; //display the current username
			?> <br><br>
			<a href="logout.php">logout</a> <br>   
			<a href="profile.php">Profile</a>
		</div>
		
		<div id="box">
			<h2>New post</h2>
			<!-- Creating a form here to allow the users to insert their posts
			the action method tells the form where to go when the user hit submit button
			it uses post method to deliver the entries -->
			<form action="newPost.php" method="post">
				<input type="text" placeholder="Title" name="title" size="40" id="title"><br>
				<textarea placeholder="Content" name="postBody" cols="76" rows="15"></textarea> <br>
				<button name="submit">Post</button>
			</form>
		</div>
		
		<div id="footer">
			<?php require("footer.php");?>
		</div>
	</body>
</html>