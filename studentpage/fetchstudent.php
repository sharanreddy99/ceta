<?php 

	if(session_start())
	{
	$roll   = $_SESSION["roll"];
	$pass   = $_SESSION["pass"];
	$sid    = $_SESSION["sid"];
	$fname  = $_SESSION["fname"];
	$lname  = $_SESSION["lname"];
	$email  = $_SESSION["email"];
	$mobile = $_SESSION["mobile"];
	$gender = $_SESSION["gender"];
	$year   = $_SESSION["year"];
	$branch = $_SESSION["branch"];
	$conn   = $_SESSION["conn"];
	
	}
?>