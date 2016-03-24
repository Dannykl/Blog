<?php
	if(!isset($_SESSION))
	{session_start();}
	// - means continues to next line
	// I use require statement to ensure the bottom file is included  
	// in case if the bottom file(Database.php) is missing the require statement-
	// will produce a fatal error and stops the script
	// it includes database php file in order to access to a database
	require("Database.php");		
	$currUser = $_SESSION['user'];  //session for current user
	if(isset($_GET['delete']))  //check if the users click the delete link on profile page
	{
		//echo $_GET['delete'];
		$postsId = $_GET['delete']; //gets postsId from profile page when the user click a delete button//$postsId now holds the id number of the post
		$query = mysqli_query($db,"SELECT* FROM posts WHERE postsId = '$postsId'");   //check the current postId with database id to indetify a specific post 
		$row =mysqli_fetch_array($query); //the data from the table are now in array
	}
	if(isset($_POST['confirm']))
	{	
	 	$id = mysqli_real_escape_string($db,$_POST['id']);  //$id holds the value of the posts id that has been clicked by the user//this is a unique id for each post
	 	$del = "DELETE FROM posts WHERE postsId ='$id'";  
	 	
	 	//check the update query 
	 	//if it is true it displays successful
	 	//else it displays the error message
	 	if(mysqli_query($db,$del))  
	 	{
	 		echo "successfully deleted";
	 	}
	 	else
	 	{
	 		echo "error ".mysqli_error($db);
	 	}
	 	//directs to profile page //it also refreshes the page 
	 	echo"<meta http-equiv='refresh' content='0; url=profile.php'>";
	}
?>
