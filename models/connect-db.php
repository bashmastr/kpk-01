<?php
$servername = "localhost";
$username = "bashmastr";
$password = "qamar";
$database = "kpk-01";

// Create connection
$con = new mysqli($servername, $username, $password,$database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
echo "Connected successfully";

?>
