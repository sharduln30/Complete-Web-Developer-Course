<?php

	session_start();
	
	if($_SESSION['name']) {
	
		echo "You are logged in!";
	
	}else {
	
		header("Location: form.php");
	
	}

?>