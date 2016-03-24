<?php
	//I use require statement to ensure the bottom file is included  
	// in case if the bottom file(profile.php) is missing the -
	//require statement will produce a fatal error and stops the script
	//it helps me to produce error free program
	require("Database.php");
	
	if(isset($_POST['submit'])) //checks if the user clicks the submit button 
	{	
		//I have used mysqli_real_escape_string to prevent harmful entries from the user
		//It escapes special characters//So the users cannot harm database
		//all the bottom left variables are equal to the data have been inserted by the user on form
		$firstName = mysqli_real_escape_string($db,$_POST['firstName']);
		$lastName = mysqli_real_escape_string($db,$_POST['lastName']);
		$email = mysqli_real_escape_string($db,$_POST['email']);
		$userName = mysqli_real_escape_string($db,$_POST['userName']);
		$pass= mysqli_real_escape_string($db,$_POST['password']);
		//I have used password_hash to make a secure password
		//the first parameter is a password(user password) that needs to be- 
		//hashed and stored in the database
		//the second parameter(password_default) is used 
		//to generate the hash
		$pass = password_hash($pass,PASSWORD_DEFAULT); 


		//checks if the user fills all the fields on the form
		//if it is true their details will be inserted into user and login tables
		if($firstName&&$lastName&&$email&&$userName&&$pass)
 		{
 			$insertUserDetail = mysqli_query($db,"INSERT INTO user(firstName,lastName,email)
			VALUES('$firstName','$lastName','$email')");
 			
 			$insertLoginDetail = mysqli_query($db,"INSERT INTO login(password,username)
			VALUES('$pass','$userName')");
			
			//checks if the above two enquries are successful
			//if the details are successfully inserted it displays successful message
			//the require statement includes loginForm php. I have used this -
			//statement to make sure the page is included.
			//if the page is unavailable or missing it generates fatal error.
			//It means it helps me to produce a program without error   
			if($insertLoginDetail&&$insertUserDetail)
	 		{
	 			echo"<h3 color:green>You are successfully registered</h3>";
	 			require("loginForm.php");
	 		}
 		}
 		else
		{
			echo"<h3 margin-left:250px>Fill in all fields!</h3>";
			require('signupForm.php');
		}
	}
 

?>