<?php 

	if(session_start())
	{
	$email=$_SESSION["email"];
	$pass=$_SESSION["pass"];
	$fid    = $_SESSION["fid"];
	$fname  = $_SESSION["fname"];
	$lname  = $_SESSION["lname"];
	$mobile = $_SESSION["mobile"];
	$gender = $_SESSION["gender"];
	$conn   = $_SESSION["conn"];
	
	}
?>