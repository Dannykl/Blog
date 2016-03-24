<!-- //check alll -->


<?php
	session_start();//start session
	
	if(isset($_POST['submit'])) //check if the submit button is pressed
	{
		require('Database.php'); //it requires or reads the database php file from different folder
		
		//I have used mysqli_real_escape_string to prevent harmful entries from the user
		//It escapes special characters//So the users cannot harm database
		//all the bottom left variables are equal to the data have been inserted by the user on form
		$userName = mysqli_real_escape_string($db,$_POST['userName']); 
		$password = mysqli_real_escape_string($db,$_POST['password']);

		$result = mysqli_query($db,"SELECT * FROM login WHERE `username` = '$userName'");
		
		//the data has been collected by $result is now in array
		$row = mysqli_fetch_array($result);  
		
		if(is_array($row))  //checks if $row is an array
		{	
			//$databaseUsername is now holding the value of the username from an array
			$databaseUsername = $row['username']; 
			//$databasePass is now holding the value of the password from an array 
			$databasePass = $row['password'];	
			//the session is now holding the value of username from an array
			$_SESSION['user'] = $userName; 

			//compare the user username and database username
			//verify the two passwords or parameters
			if($userName == $databaseUsername && password_verify($password,$databasePass))
			{	
				//if the above is statemenet is true it goes to profile page
				require("profile.php");  
				exit();
			}
		}
		
		//check if the login form is empty
		if(empty($userName)||empty($password))
			{
				echo"<b>Insert your username and password!</b>";  
				require("loginForm.php");
			}
		else
		{
			echo"<b>Either your username or password is incorrect!</b>"; 
			require("loginForm.php");
		}
	}
?>
