<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "promdream";
	$conn = null;
	// Create connection
	$conn = mysqli_connect($servername, $username, $password,$database);
	mysqli_set_charset($conn, "utf8");
?>