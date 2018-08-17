<?php

    session_start();

    if (array_key_exists("id", $_COOKIE) && $_COOKIE ['id']) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }

    if (array_key_exists("id", $_SESSION)) {
              
      include("connection.php");
      
      $query = "SELECT diary FROM `users` WHERE id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
      $row = mysqli_fetch_array(mysqli_query($link, $query));
 
      $diaryContent = $row['diary'];
	  
	  
	
	  
	  	
      
    } else {
        
        header("Location: index.php");
        
    }
	


	include("header.php");

?>




<nav class="navbar navbar-light bg-faded navbar-fixed-top">
  

  <a class="navbar-brand" href="#">Admin Login Page.</a>

    <div class="pull-xs-right">
      <a href ='index.php?logout=1'>
        <button class="btn btn-success-outline" type="submit">Logout</button></a>
    </div>

</nav>



    <div id="containerLoggedInPage">
	
	 
      <a class="btn btn-primary" href="records.php" role="button">Add</a>
 <a class="btn btn-primary" href="view_update.php" role="button">Update</a>
      <a class="btn btn-primary" href="view_delete.php" role="button">Remove</a>
      <a class="btn btn-primary" href="search.php" role="button">Search</a>
    

        
    </div>
<?php
    
    include("footer.php");
?>