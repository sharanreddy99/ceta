<?php session_start();?>
<!doctype html>
<html lang="en">
 	<head>
		<title>Title</title>
		
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
			function removetext()
			{
				 document.getElementById("feedback").innerHTML="";
				
			}
	
			function validate()
			{
				var ele = document.getElementsByTagName("input");
				var fname = ele[0].value;
				var lname = ele[1].value;
				var roll = ele[2].value;
				var feedback = document.getElementById("feedback").value;
				
				if(fname!="" && lname!="" && roll!="" && feedback!="")
				{
					return true;
				}
				
				else
				{
					return false;
				}
			
			}
		</script>

		<?php
			$fname = ucfirst($_SESSION["fname"]);
			$lname = ucfirst($_SESSION["lname"]);
			$roll = strtoupper($_SESSION["roll"]);		
		?>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div class="container-fluid m-5">
				<div class="row">
					<div class="col-12 col-xl-6">
				
								
						<div class="input-group" style="margin-top:5vh;">
							<div class="input-group-prepend">
								<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">@Full Name</span>
							</div>
							
							<input name="t1" type="text" class="form-control hovering" value="<?php echo $fname;?>" readonly>
							<input name="t2" type="text" class="form-control hovering" value="<?php echo $lname;?>" readonly>
						</div>

						<div class="input-group" style="margin-top:5vh;">
							<div class="input-group-prepend">
								<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">@Roll Number</span>
							</div>
							
							<input name="t3" type="text" class="form-control hovering" value="<?php echo $roll;?>" readonly>
						</div>

					</div>
					<div class="col-12 col-xl-6">
					</div>
				</div>
			
				<hr>	
				<div class="input-group-prepend">
					<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3);">@Enter Feedback</span>
				</div>
				<textarea id="feedback" class="form-control hovering" style="height:30vh;width:90%;" ></textarea>
			
				
				<input class="btn btn-dark m-5 " name='submit' type='submit' onclick="return validate()"  value="Submit"/> 
				<input class="btn btn-dark" name='reset' type='reset'  value="Reset"     value='reset'/>

			</div>
			
		</form>

		<!-- Modal -->
		<div class="modal fade" id="feedbackmodal" tabindex="-1" role="dialog" aria-labelledby="attendance" aria-hidden="true">
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
			
		<?php
			include '../../dbconfig.php';
			$conn=mysqli_connect($server_name,$user,$pass,$db);
			
			if(!$conn->connect_error)
			{
				if(isset($_POST["submit"]))
				{
			
					$feedback = $_POST["feedback"];
					$low_roll = strtolower($roll);
					$sql = "select * from feedback where rollno='$low_roll'";
					$res = $conn->query($sql);

					if($res->num_rows!=0)
					{
						echo "<script> 
						$('#feedbackmodal').modal('show');
						$('.modal-body').html('<b>Feedback already submitted.');</script>";
					}
					
					else
					{
						$sql = "insert into feedback values('$fname','$lname','$roll','$feedback')";
						if($conn->query($sql))
						{
								echo "<script> $('#feedbackmodal').modal('show');
								$('.modal-body').html('<b>Thankyou for you valuable feedback.'); </script>";
						}
						
					}
				}
				
			}
		?>

  	</body>
</html>