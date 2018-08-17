<?php
/*
Allows the user to both create new records and edit existing records
*/

// connect to the database
include("connect-db.php");

// creates the new/edit record form
// since this form is used multiple times in this file, I have made it a function that is easily reusable
function renderForm($first = '', $last ='', $error = '', $id = '')
{ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>


	
	
 <style type="text/css">
 
	#add {
	
	margin-top:20px;
	margin-left:50px;
	}
	#header {
	
	margin-top:30px;
	margin-left:50px;
	}
	#fname {
	
	margin-bottom:30px;
	
	}
	#lname {
	
	margin-bottom:10px;
	
	}
	#buttons {
	
	margin-left:70px;

	}
 
 
 </style>
 
	
  </body>



<title>



<?php if ($id != '') { echo "Edit Record"; } else { echo "Add New Record"; } ?>
</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<h1 id="header"><?php if ($id != '') { echo "Edit Record"; } else { echo "New Record"; } ?></h1>
<?php if ($error != '') {
echo "<div style='padding:4px; border:1px solid red; color:red'>" . $error
. "</div>";
} ?>

<form action="" method="post"  id="add">
<div>
<?php if ($id != '') { ?>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<p>ID: <?php echo $id; ?></p>
<?php } ?>
<div id="fname">
<strong>First Name* :</strong> <input type="text" name="firstname"
value="<?php echo $first; ?>"/><br>
</div>
<div id="lname">
<strong>Last Name* :</strong> <input type="text" name="lastname"
value="<?php echo $last; ?>"/>
</div>
<p>*required fields</p>
<div id="buttons">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>

 <a href ='loggedinpage.php'>
	  
        <button type="button" class="btn btn-primary">Back</button>



</div>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
  </head>
  <body>
  <title>Add Contents</title>
    <h1></h1>
	

</div>
</form>

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	


</body>
</html>

<?php }



/*

EDIT RECORD

*/
// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id']))
{
// if the form's submit button is clicked, we need to process the form
if (isset($_POST['submit']))
{
// make sure the 'id' in the URL is valid
if (is_numeric($_POST['id']))
{
// get variables from the URL/form
$id = $_POST['id'];
$firstname = htmlentities($_POST['firstname'], ENT_QUOTES);
$lastname = htmlentities($_POST['lastname'], ENT_QUOTES);

// check that firstname and lastname are both not empty
if ($firstname == '' || $lastname == '')
{
// if they are empty, show an error message and display the form
$error = 'ERROR: Please fill in all required fields!';
renderForm($firstname, $lastname, $error, $id);
}
else
{
// if everything is fine, update the record in the database
if ($stmt = $mysqli->prepare("UPDATE players SET firstname = ?, lastname = ?
WHERE id=?"))
{
$stmt->bind_param("ssi", $firstname, $lastname, $id);
$stmt->execute();
$stmt->close();
}
// show an error message if the query has an error
else
{
echo "ERROR: could not prepare SQL statement.";
}

// redirect the user once the form is updated
header("Location: view.php");
}
}
// if the 'id' variable is not valid, show an error message
else
{
echo "Error!";
}
}
// if the form hasn't been submitted yet, get the info from the database and show the form
else
{
// make sure the 'id' value is valid
if (is_numeric($_GET['id']) && $_GET['id'] > 0)
{
// get 'id' from URL
$id = $_GET['id'];

// get the recod from the database
if($stmt = $mysqli->prepare("SELECT * FROM players WHERE id=?"))
{
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->bind_result($id, $firstname, $lastname);
$stmt->fetch();

// show the form
renderForm($firstname, $lastname, NULL, $id);

$stmt->close();
}
// show an error if the query has an error
else
{
echo "Error: could not prepare SQL statement";
}
}
// if the 'id' value is not valid, redirect the user back to the view.php page
else
{
header("Location: view.php");
}
}
}



/*

NEW RECORD

*/
// if the 'id' variable is not set in the URL, we must be creating a new record
else
{
// if the form's submit button is clicked, we need to process the form
if (isset($_POST['submit']))
{
// get the form data
$firstname = htmlentities($_POST['firstname'], ENT_QUOTES);
$lastname = htmlentities($_POST['lastname'], ENT_QUOTES);

// check that firstname and lastname are both not empty
if ($firstname == '' || $lastname == '')
{
// if they are empty, show an error message and display the form
$error = 'ERROR: Please fill in all required fields!';
renderForm($firstname, $lastname, $error);
}
else
{
// insert the new record into the database
if ($stmt = $mysqli->prepare("INSERT players (firstname, lastname) VALUES (?, ?)"))
{
$stmt->bind_param("ss", $firstname, $lastname);
$stmt->execute();
$stmt->close();
}
// show an error if the query has an error
else
{
echo "ERROR: Could not prepare SQL statement.";
}

// redirec the user
header("Location: view.php");
}

}
// if the form hasn't been submitted yet, show the form
else
{
renderForm();
}
}

// close the mysqli connection
$mysqli->close();
?>
