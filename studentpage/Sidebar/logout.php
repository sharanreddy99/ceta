<?php
	if(session_start())
	{
		$_SESSION = array();
		session_destroy();
		
		echo "<script> window.top.location.replace('../../registrationhome.php') </script>";
	}
?>