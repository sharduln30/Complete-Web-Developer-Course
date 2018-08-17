<?php
$servername = "shareddb-h.hosting.stackcp.net";
$username = "username-3331092c";
$password = "37ax960d07";
$dbname = "username-3331092c";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> Roll No: ". $row["Roll No."]. " - Name: ". $row["Name"]. " - City " . $row["City"] ." - Branch " .$row["Branch"]"<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?> 
