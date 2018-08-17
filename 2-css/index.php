<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
  </head>
  <body>
  
	<div class = "container">
	
	<h1>Contact Form</h1>
	
	 <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="Enter your email address">
  </div>
  
   <div class="form-group">
    <label for="subject">Subject</label>
    <input type="subject" class="form-control" id="subject">
  </div>
  
  <div class="form-group">
    <label for="content">Write your queries here</label>
    <textarea class="form-control" id="content" rows="3"></textarea>
  </div>

	  <button type="submit" class="btn btn-primary">Submit</button>

	
  
  </form>
  
    <h1></h1>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<form>
 /script>
	
		<script type="text/javascript">
		
				$("form").submit(function(e){
			
					e.preventDefault();
					
					var error = "";
					
					if ($("#subject").val() == "") {
					
						error += "<p>The subject field is required.</p>";
					
					}
					
					if ($("#content").val() == "") {
					
						error += "<p>The content field is required.</p>";
					
					}
					
			if(error != "")	{
			
				$("#error").html('<div class="alert alert-danger" role="alert"><strong>
  There were error(s) in your form: </strong>' + error + 
'</div>');
				
				}
				
				});
				
				
		
		</script>
	
  </body>
</html>

<form>
 