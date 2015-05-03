<?
	$servername = "localhost";
	$username = "root";
	$password = "";

	// Create connection
	$mysqli = new mysqli($servername, $username, $password, "projectbump");

	// Check connection
	if ($mysqli->connect_error) {
	    die("Connection failed: " . $mysqli->connect_error);
	} 
?>