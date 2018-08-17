<?php
		
	$emailTo = "rajeshkumar.tariyal@gmail.com";
	
	$subject = "Avengers Official";
	
	$body = "Dear Ishaan, 
	Congratulations! You have won 2 free tickets for INFINITY WAR releasing this year and a trip to AVENGERS TOWER.
	Good luck for your boards.
	CLICK HERE!! 	https://in.bookmyshow.com/movies/avengers-infinity-war/ET00053419/
	This is an auto-generated mail and reply to this mail id is not monitored.";
	
	$headers = "From: avengers@marvel.com";
	
	if(mail($emailTo, $subject, $body, $headers)) {
	
		echo "Email sent successfully.";
	
	} else {
	
		echo "Email not sent.";
	
	}
	

?>

