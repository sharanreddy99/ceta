<html>
<head>
<style type="text/css">
	input[type=text], select {
  width: 15%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 10%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
#t1 {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

#t1 td, #t1 th {
  border: 1px solid #ddd;
  padding: 8px;
}

#t1 tr:nth-child(even){background-color: #f2f2f2;}
#t1 tr:nth-child(odd){background-color: #e6dfcc;}

#t1 tr:hover {background-color: #ddd;}

#t1 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #14D19C;
  color: white;
}
</style>

<script>
	function validate()
	{
		var ele = document.getElementsByTagName("select");
		var ename = ele[0].value;
		
		var ele = document.getElementsByTagName("input");
		var roll = ele[0].value;
		var score = ele[1].value;
			
		if(ename!="select" && roll!="" && score!="")
		{
			return true;
		}
		
		alert('select all the options');
		return false;
		
	}
	
	function validatedef()
	{
		var ele = document.getElementsByTagName("input");
		var defscore = ele[2].value;
		
		if(defscore!="")
		{
			return true;
		}
		
		alert('select all the options');
		return false;
		
	}
</script>
</head>

<body style="background-image:url('../mainpage.jpg');background-size:100% 100%;background-attachment:fixed;">
	
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
		<center>
		<select name="ename">
			<option value="select" selected>select</option>
			<?php 
				
				include '../../detailsofdemo.php';
				
				$conn = new mysqli($server_name,$user,$pass,$db);
				
				if(!$conn->connect_error)
				{
					$sql = "select * from eventsold";
					$res=$conn->query($sql);
					while($row=$res->fetch_row())
					{
						echo "<option value='".$row[1]."'> $row[1] </option>";
					}

				$conn->close();
				}
			?>
		</select>
		
		<input type = "text" name="roll" autocomplete="off" style="position:relative;left:2%" placeholder="Enter roll Number">
		<input type = "text" name="score" autocomplete="off" style="position:relative;left:4%" placeholder="Enter Score">

		<br>
		<br>		
		<input type="submit" onclick="return validate()" style="width:200px;" name="uws" value='Update Winners Score'>
	
		<br>
		<br>
		<input type = "text" name="defscore" autocomplete="off" style="position:relative;left:4%" placeholder="Enter Default Score">		
		<input type="submit" style="position:relative;left:10%;width:200px;" onclick="return validatedef()" name="ups" value='Update Participants Score'>
	</form>
	
<table id="t1">
<th>Slot No</th>
<th>Roll Number</th>
<th>First Name</th>
<th>Last Name</th>
<th>Score</th>

</center>

</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	include '../../detailsofdemo.php';
	$conn= mysqli_connect($server_name,$user,$pass,$db);
	if (mysqli_connect_errno($conn))
	{
		echo "<script> alert('Failed to connect to MySQL:'); </script> ";
	}
	
	else
	{	
		if(isset($_POST["uws"]))
		{
			$ename = $_POST["ename"];
			
			$sql   = "select eid,dateofevent from eventsold where ename='$ename'";
			$res   = $conn->query($sql);
			$row   = $res->fetch_row();
			$eid   = $row[0]; 
			$edate = $row[1];
			$score = $_POST["score"];
			$roll  = strtolower($_POST["roll"]);
			$table_name=$eid."_".str_replace("-","",$edate);	
			
			$sql= "update $table_name set score = $score where roll = '$roll'";
			if(mysqli_query($conn,$sql))
			{
				echo "<script> alert('updated successfully'); </script>";
			}
			
			$sql= "SELECT score FROM $table_name where roll='$roll'";
			$res=mysqli_query($conn,$sql);
			$count=1;
			while($row=$res->fetch_row())
			{
				$sql = "select fname,lname from students where rollno = '$roll'";
				$temp = $conn->query($sql);
				$rowtemp=$temp->fetch_row();
			
				echo "<tr>";
				echo "<td>" . $count . "</td>";
				echo "<td>" . strtoupper($roll) . "</td>";
				echo "<td>" . ucfirst($rowtemp[0]) . "</td>";
				echo "<td>" . ucfirst($rowtemp[1]) . "</td>";
				echo "<td>" . $row[0] . "</td>";
				echo "</tr>";
				
				$count+=1;
			}
		}
		
		if(isset($_POST["ups"]))
		{
			$ename = $_POST["ename"];
			
			$sql   = "select eid,dateofevent from eventsold where ename='$ename'";
			$res   = $conn->query($sql);
			$row   = $res->fetch_row();
			$eid   = $row[0]; 
			$edate = $row[1];
			$score = $_POST["defscore"];
			$roll  = strtolower($_POST["roll"]);
			$table_name=$eid."_".str_replace("-","",$edate);	
			
			$sql= "update $table_name set score = $score where score=0";
			
			if(mysqli_query($conn,$sql))
			{
				echo "<script> alert('updated successfully'); </script>";
			}
			
			
			$sql= "SELECT roll,score FROM $table_name where score=$score";
			$res=mysqli_query($conn,$sql);
			$count=1;
			while($row=$res->fetch_row())
			{
				$roll=$row[0];
				$sql = "select fname,lname from students where rollno = '$roll'";
				$temp = $conn->query($sql);
				$rowtemp=$temp->fetch_row();
			
				echo "<tr>";
				echo "<td>" . $count . "</td>";
				echo "<td>" . strtoupper($roll) . "</td>";
				echo "<td>" . ucfirst($rowtemp[0]) . "</td>";
				echo "<td>" . ucfirst($rowtemp[1]) . "</td>";
				echo "<td>" . $row[1] . "</td>";
				echo "</tr>";
				
				$count+=1;
			}
		
			echo "</table>";
			echo "</center>";
		
		}
		

	}
	mysqli_close($conn);
	
}
?>