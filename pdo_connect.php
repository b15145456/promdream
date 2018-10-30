<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "promdream";
	$connection = null;
	$connection = new PDO('mysql:host='.$servername.';dbname='.$database.';charset=utf8',$username,$password);
?>