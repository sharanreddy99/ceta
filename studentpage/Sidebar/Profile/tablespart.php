<?php session_start();?>
<!doctype html>
<html lang="en">
  <head>
	<title>CETA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Trade+Winds&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../../../noscroll.css"/>

	<style>

		@media screen and (min-width:1200px){
			.card{
				margin-left:25%;width:40% !important;
			}
		}

	</style>

  </head>
  <body class="bg-dark">
	  
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
	<div class="row p-0 m-0">
		<div class="col p-0" >
			<div class="card" >
				
				<?php
					require("../../../dbconfig.php");
					$conn=mysqli_connect($server_name,$user,$pass,$db);
					
					if(!$conn->connect_error)
					{

						$rollno = $_SESSION["roll"];
						$flag = False;
						
					
						$sql  = "select profilepic from students where rollno = '$rollno'";
						$res=$conn->query($sql);
					
						$row = mysqli_fetch_array($res);
						echo '<img class="card-img-top" style="height:99vh;" src="data:image/jpeg;base64,'.$row[0].'" alt="">'; 
					}
					
				?>

						
				<!-- Modal -->
				<div class="modal fade" id="profilemodal" tabindex="-1" role="dialog" aria-labelledby="attendance" aria-hidden="true">
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
				
				<div class="card-body m-0 p-0">
					<?php 
					
						require("../../../dbconfig.php");
						$conn=mysqli_connect($server_name,$user,$pass,$db);
						
						if(!$conn->connect_error)
						{
							
							$rollno = $_SESSION["roll"];
							$flag = False;
							
							if($_SERVER["REQUEST_METHOD"]=="POST")
								{
									if(isset($_POST["update"]))
									{
										$value="";
										$name = $_POST["field"];
										$namedbms = "";
										
										if($name=="Profile Picture"){

											$file = base64_encode(file_get_contents($_FILES["image"]["tmp_name"]));
											$sql = "update students set profilepic = '$file' where rollno = '$rollno';";
											$res = $conn->query($sql);

											if($res){
													echo("<script> setTimeout(function () {
														location.replace('../logout.php');
														}, 3000);
														$('#profilemodal').modal('show');
														$('.modal-body').html('<b>Updated ".$name." Successfully . Please Login Again');
													
													</script>");
											}
		
										}
										else
										{
											$value = $_POST["fieldval"];
										}
										
										if($name=='First Name')
											$namedbms = 'fname';
										
										else if($name=='Last Name')
											$namedbms = 'lname';
										
										else if($name=='Email')
											$namedbms = "email";
										
										else if($name=='Password')
											$namedbms = 'password';
										
										else if($name=='Mobile')
											$namedbms = 'mobile';
										
										
										if ($flag == False && $namedbms!="")
										{
											if($namedbms!='password')
											{
												$res = $conn->query("update students set $namedbms='".strtolower($value)."' where rollno='".$rollno."';");
												if($res)
												{
													echo("<script> setTimeout(function () {
														location.replace('../logout.php');
														}, 3000);
														$('#profilemodal').modal('show');
														$('.modal-body').html('<b>Updated ".$name." Successfully . Please Login Again');
													
													</script>");
												}
											}
											
											else
											{
												$res = $conn->query("update students set $namedbms='".$value."' where rollno='".$rollno."';");
												if($res)
												{
													echo("<script> setTimeout(function () {
														location.replace('../logout.php');
														}, 3000);
														$('#profilemodal').modal('show');
														$('.modal-body').html('<b>Updated ".$name." Successfully . Please Login Again');
													
													</script>");
												}
											}
										}
									
									}
									
								}
							
							$sql  = "select * from students where rollno = '$rollno'";
							$res=$conn->query($sql);
							
							$li = "<div class='input-group'><div class='input-group-prepend'><span class='input-group-text' id='basic-addon1'>";
							$li_end = "</span></div>";

							$input = "<input type='text' class='form-control' disabled value='";
							$input_end = "'> </div>";
							while($result=$res->fetch_assoc())
							{
								echo "$li @STUDENT ID $li_end".$input.$result['sid'].$input_end;
								echo "$li @FIRST NAME $li_end".$input.ucwords($result['fname']).$input_end;
								echo "$li @LAST NAME $li_end".$input.ucwords($result['lname']).$input_end;
								echo "$li @ROLL NUMBER $li_end".$input.strtoupper($result['rollno']).$input_end;
								echo "$li @E-MAIL $li_end".$input.$result['email'].$input_end;
								echo "$li @PASSWORD $li_end".$input.$result['password'].$input_end;
								echo "$li @MOBILE $li_end".$input.$result['mobile'].$input_end;
								echo "$li @GENDER $li_end".$input.$result['gender'].$input_end;
								echo "$li @YEAR $li_end".$input.$result['year'].$input_end;
								echo "$li BRANCH $li_end".$input.$result['branch'].$input_end;
								
							}

						}
						
						else
						{
							echo "<script> alert('failed to connect to db'); </script>";
						}
					mysqli_close($conn);
					
					?>
				</dvi>	
			</div>
			
		</div>
	</div>
	

	
	</body>
</html>
	