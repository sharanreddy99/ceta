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
    
	<div class="container m-5">
		<table id="scorecard" class="table table-dark hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th class="th-sm">Slot No</th>
					<th class="th-sm">Roll Number</th>
					<th class="th-sm">First Name</th>
					<th class="th-sm">Last Name</th>
					<th class="th-sm">Event Name</th>
					<th class="th-sm">Score</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include '../../detailsofdemo.php';

					$conn= mysqli_connect($server_name,$user,$pass,$db);
					if (!mysqli_connect_errno($conn))
					{
					
						session_start();
						$roll = $_SESSION["roll"];
						
						$sql   = "select eid,ename,dateofevent from eventsold";
						$res   = $conn->query($sql);
						
						if($res->num_rows>0)
							{
							while($row  = $res->fetch_row())
							{
								$eid   = $row[0];
								$ename = $row[1];
								$edate = $row[2];
								$table_name=$eid."_".str_replace("-","",$edate);	
								
								
								$sql= "SELECT score FROM $table_name where roll='$roll'";
								
								$res2=mysqli_query($conn,$sql);	
								
								$count=1;
								
								if($res2)
								{
									$row2=$res2->fetch_row();
									
									$score = $row2[0];
									
									$sql = "select fname,lname from students where rollno = '$roll'";
									$temp = $conn->query($sql);
									$rowtemp=$temp->fetch_row();
									
									echo "<tr>";
									echo "<td>" . $count . "</td>";
									echo "<td>" . strtoupper($roll) . "</td>";
									echo "<td>" . ucfirst($rowtemp[0]) . "</td>";
									echo "<td>" . ucfirst($rowtemp[1]) . "</td>";
									echo "<td>" . ucfirst($ename) . "</td>";
									echo "<td>" . $score . "</td>";
									echo "</tr>";
									
									$count+=1;
								}
							}
						}
					}

					mysqli_close($conn);

				?>
			
			</tbody>
			<tfoot>
        	</tfoot>
		</table>
	</div>
	
  </body>
</html>