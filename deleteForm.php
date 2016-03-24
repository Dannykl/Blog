<?php require("delete.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Delete</title>
		<link rel="stylesheet" type="text/css" href="CSS/signup.css">
	</head>
	<body>
		<div class="deleteForm">
			<form action="delete.php" method="post">   <!-- it uses post request method to request delete.php -->
				<input type="hidden" name="id" value="<?php echo $row[0];?>">
					<h2>Are you sure you want to delete?<br></h2>
				<button name="confirm" class="deleteButton"> Delete </button>
			</form>
			<form action="backToProfile.php">
				<button name="backToProfile" class="backToProfile">No</button>
			</form>
		</div>
	</body>
</html>