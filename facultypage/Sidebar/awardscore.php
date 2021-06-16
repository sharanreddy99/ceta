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
      $(document).ready(function(){
        $('#options-awardscore').change(function(){
          var title = $(this).val();
          
		if(title=="Winner's Score"){
			$('.modal-title').html("Winner's Score");
			$('.winnerscore').show();
			$('.defaultscore').hide();
			$('#mainmodal').modal('show');
			$('#alerts').modal('hide');
		  }

		  
		  else if(title=="Participant's Score"){
			$('.modal-title').html("Participant's Score");
			$('.defaultscore').show();
			$('.winnerscore').hide();
			$('#mainmodal').modal('show');
			$('#alerts').modal('hide');
			
		  }

        });
      });
    </script>

	
	<script>
		function validate()
		{
			var ele = document.getElementsByTagName("select");
			var ename = ele[1].value;
			
			var ele = document.getElementsByTagName("input");
			var roll = ele[0].value;
			var score = ele[1].value;
				
			if(ename!="Choose..." && roll!="" && score!="")
			{
				return true;
			}

			setTimeout(function () {
			$('[data-toggle="popover"]').popover('hide');
			}, 3000);
			$('[data-toggle="popover"]').popover();
			return false;
			
		}
		
		function validatedef()
		{
			var ele = document.getElementsByTagName("input");
			var defscore = ele[2].value;
			var ele = document.getElementsByTagName("select");
			var ename = ele[1].value;
			
			
			if(ename!="Choose..." && defscore!="")
			{
				return true;
			}
			setTimeout(function () {
			$('[data-toggle="popover"]').popover('hide');
			}, 3000);
			
			$('[data-toggle="popover"]').popover();
			return false;
			
		}
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

	<!-- Modal -->
	<div id="alerts" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title alerts-title">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
				</div>
				<div class="modal-body alerts-body">
					Body
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

    <div class="container m-5">
		<div class="input-group mb-3">
			
			<div class="input-group-prepend">
				<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Update</span>
			</div>

			<select class="custom-select hovering" id="options-awardscore" aria-label="options">
				<option  name='choose' selected> Choose...</option>
				<option name='pscore'>Participant's Score</option>
				<option name='wscore'>Winner's Score</option>
			</select>
		</div>

		<div class="modal fade" id="mainmodal" data-backdrop="static" tabindex="-1" id ="modal" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" >Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>	
					</div>

					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">	
						<div class="modal-body">
							<div class="input-group">
								<div class="input-group-prepend">
									<label class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); " for="inputGroupSelect01">Choose Event.</label>
								</div>
							
								<select class="custom-select hovering" name="ename" id="inputGroupSelect01">
									<option name="choose" selected>Choose...</option>
									<?php 
										
										include '../../dbconfig.php';
										
										$conn = new mysqli($server_name,$user,$pass,$db);
										
										if(!$conn->connect_error)
										{
											$sql = "select * from eventsold";
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
							
							<br>

							<div class="winnerscore">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Roll Number</span>
									</div>
									<input type = "text" name="roll" autocomplete="off" class="form-control hovering" placeholder="Enter roll Number">									
								</div>
								<br>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Winner Score</span>
									</div>
									<input type = "text" name="score" autocomplete="off" class="form-control hovering" placeholder="Enter Score">
								</div>
								<br>
								<b>Note: Winner's score can be updated one student at a time.
							</div>
							
							<div class="defaultscore">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Default Score</span>
									</div>
									<input type = "text" name="defscore" autocomplete="off" class="form-control hovering" placeholder="Enter Default Score">									
								</div>
								<br>
								<b>Note: Default score updates all non updated scores only.
							</div>
					
						</div>		

						<div class="modal-footer winnerscore">
							<input type="submit" onclick="return validate()" class="btn hovering" name="uws" value='Update Winners Score' data-toggle="popover" title="Alert." data-content="Fill all the options.">
						</div>
					
						<div class="modal-footer defaultscore">
							<input type="submit" class="btn hovering" onclick="return validatedef()" name="ups" value='Update Participants Score' data-toggle="popover" title="Alert." data-content="Fill all the options.">
						</div>
						
					</form>
				</div>
			</div>
		</div>

      <br>
      <table id="scorecard" class="table table-dark hover" cellspacing="0" width="100%">
        <thead>
          <tr> 
            <th class="th-sm">Slot No</th>
            <th class="th-sm">Roll No</th>
            <th class="th-sm">First Name</th>
            <th class="th-sm">Last Name</th>
            <th class="th-sm">Score</th>
          </tr>
        </thead>
        <tbody>

          <?php
            if($_SERVER["REQUEST_METHOD"]=="POST"){
				include '../../dbconfig.php';
				$conn = new mysqli($server_name,$user,$pass,$db);
				
				if (!mysqli_connect_errno($conn))
				{
				 
					$ename = $_POST["ename"];
					
					if(isset($_POST["uws"]))
					{
						$ename = $_POST["ename"];
						
						$sql   = "select eid,dateofevent from eventsold where ename='$ename'";
						$res   = $conn->query($sql);
						$row   = $res->fetch_row();
						$eid   = $row[0]; 
						$edate = $row[1];
						$score = $_POST["score"];
						$roll  = strtolower($_POST["roll"]);
						$table_name=$eid."_".str_replace("-","",$edate);	
						
						$sql= "update $table_name set score = $score where roll = '$roll'";
						if(mysqli_query($conn,$sql))
						{
							echo"<script>
								setTimeout(function () {
								$('#alerts').modal('hide');
								}, 1500);
								
								$('.alerts-title').html('Alert.');	
								$('.alerts-body').html('<b> Scores updated successfully.');
								$('#alerts').modal('show');
								</script>
								";
						}
						
						$sql= "SELECT score FROM $table_name where roll='$roll'";
						$res=mysqli_query($conn,$sql);
						$count=1;
						while($row=$res->fetch_row())
						{
							$sql = "select fname,lname from students where rollno = '$roll'";
							$temp = $conn->query($sql);
							$rowtemp=$temp->fetch_row();
						
							echo "<tr>";
							echo "<td>" . $count . "</td>";
							echo "<td>" . strtoupper($roll) . "</td>";
							echo "<td>" . ucfirst($rowtemp[0]) . "</td>";
							echo "<td>" . ucfirst($rowtemp[1]) . "</td>";
							echo "<td>" . $row[0] . "</td>";
							echo "</tr>";
							
							$count+=1;
						}
					}
					
					if(isset($_POST["ups"]))
					{
						$ename = $_POST["ename"];
						
						$sql   = "select eid,dateofevent from eventsold where ename='$ename'";
						$res   = $conn->query($sql);
						$row   = $res->fetch_row();
						$eid   = $row[0]; 
						$edate = $row[1];
						$score = $_POST["defscore"];
						$roll  = strtolower($_POST["roll"]);
						$table_name=$eid."_".str_replace("-","",$edate);	
						
						$sql= "update $table_name set score = $score where score=0";
						
						if(mysqli_query($conn,$sql))
						{
							echo"<script>
							
								setTimeout(function () {
									$('#alerts').modal('hide');
									}, 1500);
									
								$('.alerts-title').html('Alert.');	
								$('.alerts-body').html('<b> Scores updated successfully.');
								$('#alerts').modal('show');
								</script>
								";
						}
						
						
						$sql= "SELECT roll,score FROM $table_name where score=$score";
						$res=mysqli_query($conn,$sql);
						$count=1;
						while($row=$res->fetch_row())
						{
							$roll=$row[0];
							$sql = "select fname,lname from students where rollno = '$roll'";
							$temp = $conn->query($sql);
							$rowtemp=$temp->fetch_row();
						
							echo "<tr>";
							echo "<td>" . $count . "</td>";
							echo "<td>" . strtoupper($roll) . "</td>";
							echo "<td>" . ucfirst($rowtemp[0]) . "</td>";
							echo "<td>" . ucfirst($rowtemp[1]) . "</td>";
							echo "<td>" . $row[1] . "</td>";
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