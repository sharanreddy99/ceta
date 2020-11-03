<?php 
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['pass'])){
	require('facultypage/homepage.php');
}

else
{
	echo "<script> window.location.replace('registrationhome.php') </script>";
}
?>
