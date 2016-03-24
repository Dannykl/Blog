<?php if(!isset($_SESSION)){session_start();} ?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="CSS/signup.css">
	</head>
	<body>
		<div id="header">
			<?php require("header.php");?>   <!-- require the header php page -->
		</div>
		<div id="name">
			<a href="profile.php"class="name">Profile</a>
		</div>
		<div id="profile">
			<b>
			<?php echo $_SESSION['user'];?>  
			</b>
		</div>

		<?php
			require("Database.php");

			if(isset($_POST['searchTitle']))
			{	
				//I have used mysqli_real_escape_string to prevent harmful entries from the user
				//It escapes special characters//So the users cannot harm database
				//The bottom left variable is equal to the data have been inserted by the user on form
				$search = mysqli_real_escape_string($db,$_POST['searchTitle']);
				//select all where $search(userinput from profile page) and title(from database) are match
				$find = mysqli_query($db,"SELECT* FROM posts WHERE '$search' LIKE title "); 
				//checks the query is successful
				//if it is true it displays correct message
				//if it is false it shows where the problem is
				// if($find){echo"corrent quiry";}
				// else{ echo "incorrent ".mysqli_error($db);}
				
				 //$countData now holds the number of rows from result($find)
				$countData = mysqli_num_rows($find);
				
				//if the value of $countData is equal to zero or //it displays the bottom message
				if($countData == 0) 
				{
					echo "Unable to find your search";
				}
				else
				{
					//if $find has data init put them in array
					//then goes through them
					while($row = mysqli_fetch_array($find))
					{
						//displays data from array
						echo "<div id='title'>$row[title]</div>
							    <div id='feed'>$row[feed]
								 <a href='updateForm.php?update=$row[postsId]'><br>Edit</a>
								 <a href='deleteForm.php?delete=$row[postsId]'><br>Delete</a> 
							    </div> 
						      <div id='blogger'>created by $row[blogger]<br>$row[postDate]</div>";
							
					}
				}
			}
		?>
		<!-- require statement includes the footer php file at this page 
		If the file is missing it doesnt execute
		It helps me to produce error free program -->
		<div id="footer">
			<?php require("footer.php");?>
		</div>
	</body>
</html>

