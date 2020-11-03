<!doctype html>
<html lang="en">
  <head>
    <title>CETA</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>

      .hovering {
        color:white !important ;
        background-color:rgba(0,0,0,0.9) !important; 
      }

    </style>
  
  </head>
  <body>
      
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      
    
    <script>
      
      function validatedetails(name,value)
      {
        if(name=='First Name' || name=='Last Name')
        {
          var pattern = new RegExp("^(?=.*[A-Za-z])[A-Za-z ]{5,}");
      
          if(pattern.test(value))
            {return true;}
          
          return false;
        }
        
        else if(name=='Email')
        {
          var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
          
          if(pattern.test(value))
          {
            return true;
          }
          
          return false;
        }
        
        else if(name=='Password')
        {
          var pattern = new RegExp("^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[@])[A-Za-z0-9@]{8,}");
          
          if(pattern.test(value))
            {return true;}
          return false;			
        }
        
        else if(name=='Mobile')
        {
          var pattern = new RegExp("^[0-9]{10}$");
      
          if(pattern.test(value))
            {return true;}
          
          return false;
          
        }

        
        else if(name=="Profile Picture")
            {
              var imagename = $('#image').val();
              if(imagename != '')
                {
                  var file_extension = imagename.split('.').pop().toLowerCase();

                  if(file_extension=='jpg'){
                    return true;
                  }
                    
                }
                
              return false;
            }
        
      }
      
      function validateupdate()
      {
        var sel = document.getElementsByTagName('select');
        sel = sel[0];
        
        if(sel.value!="Choose...")
          {
            var val = document.getElementsByTagName('input');
            val = val[0].value;
            
            if(sel.value=="Profile Picture"){
              var val = document.getElementsByTagName('input');
              val = val[1].value;
            }

            if(val!="")
            {
              if(validatedetails(sel.value,val))
              {
                var temp = $("#options-profile").val();
                $('#select-field').val(temp);
                return true;
              }
              
              else
              {
                $(document).ready(function(){
                  var title = $('#options-profile').val();
                  $('#alert-menu').attr({"data-content":"Invalid "+title+" Entered.Try Again."});
                  $('#alert-menu').popover({trigger: 'click'});
                  setTimeout(function(){
                    $('#alert-menu').popover("hide");
                    },2000);
   
                });
                return false;
              }
            }  
          }
          
        return false;
      }

    </script>
    
    <script>
      $(document).ready(function(){
        $('#options-profile').change(function(){
          var title = $(this).val();
          if (title!="Choose..." && title!="Profile Picture")
          {
            $('.modal-title').html(title);
            $('#input-field').val("");
                
            $('#input-field').attr('placeholder','Enter '+title+'.');
            $('.modal').modal('show');
            $('.picture').hide();
            $('.normal').show();
            
          }

          if (title=="Profile Picture")
          {
            $('.modal-title').html(title);
            $('#input-field').val("");
                
            $('#input-field').attr('placeholder','Enter '+title+'.');
            $('.modal').modal('show');
            $('.normal').hide();
            $('.picture').show();
            
          }

        });
      });
    </script>


    <div class="container-fluid">
        <div class="row">
            <div class="col" style="height:100vh;background-color:rgba(0,0,0,0.3);">
                <div class="input-group" style="margin-top:10vh;">
                    
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="color:black;background-color:rgba(0,0,0,0.3); ">Edit Profile</span>
                  </div>

                    <select class="custom-select hovering" id="options-profile" aria-label="options">
                        <option  name='none' selected> Choose...</option>
                        <option name='fname'> First Name </option>
                        <option name='lname'> Last Name </option>
                        <option name='email'> Email </option>
                        <option name='password'> Password </option>
                        <option name='mobile'> Mobile </option>
                        <option name='profilepic'>Profile Picture</option>
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

                          <form name="updateevent" method="post" action="tablespart.php" target="tablespart" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group">
                              <div class="modal-body normal">
                                <input type="text" class="form-control" id="input-field" name="fieldval"/>
                              </div>
      
                              <div class="modal-body picture">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="image" id="image">
                                  <label class="custom-file-label" for="image" >Choose Profile Picture (Size < 64 KB).</label>
                                </div>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="hidden" id="select-field" name="field" value=""/>
                                <input type="submit" class="btn btn-primary" id="alert-menu" name="update" value="Update" onclick="return validateupdate()" data-toggle="popover" data-placement="top" data-trigger="click" title="Alert" data-content="">
                              </div>

                            </div>
                          </form>

                        </div>
                      </div>
                    </div>

                  
                </div>
            </div>
        </div>
    </div>
  
  </body>
</html>