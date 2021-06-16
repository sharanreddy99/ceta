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
				<th class="th-sm">Year </th>
				<th class="th-sm">Branch </th>
				<th class="th-sm">Score</th>
			</tr>

			</thead>
			<tbody>
				<?php
					
					include '../../dbconfig.php';

					$conn= mysqli_connect($server_name,$user,$pass,$db);
					if (mysqli_connect_errno($conn))
					{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					
					else
					{	
						$sql = "select * from leaderboard order by score desc";
						$res = $conn->query($sql);
						if($res)
						{
							$count=1;
							while($row=$res->fetch_row())
							{
								echo "<tr>";
								echo "<td>" . $count . "</td>";
								echo "<td>" . strtoupper($row[1]) . "</td>";
								echo "<td>" . ucwords($row[2]) . "</td>";
								echo "<td>" . ucwords($row[3]) . "</td>";
								echo "<td>" . ucwords($row[4]) . "</td>";
								echo "<td>" . ucwords($row[5]) . "</td>";
								echo "<td>" . $row[6] . "</td>";
								echo "</tr>";
								
								$count+=1;
							}
						}
						
							echo "</table>";
							echo "</center>";	
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
