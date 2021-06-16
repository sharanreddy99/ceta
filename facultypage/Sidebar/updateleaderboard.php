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
		background-color:rgba(0,0,0,0.3) !important;}
    
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
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"createdRow": function( row, data, dataIndex){
                        $(row).addClass('blackisgold');
                    }
            });
          $("[name='scorecard_length']").css({"background-color":"rgba(0,0,0,0.8)","color":"white"});
          $("input[type='search']").css({"background-color":"rgba(0,0,0,0.8)","color":"white"});
      });
    
      function validate(){
        var ele = document.getElementsByTagName("select");
        var ename = ele[0].value;
        
        
        if(ename!="Choose..."){
          return true;
        }
        
        $('#alert-menu').attr({"data-content":"Choose a valid option."});
        
        $('#alert-menu').popover({trigger: 'click'});
        setTimeout(function(){
          $('#alert-menu').popover("hide");
          },3000);
        
        return false;
        
      }

    </script>

    <div class="container m-5">

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
          
		  <div class="input-group">
				<div class="row">
					<div class="col">
					<input type="submit" class="form-control btn-hovering" name='calcleaderboard' value='Calculate Leaderboard'>
					</div>
					<div class="col">
					<input type="submit" class="form-control btn-hovering" name='showleaderboard' value='Show Leaderboard'>
					</div>
					<div class="col">
						<input type='button' class="form-control btn-hovering" onclick="window.print()" name='print' value="Print" id='print'>
					</div>
				</div>
	  		</div>
     </form>

	  
	  
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

	   <br>
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
				if($_SERVER["REQUEST_METHOD"]=="POST")
				{
					
					require('../../dbconfig.php');

					$conn= mysqli_connect($server_name,$user,$pass,$db);
					if (!mysqli_connect_errno($conn))
					{
						if(isset($_POST["calcleaderboard"]))
						{
							$sql   = "drop table leaderboard";
							$conn->query($sql);
							
							$sql = "CREATE TABLE `ceta`.`leaderboard` ( `sid` INT NOT NULL , `rollno` VARCHAR(11) NOT NULL , `fname` VARCHAR(30) NOT NULL , `lname` VARCHAR(20) NOT NULL , `year` VARCHAR(10) NOT NULL , `branch` VARCHAR(6) NOT NULL , `score` INT NOT NULL DEFAULT '0' );";
							$conn->query($sql);
							
							$sql = "select eid,dateofevent from eventsold";
							$res = $conn->query($sql);
							
							if($res)
							{

								$sid = 1;
								
								while($row = $res->fetch_row())
								{
									$eid=$row[0];
									$edate=$row[1];
									$table_name = $eid."_".str_replace("-","",$edate);
								
									
									$sql = "select roll,score from $table_name";
									$res1 = $conn->query($sql);
									
									if($res1)
									{
										while($row1 = $res1->fetch_row())
										{
											$rollno = $row1[0];
											$score  = $row1[1];
											
											$sql = "select fname,lname,year,branch from students where rollno='$rollno'";
											$res2 = $conn->query($sql);
											$row2 = $res2->fetch_row();
											$fname = $row2[0];
											$lname = $row2[1];
											$year  = $row2[2];
											$branch =  $row2[3];
											
											$sql = "select * from leaderboard where rollno='$rollno'";
											$res3 = $conn->query($sql);
											
											if($res3->num_rows==0)
											{
												$sql = "insert into leaderboard values($sid,'$rollno','$fname','$lname','$year','$branch',$score)";
												$conn->query($sql);
												$sid+=1;
											}
											
											else
											{
												$sql = "update leaderboard set score = score+$score where rollno='$rollno';";
												$conn->query($sql);
											}
										}
									}
								}
							}
							
							echo("<script> setTimeout(function () {
								$('#eventsmodal').modal('hide');
								}, 1500);
								
									$('#eventsmodal').modal('show');
									$('.modal-body').html('<b>Calculated leaderboard successfully.');
									
								</script>");
						}
						
						else if(isset($_POST["showleaderboard"]))
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