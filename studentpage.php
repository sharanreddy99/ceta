<?php 
session_start();
if (isset($_SESSION['roll']) && isset($_SESSION['pass']))
{
    require('studentpage/homepage.php');
       
}

else
{
	echo "<script> window.location.replace('registrationhome.php') </script>";
}
?>