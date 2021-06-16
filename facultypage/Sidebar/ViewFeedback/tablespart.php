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
		background-color:rgba(0,0,0,0.3) !important;}
    
    </style>
  </head>
  
  <body style="background-color:rgba(0,0,0,0.2);">
	
  	<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../../DataTables/datatables.js"></script>
    
    <script>
      $(document).ready(function() {
        $('#feedback').DataTable( {
                "createdRow": function( row, data, dataIndex){
                        $(row).addClass('blackisgold');
                    }
            });
          $("[name='feedback_length']").css({"background-color":"rgba(0,0,0,0.8)","color":"white"});
          $("input[type='search']").css({"background-color":"rgba(0,0,0,0.8)","color":"white"});
      });

    </script>

	<!-- Modal -->
	<div class="modal fade" id="feedbackmodal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Alert.</h5>
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
      <br>
      <table id="feedback" class="table table-dark hover" cellspacing="0" width="100%">
        <thead>
          <tr> 
			<th class="th-sm">First Name</th>
			<th class="th-sm">Last Name</th>
			<th class="th-sm">Roll Number</th>
			<th class="th-sm">Feedback</th>
          </tr>
        </thead>
        <tbody>				
			<?php 
				require('../../../dbconfig.php');
				$conn = new mysqli($server_name,$user,$pass,$db);

				if(!$conn->connect_error)
				{
					$sql1 = "select * from feedback;";
					$res1=$conn->query($sql1);
					
					if($res1->num_rows>0)
					{
						$n = mysqli_num_fields($res1);
						while($row1 = $res1->fetch_row())
						{
							echo "<tr>";
							for($i=0;$i<$n;$i++)
							{		
								echo "<td> ".$row1[$i]."</td>";
							}
							echo "</tr>";
							
						}
					}
				}


				if($_SERVER["REQUEST_METHOD"]=="POST")
				{
					if(isset($_POST["delete"]))
					{
						$sql = "delete from feedback";
						if($conn->query($sql))
						{

							
							echo("<script> setTimeout(function () {
								location.replace('tablespart.php');
								$('#feedbackmodal').modal('hide');
								}, 1500);
								$('#feedbackmodal').modal('show');
								$('.modal-body').html('<b>Feedback Deleted Successfully.');
							
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