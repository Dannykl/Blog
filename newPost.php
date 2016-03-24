<?php
	session_start();	//the session is start
	require("Database.php");  //connect and select the database by requiring the database file
	if(assert($_POST))		//check if the post method is existing or working
	{	
		
		//create variables($title and $posBody). 
		//They hold the form values(that have been submited by the user) special character will be escaped
		$title = mysqli_real_escape_string($db,$_POST['title']);         
		$postBody = mysqli_real_escape_string($db,$_POST['postBody']);
		$postDate = date("h:i:sa  d-m-y"); //create a variable and give the current data

		//check if the user doesnt fill title or postbody section on form
		if(empty($title)||empty($postBody))
		{	
			echo "you need to fill all fields";
			require("post.php");
		}
		else
		{	
			$blogger = $_SESSION['user'];   //give a value to variable blogger, it now holds the session value which is the username 
			$inserting = mysqli_query($db,"INSERT INTO posts(`blogger`,`title`,`feed`,`postDate`)
									  VALUES('$blogger','$title','$postBody','$postDate')")
									  or die($inserting.mysqli_error());
			if($inserting)
			{
				require("profile.php");
			}
			
		}
	}

?>