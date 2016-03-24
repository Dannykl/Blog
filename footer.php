<?php
	//all these messages including the session that holds the current username will be displayed on every single page`s footer
	echo "You logged as ";
	echo $_SESSION['user'];
	echo "<p>Copyright &copy; 2015 Dblog</p>";
?>