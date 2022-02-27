<?php session_start();?>
<!doctype html>
<html lang="en">
	<head>
		<title>CETA</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		
		<style>
			.hovering {
			color:white !important ;
			background-color:rgba(0,0,0,0.9) !important; 
			}

		</style>
	</head>
  	<body style="background-color:rgba(0,0,0,0.2);">
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

				
		<script>
			function validate()
			{
				var ele = document.getElementsByTagName("select")[0].value;
				var pass = document.getElementsByTagName("input")[0].value;
				
				if(ele!="select" && pass.length==10)
				{
					return true;
				}
				
				else if(pass.length!=10 && pass.length>0)
				{
					$('#attendancemodal').modal('show');
					$('.modal-body').html('<b>Invalid Password entered.');
					
					return false;
				}
				
				else
				{
					$('#attendancemodal').modal('show');
					$('.modal-body').html('<b>Choose an option.')
					return false;
				}
			}
		</script>
		
		<!-- Modal -->
		<div class="modal fade" id="attendancemodal" tabindex="-1" role="dialog" aria-labelledby="attendance" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Alert.</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
					</div>
					<div class="modal-body">
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete="off">
				<div class="input-group" style="margin-top:10vh;">
                
					<div class="input-group-prepend">
						<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Select Event</span>
					</div>

					<select name="ename" class="custom-select hovering"  aria-label="options">
						<option name='none' selected> Choose...</option>
						<?php 
							include '../../dbconfig.php';
							
							$conn = new mysqli($server_name,$user,$pass,$db);
							
							if(!$conn->connect_error)
							{
								$edate = date("Ymd");
								
								$sql = "select * from eventsnew where dateofevent='$edate'";
								$res=$conn->query($sql);
								
								if($res->num_rows==0)
								{
									echo("<script> setTimeout(function () {
										window.top.location.reload();
										}, 2000);
										$('#attendancemodal').modal('show');
										$('.modal-body').html('<b>No Events Available.') </script>");
									
								}
								
								else{
										while($row=$res->fetch_row())
										{
											echo "<option value='".$row[1]."'> $row[1] </option>";
										}
									}
									
								$conn->close();
							}
						?>
					</select>
				
				</div>	
				
				<div class="input-group" style="margin-top:5vh;">
					<div class="input-group-prepend">
						<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Enter Event Password</span>
					</div>
					
					<input type="text" class="form-control hovering" name="pin" required placeholder="Enter.">
				</div>

				<input type="submit" class="btn btn-dark m-5" name="clicked" onclick="return validate()" data-toggle="modal" data-target="#attendancemodal" value='Click Here'>
			</form>
		</div>

		<?php 
			
			if($_SERVER["REQUEST_METHOD"]=="POST")
			{
				if(isset($_POST["clicked"]))
				{
					$ename = $_POST["ename"];
					$pin=$_POST['pin'];
					
					include '../../dbconfig.php';
					$conn = new mysqli($server_name,$user,$pass,$db);
					
					if(!$conn->connect_error)
					{
						$rollno = $_SESSION['roll'];
						
						$sql = "select eid,dateofevent from eventsnew where ename='$ename'";
						$res = $conn->query($sql);
						$row = $res->fetch_row();
						
						$eid=$row[0];
						$edate=$row[1];
						$table_name = $eid."_".str_replace("-","",$edate);
						
						
						$sql = "select * from $table_name where roll='$rollno'";
						$res = $conn->query($sql);
						
						if($res->num_rows==0)
						{
							echo "<script> $('#attendancemodal').modal('show');
							$('.modal-body').html('<b>You have not registered for this event.') </script>";
						}
						
						else
						{
							$sql = "select * from event_pass where pin='$pin' and used=0";
							$res = $conn->query($sql);
							
							if($res->num_rows==1)
							{
								$edate = date('Ymd');
								$sql   = "select eid from eventsnew where ename='$ename'";
								$res=$conn->query($sql);
								$eid="";
								$row=$res->fetch_row();
								$eid=$row[0];
								$table_name=$eid."_".$edate;
								
								$sql = "update event_pass set used=1 where pin='$pin'";
								$conn->query($sql);
								
								$roll = $_SESSION["roll"];
								
								$sql = "update $table_name set attended=1 where roll='$roll'";
								if($conn->query($sql))
								{
									echo "<script> $('#attendancemodal').modal('show');
									$('.modal-body').html('<b>Thankyou for attending the event.All the best.'); </script>";
								}
								
								else
								{
									echo "<script> $('#attendancemodal').modal('show');
									$('.modal-body').html('<b>You have not registered for the event.') </script>";
								}	
								
							}
							
							else
								{echo "<script> $('#attendancemodal').modal('show');
									$('.modal-body').html('<b>Invalid Pin Entered.Try again.'); </script>";}
						}
						
					}
				}
			}
		?>
	

	</body>
</html>