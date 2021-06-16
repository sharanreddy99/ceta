<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	
	if(isset($_POST["studentlogin"]))
	{
		include 'dbconfig.php';
		
		$conn = new mysqli($server_name,$user,$pass,$db);
		
		if($conn)
		{
			$roll_form = strtolower($_POST["t1"]);
			$pass_form = $_POST["t2"];
			
			$sql = "select * from students where rollno='$roll_form' and password='$pass_form';";
			
			$res=$conn->query($sql);
			
			if($res->num_rows==1)
			{
				session_start();
				$_SESSION["conn"]=$conn;
				$_SESSION['roll']=$roll_form;
				$_SESSION['pass']=$pass_form;
				$res = $res->fetch_row();
				$_SESSION['mobile']=$res[6];
				$_SESSION['gender']=$res[7];
				$_SESSION['year']=$res[8];
				$_SESSION['branch']=$res[9];
				$_SESSION['sid']=$res[0];
				$_SESSION['fname']=$res[1];
				$_SESSION['lname']=$res[2];
				$_SESSION['email']=$res[4];
				echo "<script> window.location.replace('studentpage.php') </script>";
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