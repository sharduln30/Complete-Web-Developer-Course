<?php

	session_start();

    if (array_key_exists('rno', $_POST) OR array_key_exists('name', $_POST) OR array_key_exists('city', $_POST) OR array_key_exists('branch', $_POST)) {
        
        $link = mysqli_connect("shareddb-h.hosting.stackcp.net", "username-3331092c", "37ax960d07", "username-3331092c");

            if (mysqli_connect_error()) {
        
                die ("There was an error connecting to the database");
        
            } 
        
        if ($_POST['rno'] == '') {
            
            echo "<p>Roll No. is required.</p>";
            
        } else if ($_POST['name'] == '') {
            
            echo "<p>Name is required.</p>";
            
        }  else if ($_POST['city'] == '') {
            
            echo "<p>City is required.</p>";
            
        }  else if ($_POST['branch'] == '') {
            
            echo "<p>Branch Name is required.</p>";
            
        } else {
            
            $query = "SELECT `id` FROM `student` WHERE Name = '".mysqli_real_escape_string($link, $_POST['name'])."'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                
         		
			echo '<div class="alert alert-danger" role="alert"><p>Data already exists.</p></div>';

                
            } else {
                
                $query = "INSERT INTO `student` (`roll no.`, `name`, `city`, `branch`) VALUES ('".mysqli_real_escape_string($link, $_POST['rno'])."','".mysqli_real_escape_string($link, $_POST['name'])."', '".mysqli_real_escape_string($link, $_POST['city'])."', '".mysqli_real_escape_string($link, $_POST['branch'])."')";
                
                if (mysqli_query($link, $query)) {
                    
			$_SESSION['name'] = $_POST['name'];
			
			header("location: insertedtable.php");
                    
                } else {
                    
                    echo "<p> Problem signing you up - please try again later.</p>";
                    
                }
                
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
	margin-top:25px;
	margin-right:800px;
	
	}
  
  </style>
  
  <body>
    <div id="container">
	
	<h1>Insert the data of the student</h1>
	
	<form method="post">
  <div class="form-group">
    <label for="Roll No.">Roll No.</label>
    <input type="numeric" class="form-control" id="rno" aria-describedby="emailHelp" name="rno" placeholder="roll no.">
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" placeholder="name">
  </div>
  
  <div class="form-group">
    <label for="City">City</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="city" placeholder="City">
  </div>
  
  <div class="form-group">
    <label for="branch">Branch</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="branch"placeholder="Branch">
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