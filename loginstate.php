<?php
   error_reporting(0);
   session_start();
   if(!isset($_SESSION)){$loginstate = 0;}
   else{
   		$loginstate=$_SESSION['loginstate'];
   		$username=$_SESSION['username'];
    	$ID=$_SESSION['ID'];
    	$contribution=$_SESSION['contribution'];
    	$Manager=$_SESSION['Manager'];
   }

?>