
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Validation Form</title>
	
	<style type="text/css">
	
	html { 
          background: url(formbackground.jpg) no-repeat center center fixed;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
          }
		    body {
              
              background: none;
              
          }
	
	.container {
	
		margin-top: 50px;
		
	
	}
	#button {
	
		margin-bottom: 40px;
	
	}
	
	
	
	</style>


  </head>
  <body background= "red"></body>
  
  	
  
	<div class="container" >
  
    <h1>User Validation Form</h1>
	
	<form method="post">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
  </div>
  <div>
   
  <button type="submit" class="btn btn-primary" id="button">Sign up</button>
</form>
</div>
	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<?php

    if (array_key_exists('email', $_POST) OR array_key_exists('password', $_POST)) {
        
        $link = mysqli_connect("shareddb-h.hosting.stackcp.net", "username-3331092c", "37ax960d07", "username-3331092c");

            if (mysqli_connect_error()) {
        
                die ("There was an error connecting to the database");
        
            } 
        
        
        if ($_POST['email'] == '') {
            
			echo '<div class="alert alert-danger" role="alert"><p>Email address is required.</p></div>';
            
        } else if ($_POST['password'] == '') {
           
			echo '<div class="alert alert-danger" role="alert"><p>Password is required.</p></div>';
            
        } else {
            
            $query = "SELECT `id` FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";
            
            $result = mysqli_query($link, $query);
            
            if (mysqli_num_rows($result) > 0) {
                		
			echo '<div class="alert alert-danger" role="alert"><p>Email address already exists.</p></div>';
                
            } else {
                
                $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";
                
                if (mysqli_query($link, $query)) {
                    
					 echo '<div class="alert alert-success" role="alert">Signed up successfully!</div>';
					 
					 
                    
                } else {
                    
					echo '<div class="alert alert-danger" role="alert"><p>Problem signing you up - please try again later.</p></div>';
                    
                }
                
            }
            
        }
        
        
    }


?>