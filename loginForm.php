<!DOCTYPE html>
<html>
	<head>
		<title>Blog</title>
		<link rel="stylesheet" type="text/css" href="CSS/signup.css">
	</head>
	<body>
		<h2 id="heading">Login </h2>
		<!-- it uses post request method to request login.php
			post method is safe as it doesnt store sensitive information(eg passwords)in browser history
		 -->
		<form action="login.php" method="post"> 
			<div id="username">
				Username <input type="text" name="userName" class="username" /><br>
			</div>
			<div id="password">
				Password <input type="password" name="password" class="password"/><br>
			</div>
			<div id="submit">
				<button type="text" name="submit" width="100">Login</button><br>
			</div>
		</form>
		<form action="signupForm.php" id="registerButton">
			<input type="submit" value="Register"/>
		</form>
	</body>
</html>

	