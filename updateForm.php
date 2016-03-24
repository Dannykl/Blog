<?php require"update.php"; ?>
<!DOCTYPE html>
<html>
	<head><title>Updatingform</title>
		<link rel="stylesheet" type="text/css" href="CSS/signup.css">
	</head>
	<body>
		
		<div id="updateBox">

			<h2> Updating ... </h2>
		<!-- it uses post request method to request update.php
			post method is safe as it doesnt store sensitive information
			(eg passwords)in browser history
		 -->
			<form action="update.php" method="post">
				<input type="text" name="editedTitle" size="40" class="title" value="<?php echo $row[2];?>"><br> <!-- row[2] is a title from posts table -->
				<input type="hidden" name="postsId" value="<?php echo $row[0];?>">
				<textarea name="editedPostBody" class="editedPostBody"cols="56" rows="15"><?php echo $row[3];?></textarea> <br>
				<button name="submit">Re-post</button>
			</form>
		</div>
		<div id="footer">
			<?php require("footer.php");?>
		</div>
	</body>
</html>