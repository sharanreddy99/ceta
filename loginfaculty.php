<?php 
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		
		if(isset($_POST["facultylogin"]))
		{
			include 'dbconfig.php';
			
			$conn = new mysqli($server_name,$user,$pass,$db);
			
			if($conn)
			{
				$email_form = strtolower($_POST["t3"]);
				$pass_form = $_POST["t4"];
				
				
				$sql = "select * from faculty where email='$email_form' and pass='$pass_form';";
				
				$res=$conn->query($sql);
				
				if($res->num_rows==1)
				{
					$_SESSION["conn"]=$conn;
					$_SESSION['email']=$email_form;
					$_SESSION['pass']=$pass_form;
					$res = $res->fetch_row();
					$_SESSION['mobile']=$res[5];
					$_SESSION['gender']=$res[6];
					$_SESSION['fid']=$res[0];
					$_SESSION['fname']=$res[1];
					$_SESSION['lname']=$res[2];
					
					echo "<script> window.location.replace('facultypage.php') </script>";
				}
				
				else
				{
					echo "<script> alert('invalid login credentials');</script>";
					echo "<script> window.location.replace('registrationhome.php') </script>";
				}	
			}
		}
	}
?>