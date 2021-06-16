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
			include 'dbconfig.php';

			$conn = new mysqli($server_name,$user,$pass,$db);
			
			if(!$conn->connect_error)
				{
					$fname  = strtolower($_POST["t1"]);
					$lname  = strtolower($_POST["t2"]);
					$email  = $_POST["t3"];
					$pass   = $_POST["t4"];
					$mobile = $_POST["t6"];
					$gender = $_POST["gender"];
					$pin    = $_POST["pin"];
					$sql1 = "select * from faculty where fname='$fname';";
					$res1 = $conn->query($sql1);
					
					$sql2 = "select * from adminpassword;";
					$res2 = $conn->query($sql2);
					$res2 = $res2->fetch_row();
					$adminpin = $res2[0];
					if($res1->num_rows>0){
						echo "<script> setTimeout(function(){
							$('#validatealert').modal('hide');
						},2000);
						$('.modal-body').html('<b> Faculty already registered .');
						$('#validatealert').modal('show');
						</script>";	
					}
					else if($pin!=$adminpin)
					{
						echo "<script> setTimeout(function(){
							$('#validatealert').modal('hide');
						},2000);
						$('.modal-body').html('<b> Invalid Pin Entered .');
						$('#validatealert').modal('show');
						</script>";
					}
					else
					{
						$sql = "select max(fid) from faculty;";
						$res = $conn->query($sql);
						$fid = 1;
						if($res->num_rows>0)
						{
							$res = $res->fetch_row();
							$fid=$res[0]+1;
						}
						
						$sql="insert into faculty values($fid,'$fname','$lname','$email','$pass','$mobile','$gender',NULL);";
						$conn->query($sql);
						
						echo "<script> setTimeout(function(){
							$('#validatealert').modal('hide');
							location.replace('registrationhome.php');
						},2000);
						$('.modal-body').html('<b> Faculty Registration Successful .');
						$('#validatealert').modal('show');
						</script>";
					}
				}
				
			else
			{
				echo "connection failed";
			}
			
		}

	?>

  </body>
</html>
