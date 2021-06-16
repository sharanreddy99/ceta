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
      .hovering,.btn-hovering {
        color:white !important ;
        background-color:rgba(0,0,0,0.9) !important; 
      }

	  .btn-hovering:hover {
		color:black !important;
		background-color:rgba(0,0,0,0.3) !important;
	  }
		@media screen and (min-width:1200px){
			.card{
				margin-left:25%;width:40% !important;
			}
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
        $('#volunteers').DataTable( {
                "createdRow": function( row, data, dataIndex){
                        $(row).addClass('blackisgold');
                    }
            });
          $("[name='volunteers_length']").css({"background-color":"rgba(0,0,0,0.8)","color":"white"});
          $("input[type='search']").css({"background-color":"rgba(0,0,0,0.8)","color":"white"});
      });
	</script>
    
	  
	<!-- Modal -->
	<div class="modal fade" id="volunteermodal" tabindex="-1" role="dialog" aria-labelledby="attendance" aria-hidden="true">
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
	
	<div class="container m-5">
		<table id="volunteers" class="table table-dark hover" cellspacing="0" width="100%">
			<thead>
				<tr>			
					<th class="th-sm">First Name</th>
					<th class="th-sm">Last Name</th>
					<th class="th-sm">Roll Number</th>
					<th class="th-sm">Year</th>
					<th class="th-sm">Branch</th>
					<th class="th-sm">Mobile</th>
				</tr>
			</thead>
			<tbody>											
				<?php 

					require('../dbconfig.php');

					$conn = new mysqli($server_name,$user,$pass,$db);


					if(!$conn->connect_error)
					{
						$sql1 = "select * from volunteers;";
						$res1=$conn->query($sql1);
						
						if($res1->num_rows>0)
						{
							$n = mysqli_num_fields($res1);
							while($row1 = $res1->fetch_row())
							{
								echo "<tr>";
								for($i=0;$i<$n;$i++)
								{
									if($i==2)
									{$row1[2]=strtoupper($row1[2]);}
									
									echo "<td> ".$row1[$i]."</td>";
								}
								
								echo "</tr>";
							}
						}
							
					}


					if($_SERVER["REQUEST_METHOD"]=="POST")
					{
						
						session_start();
						$roll = strtolower($_POST["roll"]);
						
						
						if(isset($_POST["add"]))
						{
							$sql = "select fname,lname,year,branch,mobile from students where rollno='$roll'";
							$res=$conn->query($sql);
							
							if($res->num_rows==1)
							{
								$row=$res->fetch_row();
								$fname = ucfirst($row[0]);
								$lname = ucfirst($row[1]);
								$year = ucfirst($row[2]);
								$branch = strtoupper($row[3]);
								$mobile = $row[4];
								
								$sql = "insert into volunteers values('$fname','$lname','$roll','$year','$branch','$mobile')";
								
								if($conn->query("$sql"))
								{
									echo("
									<script>
									setTimeout(function () {
										location.replace('tablespart.php');
										$('#volunteermodal').modal('hide');
										}, 2000);
										$('#volunteermodal').modal('show');
										$('.modal-body').html('<b>Volunteer added successfully.');
										
									</script>");
								}
								
							}
						}
						
						if(isset($_POST["delete"]))
						{
							$sql = "delete from volunteers where rollno='$roll'";
							if($conn->query("$sql"))
								{
							
									echo("
									<script>
									setTimeout(function () {
										location.replace('tablespart.php');
										$('#volunteermodal').modal('hide');
										}, 2000);
										$('#volunteermodal').modal('show');
										$('.modal-body').html('<b>Volunteer removed successfully.');
										
									</script>");
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
