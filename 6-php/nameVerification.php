<?php
		
		
		
		if($_POST) {
		
		
		$names = array("Somi", "Ishi", "Ishu", "Me");
		
		$isKnown = false;
		
		foreach ($names as $value) {
		
		if ($value == $_POST["name"]) {
		
			$isKnown = true;
		
		}
		}
		if($isKnown) {
			
			echo "Hi, there ".$_POST["name"];
		
		}
		else{
			
			echo "I don't know you:(";
			
		}

		}
		
?>

<form method="post">

	<input name="name" type="name">
	
	<input type= "submit" value="go!">
	
</form>
