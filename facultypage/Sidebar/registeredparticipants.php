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
      
      .hovering,.btn-hovering {
        color:white !important ;
        background-color:rgba(0,0,0,0.9) !important; 
      }

	  .btn-hovering:hover {
		color:black !important;
		background-color:rgba(0,0,0,0.3) !important;
	  }
    </style>

  </head>
  <body style="background-color:rgba(0,0,0,0.2);">
	  
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../DataTables/datatables.js"></script>
    <script>
		function validate()
		{
			var ele = document.getElementsByTagName("select");
			var ename = ele[0].value;
			var year  = ele[1].value;
			var branch = ele[2].value;
			
			if(ename!="Choose..." && year!="Choose..." && branch!="Choose...")
			{
				return true;
			}
			
			
			setTimeout(function () {
			$('#eventsmodal').modal('hide');
			}, 1500);
			$('#eventsmodal').modal('show');
			$('.modal-body').html('<b>Choose all the options.');
			return false;
			
		}
	</script>

	<script>
      $(document).ready(function() {
        $('#participants').DataTable( {
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "createdRow": function( row, data, dataIndex){
                        $(row).addClass('blackisgold');
                    }
            });
          $("[name='participants_length']").css({"background-color":"rgba(0,0,0,0.8)","color":"white"});
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

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
		<div class="input-group" style="margin-top:10vh;">	
			<div class="input-group-prepend">
				<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Select Event</span>
			</div>

			<select class="custom-select hovering" name="ename" id="selectoption1" aria-label="options">
				<option  name='choose' selected> Choose...</option>
				<?php 
					require('../../dbconfig.php');
					$conn = new mysqli($server_name,$user,$pass,$db);
					
					if(!$conn->connect_error)
					{
						$sql = "select * from eventsnew";
						$res=$conn->query($sql);
						while($row=$res->fetch_row())
						{
							echo "<option value='".$row[1]."'> $row[1] </option>";
						}

					$conn->close();
					}
				?>
			</select>
		</div>
		
		<hr>
		<div class="input-group">	
			<div class="input-group-prepend">
				<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Select Year</span>
			</div>

			<select class="custom-select hovering" id="selectoption2" name="year" aria-label="options">
				<option  name='choose' selected> Choose...</option>
				<option value="2nd Year">2nd Year</option>
				<option value="3rd Year">3rd Year</option>
				<option value="4th Year">4th Year</option>
			</select>
		</div>
		<hr>
		<div class="input-group">	
			<div class="input-group-prepend">
				<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Select Branch</span>
			</div>

			<select class="custom-select hovering" id="selectoption3" name="branch" aria-label="options">
				<option  name='choose' selected> Choose...</option>
				<option value="CSE-A" > CSE-A</option>
				<option value="CSE-B"> CSE-B</option>
				<option value="CSE-C"> CSE-C</option>
				<option value="CSE-D"> CSE-D</option>
			</select>
		</div>
		
		<hr>

		<div class="input-group">
			<input type="submit" class=" btn btn-hovering" style="margin-left:20%;width:20%;" value='Go' onclick="return validate()">					
			<input type='button' name='print' class=" btn btn-hovering" style="margin-left:20%;width:20%;"value='Print' id='print' onclick="window.print()">
		</div>
		
	</form>

	<div class="container mt-2">
		<table id="participants" class="table table-dark hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th class="th-sm">Slot No</th>
					<th class="th-sm">Roll Number</th>
					<th class="th-sm">First Name</th>
					<th class="th-sm">Last Name</th>
					<th class="th-sm">Mobile</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($_SERVER["REQUEST_METHOD"]=="POST")
					{
						$year = $_POST["year"];
						$branch = $_POST["branch"];
						require('../../dbconfig.php');

						$conn= mysqli_connect($server_name,$user,$pass,$db);
						if (mysqli_connect_errno($conn))
						{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}
						
						else
						{	
							$ename = $_POST["ename"];
							
							echo "<script> $('#selectoption1').val('".$ename."');</script>";
							echo "<script> $('#selectoption2').val('".$year."');</script>";
							echo "<script> $('#selectoption3').val('".$branch."');</script>";
							
							$sql   = "select eid,dateofevent from eventsnew where ename='$ename'";
							$res   = $conn->query($sql);
							$row   = $res->fetch_row();
							$eid   = $row[0]; 
							$edate = $row[1];
							$table_name=$eid."_".str_replace("-","",$edate);	
							
							$sql= "SELECT roll FROM $table_name ";
							$res=mysqli_query($conn,$sql);
							$count=1;
							while($row=$res->fetch_row())
							{
								$roll = $row[0];
								
								$sql = "select fname,lname,mobile from students where rollno = '$roll' and year='$year' and branch='$branch'";
								$temp = $conn->query($sql);
								if($temp->num_rows>0)
								{
									$rowtemp=$temp->fetch_row();
								
									echo "<tr>";
									echo "<td>" . $count . "</td>";
									echo "<td>" . strtoupper($roll) . "</td>";
									echo "<td>" . ucfirst($rowtemp[0]) . "</td>";
									echo "<td>" . ucfirst($rowtemp[1]) . "</td>";
									echo "<td>" . $rowtemp[2] . "</td>";
									echo "</tr>";
									
									$count+=1;
								}
							}
							
						}
						mysqli_close($conn);
						
					}
				?>
			</tbody>
			<tfoot>
        	</tfoot>
		</table>
	</div>
	
  </body>
</html>