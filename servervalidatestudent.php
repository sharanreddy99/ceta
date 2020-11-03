<!doctype html>
<html lang="en">
  <head>
	<title>Title</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
	  
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
	<!-- Modal -->
	<div class="modal fade" id="validatealert" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Alert</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
				</div>
				<div class="modal-body">
					Body
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<?php
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			include 'detailsofdemo.php';

			$conn = new mysqli($server_name,$user,$pass,$db);
			
			if(!$conn->connect_error)
				{
					$fname  = strtolower($_POST["t1"]);
					$lname  = strtolower($_POST["t2"]);
					$rollno = strtolower($_POST["t3"]);
					$email  = $_POST["t4"];
					$pass   = $_POST["t5"];
					$mobile = $_POST["t7"];
					$gender = $_POST["gender"];
					$year   = $_POST["Year"];
					$branch = $_POST["Branch"];
					$pin    = $_POST["pin"];
					
					
					$sql1 = "select * from students where fname='$fname';";
					$sql2 = "select * from students where rollno='$rollno';";
					$sql3 = "select * from pingenerator where pin='$pin' and used=0";
					
					$res1 = $conn->query($sql1);
					$res2 = $conn->query($sql2);
					$res3 = $conn->query($sql3);
					
					if($res1->num_rows>0 or $res2->num_rows>0 or $res3->num_rows!=1)
					{
						echo "<script> setTimeout(function(){
							$('#validatealert').modal('hide');
							location.replace('registrationhome.php');
						},2000);
						$('.modal-body').html('<b> Invalid Data or Pin Entered .');
						$('#validatealert').modal('show');
						</script>";
					}
					
					else
					{
						$sql = "select max(sid) from students;";
						$res = $conn->query($sql);
						$sid = 1;
						if($res->num_rows>0)
						{
							$res = $res->fetch_row();
							$sid=$res[0]+1;
						}
						
						$sql="insert into students values($sid,'$fname','$lname','$rollno','$email','$pass','$mobile','$gender','$year','$branch',NULL);";
						$conn->query($sql);
						
						$sql = "update pingenerator set used=1 where pin='$pin'";
						$conn->query($sql);
						
						echo "<script> setTimeout(function(){
							$('#validatealert').modal('hide');
							location.replace('registrationhome.php');
						},2000);
						$('.modal-body').html('<b> Registration Successful .');
						$('#validatealert').modal('show');
						</script>";

					}
				}
				
			else
			{
				echo "cosnnection failed";
			}
			
		}
	?>
  </body>
</html>	
