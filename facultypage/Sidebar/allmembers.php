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
		function validate()
		{
			var ele = document.getElementsByTagName("select");
			var year  = ele[0].value;
			var branch = ele[1].value;
			

			if(year!="select" && branch!="select")
			{
				return true;
			}
			
			setTimeout(function () {
			$('#membersmodal').modal('hide');
			}, 1500);
			$('#membersmodal').modal('show');
			$('.modal-body').html('<b>Choose all the options.');
		
			return false;
			
		}
	</script>

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
    </script>

	<!-- Modal -->
	<div class="modal fade" id="membersmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Alert</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
				</div>
				<div class="modal-body">
					Body
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

    <div class="container m-5">

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); " for="inputGroupSelect01">Select Year.</label>
            </div>
            
            <select id="selectoption1" class="custom-select hovering" name="year">
              	<option value="select" selected>Choose...</option>
				<option value="2nd Year" >2nd Year</option>
				<option value="3rd Year">3rd Year</option>
				<option value="4th Year">4th Year</option>
            </select>
          </div>  

		  <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); " for="inputGroupSelect02">Select Branch.</label>
            </div>
            
            <select id="selectoption2" class="custom-select hovering" name="branch">
              	<option value="select" selected>Choose...</option>
				<option value="CSE-A"> CSE-A</option>
				<option value="CSE-B"> CSE-B</option>
				<option value="CSE-C"> CSE-C</option>
				<option value="CSE-D"> CSE-D</option>
            </select>
          </div>  
		
			<input type="submit" name="go" class="btn btn-hovering" onclick="return validate()" value='Go'>
			<input type="submit" name='promote' class="btn btn-hovering" onclick = "return confirm('Are You Sure To Promote Students To Next Year')" style="width:100px;"value='Promote'>
		
	  
	  </form>

      <br>
      <table id="scorecard" class="table table-dark hover" cellspacing="0" width="100%">
        <thead>
          <tr> 
			<th class="th-sm">Slot No</th>
			<th class="th-sm">Database ID</th>
			<th class="th-sm">First Name</th>
			<th class="th-sm">Last Name</th>
			<th class="th-sm">Roll No</th>
			<th class="th-sm">Email</th>
			<th class="th-sm">Password</th>
			<th class="th-sm">Mobile</th>
			<th class="th-sm">Year</th>
			<th class="th-sm">Branch</th>
          </tr>
        </thead>
        <tbody>
			<?php
				if($_SERVER["REQUEST_METHOD"]=="POST")
				{
					require('../../detailsofdemo.php');
					
					$conn= mysqli_connect($server_name,$user,$pass,$db);
					if (!mysqli_connect_errno($conn))
					{
						
						if(isset($_POST["go"]))
						{

							
							$year=$_POST['year'];
							$branch=$_POST['branch'];
							
							echo "<script> $('#selectoption1').val('".$year."');</script>";
							echo "<script> $('#selectoption2').val('".$branch."');</script>";
							

							$sql= "SELECT sid,fname,lname,rollno,email,password,mobile,year,branch FROM students where year='$year' and branch='$branch';";
							$res=mysqli_query($conn,$sql);

							if(mysqli_num_rows($res)>0)
							{
								$count=1;
								while($row = mysqli_fetch_array($res))
								{
									
									echo "<tr>";
									echo "<td>" . $count . "</td>";
									echo "<td>" . $row['sid'] . "</td>";
									echo "<td>" . ucfirst($row['fname']) . "</td>";
									echo "<td>" . ucfirst($row['lname']) . "</td>";
									echo "<td>" . strtoupper($row['rollno']) . "</td>";
									echo "<td>" . $row['email'] . "</td>";
									echo "<td>" . $row['password'] . "</td>";
									echo "<td>" . $row['mobile'] . "</td>";
									echo "<td>" . ucwords($row['year']) . "</td>";
									echo "<td>" . strtoupper($row['branch']) . "</td>";
									echo "</tr>";
									$count+=1;
								}
							}

							mysqli_close($conn);
						}
						
						else if(isset($_POST["promote"]))
						{
							$sql = "delete from volunteers where year='4th Year'";
							$conn->query($sql);
							
							$sql = "update volunteers set year='4th Year' where year='3rd Year'";
							$conn->query($sql);
							
							$sql = "update volunteers set year='3rd Year' where year='2nd Year'";
							$conn->query($sql);
							
							$sql = "insert into passedoutstudents select fname,lname,rollno,email,password,mobile,gender,branch,YEAR(NOW()) from students where year='4th Year'";
							$conn->query($sql);
							
							$sql = "delete from students where year='4th Year'";
							$conn->query($sql);
							
							$sql = "update students set year='4th Year' where year='3rd Year'";
							$conn->query($sql);
							
							$sql = "update students set year='3rd Year' where year='2nd Year'";
							$conn->query($sql);
								
							echo("<script> setTimeout(function () {
								$('#membersmodal').modal('hide');
								}, 1500);
								$('#membersmodal').modal('show');
								$('.modal-body').html('Students have been promoted successfully.');
							
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