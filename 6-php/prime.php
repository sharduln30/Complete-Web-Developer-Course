<p>Test a number is prime or not...</p>

<form>

	<input name="number" type="number">
	
	<input type="submit" value="go!">
	
</form>

<?php

	if(is_numeric($_GET["number"]) && $_GET["number"] > 0 && $_GET["number"] == round($_GET["number"], 0)) {
	
		$i = 2;
		
		$isPrime = true;
		
		while($i < $_GET["number"]){
		
			if($_GET["number"] % $i == 0) {
			
				$isPrime = false;
			
			}
			
			$i++;
		
		}
		if($isPrime) {
		
			echo "<P>".$i." is prime</p>";
		
		}else {
		
			echo "<P>".$i." is not prime</p>";
		
		}
		
	}		
	else {
	
		echo "<br>Wrong input.Enter a posive number..";
		
		echo "<br>eg.34, 23, 95, 432, etc.";
	
	}
	
?>

