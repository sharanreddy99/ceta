<?php session_start();?>
<!doctype html>
<html lang="en">
  	<head>
		<title>CETA</title>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../../DataTables/datatables.css"/>
	
		<style>
		.blackisgold{
			background-color:rgba(0,0,0,0.6) !important;
		}
		.hovering {
			color:white !important ;
			background-color:rgba(0,0,0,0.9) !important; 
		}
		
		</style>

  	</head>
  
  	<body style="background-color:rgba(0,0,0,0.2);">
	  
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../../DataTables/datatables.js"></script>
		
		<script>
			$(document).ready(function(){
				$('input').click(function(){
					var eid = $(this).attr('name');
					$('#eventnamedisplay').text($("input[name='"+eid+"hidden']").val());
					$('#formsubmit').attr('name',eid);
				});
			});
		</script>


		<script>
		$(document).ready(function() {
			$('#scorecard').DataTable( {
					"createdRow": function( row, data, dataIndex){
							$(row).addClass('blackisgold');
						}
				});
			$("[name='scorecard_length']").css({"background-color":"rgba(0,0,0,0.8)","color":"white"});
			$("input[type='search']").css({"background-color":"rgba(0,0,0,0.8)","color":"white"});
		});
		</script>
    

		<div class="modal fade" id="registermodal" tabindex="-1" role="dialog"  aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Registration Confirmation</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
					</div>
					<div class="modal-body">
						<p>Are you sure you want to register for the following event:</p>
						<b id='eventnamedisplay'> hello World

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
						<form method="post" action="registerevent.php">
							<input type="submit" id='formsubmit' class="btn btn-primary" value="Register"/>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container m-5">
			<table id="scorecard" class="table table-dark hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Event ID</th>
						<th>Event Name</th>
						<th>Date Of Event</th>
						<th>Year</th>
						<th> Registration </th>
					</tr>
				</thead>
				<tbody>
					<?php 

						require "../../dbconfig.php";
						$conn = new mysqli($server_name,$user,$pass,$db);

						$year = $_SESSION["year"];

						if(!$conn->connect_error)
						{
							

							$sql1 = "select e1.* from eventsnew e1,yreventsnew e2 where e1.eid = e2.eid and e2.year='$year';";
							$res1=$conn->query($sql1);
							$eid=0;
							if($res1->num_rows>0)
							{
								$n = mysqli_num_fields($res1);

								while($row1 = $res1->fetch_row())
								{
									$sql2 = "select e2.year from yreventsnew e2 where e2.eid=$row1[0]";
									$res2=$conn->query($sql2);
									$count=$res2->num_rows;
									echo "<tr>";
									for($i=0;$i<$n-1;$i++)
									{
										
										echo "<td> ".$row1[$i]."</td>";
									}

									$eid=$row1[0];
									$ename = $row1[1];
									$availability = $row1[$n-1];
									
									echo "<td>";
									$temp=0;
									while($row2=$res2->fetch_row())
									{
										if($temp>0)
											echo ",";
										echo $row2[0];
										$temp+=1;
									}
									echo "</td>";
									
									if($availability=="Yes")
										echo "<td>
											
											<input type='button' form='formid' name='r".$eid."' class='btn btn-info' data-toggle='modal' data-target='#registermodal' value='Register Here'>
											<input type='hidden' name='r".$eid."hidden' value='$ename'>
											</td>";
									
									if($availability=="No")
										echo "<td> Not Open Yet </td>";
									echo "</tr>";
								}

							}
								
						}
					?>
					
				</tbody>	
				<tfoot>
				</tfoot>
			</table>
		</div>
	</body>
</html>