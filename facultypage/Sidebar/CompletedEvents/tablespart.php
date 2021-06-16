<!doctype html>
<html lang="en">
  <head>
	<title>CETA</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../../DataTables/datatables.css"/>
  
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
  <body style="background-color:rgba(0,0,0,0.2);">
	  
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../../DataTables/datatables.js"></script>
    
	<script>
      $(document).ready(function() {
        $('#completedevents').DataTable( {
                "createdRow": function( row, data, dataIndex){
                        $(row).addClass('blackisgold');
                    }
            });
          $("[name='completedevents_length']").css({"background-color":"rgba(0,0,0,0.8)","color":"white"});
          $("input[type='search']").css({"background-color":"rgba(0,0,0,0.8)","color":"white"});
      });
	</script>
    
	  
	<!-- Modal -->
	<div class="modal fade" id="eventsmodal" tabindex="-1" role="dialog" aria-labelledby="attendance" aria-hidden="true">
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
	<input type='button' name='print' class="btn btn-hovering" style="margin-left:50%;margin-top:2%;" value='Print' id='print' onclick="window.print()">
	<div class="container m-5">
		<table id="completedevents" class="table table-dark hover" cellspacing="0" width="100%">
			<thead>
				<tr>			
					<th class="th-sm">Event ID</th>
					<th class="th-sm">Event Name</th>
					<th class="th-sm">Date Of Event</th>
					<th class="th-sm">Year</th>
				</tr>
			</thead>
			<tbody>								
				<?php 
					require('../../../dbconfig.php');
					$conn = new mysqli($server_name,$user,$pass,$db);

					if(!$conn->connect_error)
					{
						$sql1 = "select e1.* from eventsold e1;";
						$res1=$conn->query($sql1);
						
						if($res1->num_rows>0)
						{
							$n = mysqli_num_fields($res1);
							while($row1 = $res1->fetch_row())
							{
								$sql2 = "select e2.year from yreventsold e2 where e2.eid=$row1[0]";
								$res2=$conn->query($sql2);
								$count=$res2->num_rows;
								echo "<tr>";
								for($i=0;$i<$n;$i++)
								{
									
									echo "<td> ".$row1[$i]."</td>";
								}
								
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
								echo "</tr>";
							}
						}
							
					}


					if($_SERVER["REQUEST_METHOD"]=="POST")
					{
						
						if(isset($_POST["delete"]))
						{
						
							$val1 = "";
							$val2 = "";
							$val3 = "";
							$eid  = $_POST["deleid"];
							$res  =  mysqli_query($conn,"SELECT eid,ename,dateofevent FROM eventsold WHERE eid=$eid");	
							
							if($res->num_rows>0)
							{
								while($row=mysqli_fetch_row($res))
								{
									$val1=$row[0];
									$val2=$row[1];
									$val3=$row[2];
								}
							}
							$table_name=$eid."_".str_replace("-","",$val3);

							if(isset($_POST['delete'])) 
							{
								if(mysqli_query($conn,"DELETE FROM eventsold WHERE eid = $val1"))
								echo("
								<script>
								setTimeout(function () {
									location.replace('tablespart.php');
									$('#eventsmodal').modal('hide');
									}, 1500);
									$('#eventsmodal').modal('show');
									$('.modal-body').html('<b>Deleted event successfully.');
									
								</script>");
							}
							
							$sql = "drop table $table_name";
							$conn->query($sql);
							
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
