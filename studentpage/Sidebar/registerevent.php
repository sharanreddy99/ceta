<?php
	
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$eid = "";


		foreach($_POST as $key=>$value)
			$eid=$key;
			
		$eid = substr($eid,1);
		
		include '../../dbconfig.php';
		$conn = new mysqli($server_name,$user,$pass,$db);
		
		if(!$conn->connect_error)
		{
			$sql = "select dateofevent from eventsnew where eid=".$eid;
			$res = $conn->query($sql);
			$row=$res->fetch_row();
			$edate=$row[0];
			
			$edate=str_replace("-","",$edate);
			
			
			$table_name = $eid."_".$edate;
			session_start();
			
			$roll   = $_SESSION["roll"];
			$year   = $_SESSION["year"];
			$branch = $_SESSION["branch"];
			$score  = 0;
			$event_pass = 0;
			$sql = "insert into $table_name values('$roll','$year','$branch',$score,$event_pass)";
			$conn->query($sql);
			
			echo "<script> window.location.replace('upcomingevents.php');</script>";
			
		}

	}

?>