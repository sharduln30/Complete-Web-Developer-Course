<?php

	$link = mysqli_connect("shareddb-h.hosting.stackcp.net", "username-3331092c", "37ax960d07", "username-3331092c");
	
	if(mysqli_connect_error()) {
	
		die ("database not connected");
	
	}
	
//	$query = "INSERT INTO `users` (`email`, `password`) values('joe69@gmail.com','lifeISBETTer')";

	$query = "update `users` set password = 'MQDDP3432d$$2' where id = 3  limit 1";
	
	mysqli_query($link, $query);
	
	$query = "SELECT * FROM users";
	
	if($result = mysqli_query($link, $query)) {
	
		while ($row = mysqli_fetch_array($result)) {
		
		echo "<p>Email address = ".$row[1]. " & Password = ".$row[2]."</p>";
		
		}
	
	}
	
?>
