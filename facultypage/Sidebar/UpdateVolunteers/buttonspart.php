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
  	<body style="background-color:rgba(0,0,0,0.2);">
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<script>		
			function validate()
			{
				var roll = document.getElementById("t1").value;
				if(roll!="")
					return true;
				return false;
			}
		</script>	

		<div class="container m-3">
			<form name="updatevolunteer" method="post" action="tablespart.php" target="tablespart"  autocomplete="off">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Enter Roll Number</span>
					</div>
					<input type="text" id="t1" class="form-control hovering" name="roll"  placeholder="Enter Roll Number">
				</div>
				<hr>
				<div class="container">
					<div class="row">
						<div class="col">
							<input type="submit" class="btn btn-hovering" name="add" value="Add Volunteer" onclick="return validate()">
						</div>
						<div class="col">
							<input type="submit" class="btn btn-hovering" name="delete" value="Delete Volunteer" onclick="return validate()">
						</div>
					</div>
				</div>

			</form>

		</div>
	</body>
</html>