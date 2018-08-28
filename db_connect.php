<?php
	$servername = "61.227.229.175";
	$username = "nekoto";
	$password = "z1x2c34";
	$database = "promdream";
	$conn = null;
	// Create connection
	$conn = mysqli_connect($servername, $username, $password,$database);
	mysqli_set_charset($conn, "utf8");
?>