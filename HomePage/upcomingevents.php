<!doctype html>
<html lang="en">
  <head>
	<title>CETA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../DataTables/datatables.css"/>
	
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
  <body>
	  
  	<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../DataTables/datatables.js"></script>
	
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

					include '../dbconfig.php';
					$conn = new mysqli($server_name,$user,$pass,$db);

					if(!$conn->connect_error)
					{
						$sql1 = "select e1.* from eventsnew e1;";
						$res1=$conn->query($sql1);
						$eid=0;
						if($res1->num_rows>0)
						{
							$n = mysqli_num_fields($res1);
							echo "<center>";
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

										<form method='post' action='../registrationhome.php' target='_blank'>
											<input type='submit' name='r".$eid."' class='btn btn-primary' onclick='return validate()' value='Register Here'>
										</form>
										</td>";
								
								if($availability=="No")
									echo "<td> <b>Not Open Yet </td>";
								echo "</tr>";
							}
							echo"</table>";
							echo"</center>";
							mysqli_close($conn);
						}
							
					}
				?>
			</tbody>	
			<tfoot>
			</tfoot>
		</table>

	</body>
</html>