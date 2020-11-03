<!doctype html>
<html lang="en">
  <head>
    <title>CETA</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>

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
  <body>
      
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      
		
	<script>
		
		function validatego()
		{
			
			var eid = document.getElementById("t1");
			var option = document.getElementById("t2");
		
			if(option.value=="No")
				{		if(eid.value!="" && option.value!="choose")
							return true;
						return false;
				
				}
				
			if(option.value=="Yes")
			{
				if(eid.value!="" && option.value!="choose")
					return true;
				return false;
			}
			
		}
		
		
		function validateadd()
		{
			var ename = document.getElementById("t3");
			var dateofevent = document.getElementById("t4");
			var select      = document.getElementById("t5");
			
			if(ename.value!="" && dateofevent.value!="" && select.value!="choose")
				return true;
			return false;
		}
		
		
		function validatedelete()
		{
			var eid = document.getElementById("t6");
			
			if(eid.value!="")
				return true;
			return false;
		}
		
		function validatechangedate()
		{
			var ename = document.getElementById("t3");
			var dateofevent = document.getElementById("t4");
		
			if(ename.value!="" && dateofevent.value!="" )
				return true;
			return false;
		}

	</script>
    
    <script>
      $(document).ready(function(){
        $('#options-profile').change(function(){
          var title = $(this).val();
          if (title!="Choose...")
          {
            $('.modal-title').html(title);
                
			$('#t1').val("");
			$('#t2').val("choose");	
			$('#t3').val("");
			$('#t4').val("");
			$('#t5').val("choose");
			$('#t6').val("");
			$('.available').hide();
			$('.addevent').hide();
			$('.changedate').hide();
			$('.add').hide();
			$('.deleteevent').hide();
			$('.delete').hide();
			$('.completed').hide();
			
            $('.modal').modal('show');
            
			if(title=="Open | Close Registrations")
				$('.available').show();
            
			if(title=="Add an event")
			{
				$('.addevent').show();
				$('.add').show();
			}
			
			if(title=="Change event date")
			{
				$('.addevent').show();
				$('.changedate').show();
			}

			
			if(title=="Delete an event")
			{
				$('.deleteevent').show();
				$('.delete').show();
			}

			
			if(title=="Mark event completion")
			{
				$('.deleteevent').show();
				$('.completed').show();
			}
          }

        });
      });
    </script>


    <div class="container-fluid">
        <div class="row">
            <div class="col" style="height:100vh;background-color:rgba(0,0,0,0.3);">
                <div class="input-group" style="margin-top:10vh;">
                    
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Choose an update</span>
                  </div>

                    <select class="custom-select hovering" id="options-profile" aria-label="options">
                        <option  name='none' selected>Choose...</option>
						<option name="op_openclosereg">Open | Close Registrations</option>
						<option name="op_addevent">Add an event</option>
						<option name="op_changeeventdate">Change event date</option>
						<option name="op_deleteevent">Delete an event</option>
						<option name="op_completeevent">Mark event completion</option>
						
                    </select>
                  
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" id ="modal" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" >Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            
                          </div>
	  					
	  					  <div class="modal-body available">
							<form name="available" method="post" action="tablespart.php" target="tablespart" autocomplete="off">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Event ID</span>
									</div>
	  								<input type="number" class="form-control hovering" id="t1" name="eid" placeholder="Enter Event-ID">	
								</div>
	  							<hr>
								<div class="input-group">
	  								<div class="input-group-prepend">
										<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Open/Close</span>
									</div>
									<select id="t2" class="custom-select hovering" name="openclose">
										<option value="choose" selected>Choose...</option>
										<option value="Yes" > Open </option>
										<option value="No"> Close </option>
									</select>
	  							</div>
								<hr>
								<div class="input-group">
									<input type="submit" name="go" class="form-control btn-hovering" value="GO" onclick="return validatego()">
								</div>
							</form>
						  </div>

						  <div class="modal-body addevent">
							<form name="addevent" method="post" action="tablespart.php" target="tablespart" autocomplete="off">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Event Name</span>
									</div>

									<input type="text" class="form-control hovering" id="t3" name="ename"  placeholder="Enter eventname">
								
								</div>
	  							<hr>

								<div class="input-group-prepend">
									<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Date of Event</span>
								</div>
								
								<input type="date" class="form-control hovering" id="t4" name="edate">
								<hr>

								<div class="changedate">
									<div class="input-group">
	  									<input type="submit" name="changedate" class="form-control btn-hovering" value="CHANGEDATE" onclick="return validatechangedate()">
									</div>
								</div>

								<div class="add">
									<div class="input-group">
										
										<div class="input-group-prepend">
											<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Year</span>
										</div>
										<select id="t5" class="custom-select hovering" name="year">
											<option value="choose" selected>Choose...</option>
											<option value="2nd Year" > 2nd Year </option>
											<option value="3rd Year"> 3rd Year </option>
											<option value="4th Year"> 4th Year </option>
											<option value="All"> All </option>

										</select>
									</div>
	  								<hr>
									<div class="input-group">
	  									<input type="submit" name="add"  value="ADD" class="form-control btn-hovering" onclick="return validateadd()">
									</div>
								</div>
	  								
								<hr>
							</form>
						  </div>


	  
						  <div class="modal-body deleteevent">
							<form name="deleteevent" method="post" action="tablespart.php" target="tablespart" autocomplete="off">
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Event ID</span>
									</div>
	  								<input type="text" class="form-control hovering" id="t6" name="deleid" placeholder="Enter Event-ID">	
								</div>
	  							<hr>
								
								<div class="delete">
									<input type="submit" name="delete" class="form-control btn-hovering" value="DELETE" onclick="return validatedelete()">
								</div>
								
	  							<div class="completed">
								  <input type="submit" name="completed" class="form-control btn-hovering" value="COMPLETED" onclick="return validatedelete()">
								</div>

							</form>
						  </div>

                        </div>
                      </div>
                    </div>

                  
                </div>
            </div>
        </div>
    </div>
  
  </body>
</html>