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
      .hovering {
          color:white !important ;
          background-color:rgba(0,0,0,0.9) !important; 
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
        $('#updateevents').DataTable( {
                "createdRow": function( row, data, dataIndex){
                        $(row).addClass('blackisgold');
                    }
            });
          $("[name='updateevents_length']").css({"background-color":"rgba(0,0,0,0.8)","color":"white"});
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


	<div class="container m-5">
		<table id="updateevents" class="table table-dark hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th class="th-sm"> Event ID</th>
					<th class="th-sm"> Event Name</th>
					<th class="th-sm"> Date Of Event</th>
					<th class="th-sm"> Availability</th>
					<th class="th-sm"> Year</th>
				</tr>
			</thead>
			<tbody>
				
				<?php 

					include '../../../detailsofdemo.php';
					$conn = new mysqli($server_name,$user,$pass,$db);


					if(!$conn->connect_error)
					{
						$sql1 = "select e1.* from eventsnew e1;";
						$res1=$conn->query($sql1);
						
						if($res1->num_rows>0)
						{
							$n = mysqli_num_fields($res1);
							while($row1 = $res1->fetch_row())
							{
								$sql2 = "select e2.year from yreventsnew e2 where e2.eid=$row1[0]";
								$res2=$conn->query($sql2);
								$count=$res2->num_rows;
								echo "<tr>";
								for($i=0;$i<$n;$i++)
								{
									
									echo "<td> ".$row1[$i]."</td>";
								}
								
								echo "<td>";
								$temp=0;
								while($row2=$res2->fetch_row())
								{
									if($temp>0)
										echo ",";
									echo $row2[0];
									$temp+=1;
								}
								echo "</td>";
								echo "</tr>";
							}
						}
							
					}


					if($_SERVER["REQUEST_METHOD"]=="POST")
					{
						if(isset($_POST["changedate"]))
						{
							$ename = $_POST["ename"];
							$edate = $_POST["edate"];
							$eid="";

							$sql = "select eid,dateofevent from eventsnew where ename='$ename'";
							$res=$conn->query($sql);
							if($res->num_rows==1)
							{
								$row=$res->fetch_row();
								$eid=$row[0];
								$oldedate=$row[1];
								$old_table_name=$eid."_".str_replace("-","",$oldedate);
								$table_name = $eid."_".str_replace("-","",$edate);
								
								$sql="alter table $old_table_name rename to $table_name";
								$conn->query($sql);
							
								$sql = "update eventsnew set dateofevent='$edate' where ename='$ename'";
								if($conn->query($sql))
								{
									echo("<script> setTimeout(function () {
										location.replace('tablespart.php');
										}, 2000);
										$('#eventsmodal').modal('show');
										$('.modal-body').html('<b>Changed Date Successfully .');
									
									</script>");
								}
							}
							
							else
							{
								echo("<script>
									$('#eventsmodal').modal('show');
									$('.modal-body').html('<b>Changing Date Failed.');
								
								</script>");
							}
						}

							
						
						if(isset($_POST["go"]))
						{
							$eid = $_POST["eid"];
							$val = $_POST["openclose"];
							
							if(!$conn->connect_error)
							{
								$sql = "select * from eventsnew where eid=$eid";
								
								$res = $conn->query($sql);
								
								if($res->num_rows==1)
								{
										
									if($val=="Yes")
									{
										$sql = "select dateofevent from eventsnew where eid=$eid";
										$res = $conn->query($sql);
										$row = $res->fetch_row();
										$edate = $row[0];
										
										$edate = str_replace("-","",$edate);
										
										$sql = "CREATE TABLE `".$eid."_".$edate."`(
												`roll` varchar(11) NOT NULL,
												`year` varchar(9) NOT NULL,
												`branch` varchar(7) NOT NULL,
												`score` int(11) NOT NULL DEFAULT 0,
												`attended` INT(10) NOT NULL DEFAULT 0,
												PRIMARY KEY (`roll`)
												) ";
												
										$conn->query($sql);
											
									}
									
									$sql = "update eventsnew set availability='$val' where eid=$eid";
									if($conn->query($sql))
									{
										if($val=="Yes")
											echo("<script> setTimeout(function () {
												location.replace('tablespart.php');
												}, 2000);
												$('#eventsmodal').modal('show');
												$('.modal-body').html('<b>The Event has been opened for registrations.');
											
											</script>");

										else
											echo("<script> setTimeout(function () {
												location.replace('tablespart.php');
												}, 2000);
												$('#eventsmodal').modal('show');
												$('.modal-body').html('<b>Registrations for the event have been closed.');
											
											</script>");

									}
									
									else
									{
										echo("<script> 

											$('#eventsmodal').modal('show');
											$('.modal-body').html('<b>Changing the event failed.');
										
										</script>");
									}

								}
								
								else
								{
									echo("<script> 
										$('#eventsmodal').modal('show');
										$('.modal-body').html('<b>Event not found .');
									
									</script>");
								}
							}
						
						}
						
						if(isset($_POST["add"]))
						{
							$ename = $_POST["ename"];
							$edate = $_POST["edate"];
							$year  = $_POST["year"];
							
							if(!$conn->connect_error)
							{
								$sql = "select * from eventsnew where ename='$ename' and dateofevent='$edate'";
								$reswhole = $conn->query($sql);
								$eid=1;
								if($reswhole->num_rows==0)
								{
									$sql = "select max(eid) from eventsnew;";
										$res = $conn->query($sql);
										$eid1 = 1;
										if($res->num_rows>0)
										{
											$res = $res->fetch_row();
											$eid1=$res[0]+1;
										}
										
									
									$sql = "select max(eid) from eventsold;";
										$res = $conn->query($sql);
										$eid2 = 1;
										if($res->num_rows>0)
										{
											$res = $res->fetch_row();
											$eid2=$res[0]+1;
										}
										
									if($eid1>$eid2)
										$eid=$eid1;
									
									else if($eid2>$eid1)
										$eid=$eid2;
									
									$sql = "insert into eventsnew values($eid,'$ename','$edate','No')";
									$conn->query($sql);
									
									if($year!="All")
									{
										$sql = "insert into yreventsnew values($eid,'$year')";
										if($conn->query($sql))
										{		
											echo("<script> setTimeout(function () {
												location.replace('tablespart.php');
												}, 2000);
												$('#eventsmodal').modal('show');
												$('.modal-body').html('<b>A new event has been created for ".$year." successfully .');
											
											</script>");
										}
										
										else
										{
											echo("<script> 
												$('#eventsmodal').modal('show');
												$('.modal-body').html('<b>Event generation failed .');
											
											</script>");
										}

									}
									
									else
									{
										$sql = "insert into yreventsnew values($eid,'2nd Year'),($eid,'3rd Year'),($eid,'4th Year')";
										if($conn->query($sql))
										{
											echo("<script> setTimeout(function () {
												location.replace('tablespart.php');
												}, 2000);
												$('#eventsmodal').modal('show');
												$('.modal-body').html('<b>A new event has been created successfully for all years .');
											
											</script>");
										}
										
										else
										{
														
											echo("<script> 
												$('#eventsmodal').modal('show');
												$('.modal-body').html('<b>Event generation failed .');
											
											</script>");
										}
									}
									
								}

								

								if($reswhole->num_rows==1)
								{
									
									$sql = "select e1.eid from eventsnew e1,yreventsnew e2 where e1.ename='$ename' and e1.dateofevent='$edate'";
									$res = $conn->query($sql);
									$row = $res->fetch_row();
									$eid = $row[0];
									
									$sql = "select e2.* from eventsnew e1,yreventsnew e2 where e1.ename='$ename' and e1.eid=e2.eid and e1.dateofevent='$edate'";
									$res = $conn->query($sql);
									
									$count=0;
									while($row=$res->fetch_row())
									{
										$eid=$row[0];
										if($row[1]==$year)
											$count+=1;
									}
									
									if($count==0 && $year!="All")
									{
										
										$sql = "insert into yreventsnew values($eid,'$year')";
									
										if($conn->query($sql))
											{
												echo("<script> setTimeout(function () {
													location.replace('tablespart.php');
													}, 2000);
													$('#eventsmodal').modal('show');
													$('.modal-body').html('<b>A new event has been created for ".$year." successfully .');
												
												</script>");
											}

										else
										{	
											echo("<script>
												$('#eventsmodal').modal('show');
												$('.modal-body').html('<b>Event generation failed .');
											
											</script>");
										}
									}	
								
									if($count==0 && $year=="All")
										{
											$sql = "select e1.eid from eventsnew e1,yreventsnew e2 where e1.ename='$ename' and e1.dateofevent='$edate'";
											$res = $conn->query($sql);
											$row = $res->fetch_row();
											$eid = $row[0];
											
											$sql = "select e2.* from eventsnew e1,yreventsnew e2 where e1.ename='$ename' and e1.eid=e2.eid and e1.dateofevent='$edate'";
											$res = $conn->query($sql);
											$two="2nd Year";
											$three="3rd Year";
											$four="4th Year";
											
											while($row=$res->fetch_row())
											{
												$eid=$row[0];
												if($row[1]==$two)
												{$two="";}
												
												
												if($row[1]==$three)
												{
												$three="";}
												
												
												if($row[1]==$four)
												{$four="";}
											}
											
											if($two!="")
											{$sql = "insert into yreventsnew values($eid,'$two')";
											$conn->query($sql);}
											
											if($three!="")
											{$sql = "insert into yreventsnew values($eid,'$three')";
											$conn->query($sql);}					
											
											if($four!="")
											{$sql = "insert into yreventsnew values($eid,'$four')";
											$conn->query($sql);}
									
										if($two!="" || $three!="" || $four!="")
															
											echo("<script> setTimeout(function () {
												location.replace('tablespart.php');
												}, 2000);
												$('#eventsmodal').modal('show');
												$('.modal-body').html('<b>A new event has been created for all years successfully .');
											
											</script>");
										}
						
								}
							}
						}
						
						if(isset($_POST["delete"])||isset($_POST["completed"]))
						{
						
							$val1 = "";
							$val2 = "";
							$val3 = "";
							$eid  = $_POST["deleid"];
							$res  =  mysqli_query($conn,"SELECT eid,ename,dateofevent FROM eventsnew WHERE eid=$eid");	
							while($row=mysqli_fetch_row($res))
							{
								$val1=$row[0];
								$val2=$row[1];
								$val3=$row[2];
							}
							$table_name=$eid."_".str_replace("-","",$val3);
							
							if(isset($_POST['delete'])) 
							{
								if(mysqli_query($conn,"DELETE FROM eventsnew WHERE eid = $val1"))
									
									echo("<script> setTimeout(function () {
										location.replace('tablespart.php');
										}, 2000);
										$('#eventsmodal').modal('show');
										$('.modal-body').html('<b>Event has been deleted successfully .');
									
									</script>");
							}
						
							if(isset($_POST["completed"]))
							{
								mysqli_query($conn,"insert into eventsold values(".$val1.",'".$val2."','".$val3."')");
								$res=mysqli_query($conn,"select year from yreventsnew where eid=$val1");
								
								while($row=$res->fetch_row())
								{
									mysqli_query($conn,"insert into yreventsold values(".$val1.",'".$row[0]."')");
								}
								
								$sql = "delete from $table_name where attended=0";
								$conn->query($sql);
								
								if(mysqli_query($conn,"DELETE FROM eventsnew WHERE eid = $val1"))
										
									echo("<script> setTimeout(function () {
										location.replace('tablespart.php');
										}, 2000);
										$('#eventsmodal').modal('show');
										$('.modal-body').html('<b>Added to old events successfully .');
									
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
