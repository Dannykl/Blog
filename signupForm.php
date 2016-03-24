<!DOCTYPE html>
<html>
	<head>
		<title>Blog</title>
		<link rel="stylesheet" type="text/css" href="CSS/signup.css">
	</head>
	<body>
		<h2 id="heading">Sign-up </h2>
		<!-- it uses post request method to request signup.php
			post method is safe as it doesnt store sensitive information(eg passwords)in browser history
		 -->
		<form action="signup.php" method="post">
			<div id="firstname">
				First Name <input type="text" name="firstName" class="firstname" /><br>
			</div>
			<div id="lastname">
				Last Name <input type="text" name="lastName" class="lastname" /><br>
			</div>
			<div id="email">
				Email <input type="email" name="email" class="email" /><br>
			</div>
			<div id="username">
				Username <input type="text" name="userName" class="userName" /><br>
			</div>
			<div id="password">
				Password <input type="password" name="password" class="password"/><br>
			</div>
			
			<button type="text" name="submit" id="submit">Submit</button><br>
			
		</form>
		<div id="loginButton"> 
			<form action="loginForm.php">
				<input type="submit" value="login" />
			</form>
		</div>
	</body>
</html>