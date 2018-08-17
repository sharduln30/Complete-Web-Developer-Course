<?php

    session_start();


    if (array_key_exists("id", $_SESSION)) {
              
      include("connection.php");
		
	echo "in update page";
	} else {
	
		header("Location:loggedinpage.php");
	
	}
	
?>