<?php

// server info
$server = 'shareddb-h.hosting.stackcp.net';
$user = 'username-3331092c';
$pass = '37ax960d07';
$db = 'username-3331092c';

// connect to the database
$mysqli = new mysqli($server, $user, $pass, $db);

// show errors (remove this line if on a live site)
mysqli_report(MYSQLI_REPORT_ERROR);

?>