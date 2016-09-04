<?php
$servername = "localhost";
$username = "slapp";
$passwd = "slapp";
$dbname = "slappstore";

// Create connection
$conn = new mysqli($servername, $username, $passwd, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    
}
?> 