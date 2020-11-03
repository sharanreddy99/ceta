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
      .hovering {
          color:white !important ;
          background-color:rgba(0,0,0,0.9) !important; 
      }
    
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
      <center>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); " for="inputGroupSelect01">Events</label>
            </div>
            
            <select class="custom-select hovering" name="ename" id="inputGroupSelect01">
              <option selected>Choose...</option>
              <?php 
                include '../../detailsofdemo.php';
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
      <input type="submit" class="btn hovering" id="alert-menu" onclick="return validate()" data-toggle="popover" data-placement="top" data-trigger="click" title="Alert" data-content="" value='Go'>
      
      </center>	
    </form>

      <br>
      <table id="scorecard" class="table table-dark hover" cellspacing="0" width="100%">
        <thead>
          <tr> 
            <th class="th-sm">Slot No
            </th>
            <th class="th-sm">Roll No
            </th>
            <th class="th-sm">First Name
            </th>
            <th class="th-sm">Last Name
            </th>
            <th class="th-sm">Score
            </th>
          </tr>
        </thead>
        <tbody>
          <?php
            if($_SERVER["REQUEST_METHOD"]=="POST"){
              $server_name = "localhost";
              $user        = "root";
              $pass       = "";
              $db         = "CETA"; 

              $conn= mysqli_connect($server_name,$user,$pass,$db);
              if (mysqli_connect_errno($conn))
              {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
              }
              
              else
              {	
                $ename = $_POST["ename"];
                
                $sql   = "select eid,dateofevent from eventsold where ename='$ename'";
                $res   = $conn->query($sql);
                $row   = $res->fetch_row();
                $eid   = $row[0]; 
                $edate = $row[1];
                $table_name=$eid."_".str_replace("-","",$edate);	
                
                $sql= "SELECT roll,score FROM $table_name order by score desc";
                $res=mysqli_query($conn,$sql);
                $count=1;
                while($row=$res->fetch_row()){
                  $roll = $row[0];
                  
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
                
                
                  echo "</table>";
                  echo "</center>";
                

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