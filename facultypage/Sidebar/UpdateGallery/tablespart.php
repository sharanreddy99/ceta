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
		background-color:rgba(0,0,0,0.3) !important;
	  }
		@media screen and (min-width:1200px){
			.card{
				margin-left:25%;width:40% !important;
			}
		}
    
    </style>

  </head>
  <body style="background-color:rgba(0,0,0,0.2);">
	  
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../../../DataTables/datatables.js"></script>
    
	<script>
      $(document).ready(function() {
        $('#completedevents').DataTable( {
                "createdRow": function( row, data, dataIndex){
                        $(row).addClass('blackisgold');
                    }
            });
          $("[name='completedevents_length']").css({"background-color":"rgba(0,0,0,0.8)","color":"white"});
          $("input[type='search']").css({"background-color":"rgba(0,0,0,0.8)","color":"white"});
      });
	</script>
    
	  
	<!-- Modal -->
	<div class="modal fade" id="gallerymodal" tabindex="-1" role="dialog" aria-labelledby="gallerymodal" aria-hidden="true">
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
	
    <div class="container m-5">
		<table id="completedevents" class="table table-dark hover" cellspacing="0" width="100%">
			<thead>
				<tr>			
                    <th class="th-sm">Image Id </th>
                    <th class="th-sm">Image Name</th>
				</tr>
			</thead>
			<tbody>	      
                <?php 
                    $directory = "../../../Gallery";
                    if(is_dir($directory))
                    {
                        if($dh = opendir($directory))
                        {
                            $count=1;
                            while(($file = readdir($dh))!== false)
                            {
                                $arr = explode(".", $file);
                                
                                if($arr[1]=='jpg')
                                    {
                                        echo "<tr>";
                                        echo "<td>".$count."</td>";
                                        echo '<td><img style="width:70%;height:20%;" src="../../../Gallery/'.$file.'" alt="" ></td>';
                                        echo "</tr>";
                                        $count+=1;
                                    }
                            }
                            closedir($dh);
                        }
                    }
                    
                    if(isset($_POST['delete']))
                    {
                        $Imgid=$_POST["t1"];
                        $directory = "../../../Gallery";
                        
                        if(is_dir($directory))
                            {
                                if($dh = opendir($directory))
                                {
                                    $count=1;
                                    $file="";
                                        
                                    $file = readdir($dh);
                                    $file = readdir($dh);

                                    while(($file = readdir($dh))!== false && $count!=$Imgid)
                                    {   
                                        $arr = explode(".",$file);
                                        if($arr[1]=="jpg")
                                            $count+=1;
                                    }


                                    if($file!==false){
                                        unlink($directory."/".$file);
                                        closedir($dh);

                                        echo("<script> setTimeout(function () {
                                            $('#gallerymodal').modal('hide');
                                            window.location.replace('tablespart.php');
                                        }, 2000);
                                            $('#gallerymodal').modal('show');
                                            $('.modal-body').html('<b>Deleted the image successfully.');
                                        
                                        </script>");
                                    }
                                    else{
                                        
                                        echo("<script> setTimeout(function () {
                                            $('#gallerymodal').modal('hide');
                                            
                                        }, 2000);
                                            $('#gallerymodal').modal('show');
                                            $('.modal-body').html('<b>Image Not Found.');
                                        
                                        </script>");
                                    }
                                }
                            }
                    }
                    
                    if(isset($_POST['upload']))
                    {
                        $target_dir = "../../../Gallery/";
                        $target_file = $target_dir . basename($_FILES["ImageFile"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        
                        // Check if file already exists
                        if (file_exists($target_file))
                            {
                                echo("<script> setTimeout(function () {
                                    $('#gallerymodal').modal('hide');
                                }, 1500);
                                    $('#gallerymodal').modal('show');
                                    $('.modal-body').html('<b>Sorry, file already exists.');
                                
                                </script>");
                                
                                $uploadOk = 0;
                            }
                            
                        // Check file size
                        if ($_FILES["ImageFile"]["size"] > 500000)
                            {
                                echo("<script> setTimeout(function () {
                                    $('#gallerymodal').modal('hide');
                                }, 1500);
                                    $('#gallerymodal').modal('show');
                                    $('.modal-body').html('<b>Sorry, your file is too large.');
                                
                                </script>");
                                
                                $uploadOk = 0;
                            }
                            
                        // Allow certain file formats
                        if($imageFileType != "jpg" && $imageFileType != "jpeg")
                            {
                                
                                echo("<script> setTimeout(function () {
                                    $('#gallerymodal').modal('hide');
                                }, 1500);
                                    $('#gallerymodal').modal('show');
                                    $('.modal-body').html('<b>Sorry, only JPG, JPEG files are allowed.');
                                
                                </script>");
                                $uploadOk = 0;
                            }
                        
                        if($uploadOk == 1)
                            {
                                if (move_uploaded_file($_FILES["ImageFile"]["tmp_name"], $target_file))
                                {
                                        
                                    echo("<script> setTimeout(function () {
                                        $('#gallerymodal').modal('hide');
                                    }, 1500);
                                        $('#gallerymodal').modal('show');
                                        $('.modal-body').html('<b>The file ". basename( $_FILES["ImageFile"]["name"]). " has been uploaded.');
                                    
                                    </script>");
                                }
                            }
                            
                            echo("<script> setTimeout(function () {
                                $('#gallerymodal').modal('hide');
                                <script>window.location.replace('tablespart.php');
                            }, 1500);
                                $('#gallerymodal').modal('show');
                                $('.modal-body').html('<b>Uploaded the image successfully.');
                            
                            </script>");
                    }
                ?>
			</tbody>
			<tfoot>
        	</tfoot>
		</table>
	</div>
	
  </body>
</html>
