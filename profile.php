<?php
	//start the session if it isnt set or operating
	if(!isset($_SESSION))
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dblog</title>
		<link rel="stylesheet" type="text/css" href="CSS/signup.css">
	</head>
	<body>
		<div id="header">
			<?php require("header.php");?>   <!-- require the header php page -->
		</div>
		<div id="logout">
			<a href="logout.php" >logout</a>   <!--  it goes to logout php page when the user clicks the link -->
		</div>
		<div id="profile">
			<b>Welcome

			<?php echo $_SESSION['user'];?>  
			</b>
			<br><a href="post.php" >New Post</a>
		</div>
		<div id="search">
		<!-- it uses post request method to request search.php
			post method is safe as it doesnt store details in browser history
		 -->
			<form action="search.php" method="post"> 
				<input type="text" name="searchTitle" placeholder="Search by title" />
				<input type="submit" name="submitSearch" value="search" />
			</form>
		</div>
		<div class="posts">
			<h1>Your posts</h1>
			<?php 
				require("Database.php");   //it requires the database in order to make enquery
				$currentUser = $_SESSION['user']; //$currentUser variable is now holding the session value which is username
				
				//query connects to $db(database) 
				//select all from posts table where currentuser(session) and blogger(from database) are equal
				//sorts in descending order
				$q = mysqli_query($db,"SELECT* FROM posts WHERE blogger LIKE '$currentUser' ORDER BY postDate DESC"); 
				
				//while loops goes through all selected elemensts
				while($row = mysqli_fetch_array($q))
				{	 //displays all the data from array 
					//it passes postsId from array to updateForm.php file
					//it passes postsId from array to deleteForm.php file
					echo "<div id='title'>$row[title]</div>
						  <div id='feed'>$row[feed]
						  	<a href='updateForm.php?update=$row[postsId]'><br>Edit</a>  
						  	<a href='deleteForm.php?delete=$row[postsId]'><br>Delete</a> 
						  </div> 
						  <div id='blogger'>created by $row[blogger]<br>$row[postDate]</div>";	
				}
			?>
		</div>
		
		<div id="footer">
			<?php require("footer.php");?>
		</div>
	</body>
</html>
