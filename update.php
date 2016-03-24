<?php
	//check if the session isnt operation and starts if isnot 
	if(!isset($_SESSION)) 
	{session_start();}

	require("Database.php");		//requires database in order to access to a database
	$currUser = $_SESSION['user'];  //session for current user
	if(isset($_GET['update']))  //check if the users click the edit link on profile page
	{
		
		$postsId = $_GET['update']; //gets postsId from profile page when the user click edit button//$postsId now holds the id number of the post
		$query = mysqli_query($db,"SELECT* FROM posts WHERE postsId = '$postsId'");   //check the current postId with database id to indetify a specific post 
		$row =mysqli_fetch_array($query); //the data from the table are now in array
	}
	if(isset($_POST['submit']))
	{	
		//I have used mysqli_real_escape_string to prevent harmful entries from the user
		//It escapes special characters//So the users cannot harm database
	 	$editedTitle = mysqli_real_escape_string($db,$_POST['editedTitle']);    //$editedTitle holds the edited title from form
	 	$editedPostBody = mysqli_real_escape_string($db,$_POST['editedPostBody']);   //$editedPostBody holds the edited body from form
	 	$postsId = mysqli_real_escape_string($db,$_POST['postsId']);  //$postsId holds the value of the posts id that has been clicked by user//this is a unique id for each post
	 	// echo "$editedTitle <br> $editedPostBody <br> $postsId";
	 	$update = "UPDATE posts SET feed='$editedPostBody', title = '$editedTitle' WHERE postsId ='$postsId'";  //update posts(table)//set feed and title as both columns have the same id number//WHERE statement identify a particular row
	 	//check the update query 
	 	//if it is true it displays successful
	 	//else it displays the error message
	 	if(mysqli_query($db,$update))  
	 	{
	 		echo "successfully updated";
	 	}
	 	else
	 	{
	 		echo "error ".mysqli_error($db);
	 	}
	 	//directs to profile page //it also refreshes the page 
	 	echo"<meta http-equiv='refresh' content='0; url=profile.php'>";
	}
?>
