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
		function validatedelete()
		{
			var Imgid = document.getElementById("t1");
			
			if(Imgid.value!="")
				return true;
			return false;
		}

			
		function validateupload()
		{
			var file = document.getElementById("t2");
			
			if(file.value!="")
				return true;
			return false;
		}
	</script>
	<hr>
	<div class="container">
		<form name="deleteImage" method="post" action="tablespart.php" target="tablespart">
			<div class="row">
				<div class="col-12 col-xl-6">
					<div class="input-group">	
						<div class="input-group-prepend">
							<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Image ID:</span>
						</div>
						<input type="number" class="form-control hovering" name="t1" id="t1" name="Imgid"  placeholder=" Enter Image ID">
					</div>
				</div>
				<div class="col-12 col-xl-6">
					<input type="submit" class="btn  btn-hovering" name="delete" value="Delete" onclick="return validatedelete()">	
				</div>
			</div>
		</form>
	</div>
	<hr>
	<div class="container">
		<form name="uploadImage" method="post" action="tablespart.php" enctype="multipart/form-data" target="tablespart">
			<div class="row">
				<div class="col-12 col-xl-6">			
					<div class="input-group">	
						<div class="input-group-prepend">
							<span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Choose File:</span>
						</div>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="t2" name="ImageFile"/>
							<label class="custom-file-label" for="inputGroupFile01">Choose an image.</label>
						</div>

					</div>
				</div>
				<div class="col-12 col-xl-6">
					<input type="submit" class="btn btn-hovering" name="upload" value="Upload" onclick="return validateupload()">
				</div>
			</div>
		</form>
	</div>
	
  </body>
</html>