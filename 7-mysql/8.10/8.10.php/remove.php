<?php

	session_start();

    if (array_key_exists('rno', $_POST) OR array_key_exists('name', $_POST) OR array_key_exists('city', $_POST) OR array_key_exists('branch', $_POST)) {
        
        $link = mysqli_connect("shareddb-h.hosting.stackcp.net", "username-3331092c", "37ax960d07", "username-3331092c");

            if (mysqli_connect_error()) {
        
                die ("There was an error connecting to the database");
        
            } 
        
        
            $query = "SELECT id FROM `student` WHERE id = '".mysqli_real_escape_string($link, $_POST['id'])."'LIMIT 1";
			
			$result = mysqli_query($link, $query);

			if(mysqli_num_rows($result) > 0) {
			
				$query = 
			
			} else {
			
				echo "data not found";
			
			}
                
            }
            
        }
        
        
    


?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <style type="text/css">
  
	#container {
	
	margin-left:100px;
	margin-top:100px;
	margin-right:300px;
	
	}
  
  </style>
  
  <body>
    <div id="container">
	
	<h1>Enter the Id to be deleted.</h1>
	
	<form method="post">
  <div class="form-group">
    
    <input type="numeric" class="form-control" id="id" aria-describedby="emailHelp" name="id" placeholder="Id">
  </div>
  
 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>