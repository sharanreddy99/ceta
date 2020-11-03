<!doctype html>
<html lang="en">
  <head>
    <title>CETA</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Chivo&display=swap" rel="stylesheet">
    
    <style>

        .clickcolor {
            background-color: rgba(0,0,0,0.9) !important;
            border-style: none !important;
            
        }


        @media screen and (max-width: 991px) {
            .footer-text {
                font-size:1.5vh;
            }

            .logo{
                margin-left:5%;
            }
            
        
        }

        @media screen and (min-width: 992px) {
            .footer-text {
                font-size:2.5vh;
            }
            
            .logo{
                margin-left:5%;
            }
        }

        @media only screen and (min-width : 1200px) {
            .footer-text {
                font-size:3vh;
            }
            
            .logo {margin-left:1%;}
        
        }
        
        .icon-bar {
            width: 22px; 
            height: 2px;
            background-color: #B6B6B6;
            display: block;
            transition: all 0.2s;
            margin-top: 4px
        }
        
        .navbar-toggler {
        border: none;
        background: transparent !important;
        }
           
        
        .navbar-toggler .top-bar {
        transform: rotate(45deg);
        transform-origin: 10% 10%;
        }

        .navbar-toggler .middle-bar {
        opacity: 0;
        }

        .navbar-toggler .bottom-bar {
        transform: rotate(-45deg);
        transform-origin: 10% 90%;
        }

        .navbar-toggler.collapsed .top-bar {
        transform: rotate(0);
        }

        .navbar-toggler.collapsed .middle-bar {
        opacity: 1;
        }

        .navbar-toggler.collapsed .bottom-bar {
        transform: rotate(0);
        }
        
        .footer-text {
            color:white;
            text-align:center;
        }
        
        
        a.menu {
            background-color: black;  
            border-radius:0 !important; 
            }
            a.menu:hover{
            background-color:rgba(0,0,0,0.8);
            }

        .logo-h {
            font-family:Chivo;background-color:black;color:white;
        }

        a.logo-h:hover {
            text-decoration:none !important;
        }
        
    </style>

  </head>
  <body>
      
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script>
	$(document).ready(function(){
		$("a").click(function(){
			
		$("a").removeClass("clickcolor");
		$(this).addClass("clickcolor");

        $('.collapse').collapse('hide')
		
		});
		
	});
	</script>


    <div class="container-fluid">
        <div class="row" style = "height:8vh;">
            <div class="col m-0 p-0 d-block d-xl-none logo-h">
                <a href="facultypage/Sidebar/profile.php" class="logo-h" target="mainpage"> <h1 class="logo logo-h d-inline"> CETA </h1> </a>
                
                <button class="navbar-toggler collapsed" style="float:right;margin-top:3%;" type="button" data-toggle="collapse" data-target="#sidebarmenu" aria-controls="sidebarmenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>				
                </button>        
            </div>

            <div class="col m-0 p-0 d-none d-xl-block logo-h" >
                <button class="navbar-toggler collapsed " style="margin-top:1%;color:white;" type="button" data-toggle="collapse" data-target="#sidebarmenu" aria-controls="sidebarmenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>				
                </button>        

                <a href="facultypage/Sidebar/profile.php" target="mainpage" class="logo-h"> <h1 class="logo logo-h d-inline" style="font-size:6vh;"> CETA </h1> </a>
                
            </div>            

        </div>
        
        <div class="row">
            <div class="col p-0 m-0">
                <div class="collapse navbar-collapse p-0 m-0" id="sidebarmenu">
                    
                        <?php require("facultypage/sidebar.php")?>
                </div>    
            </div>
        </div>

        
        <div class="row" style="height:100vh;">
            <div class="col p-0 m-0">
                <iframe src="facultypage/mainpage.php" name="mainpage" style="border-style:none;width:100%;height:100%;" ></iframe>
                
                </div>
        </div>

        <div class="row " >
            <div class="col" style="background-color:black;">
            <p class="footer-text"> Copyrights &copy 2019-2020 VCE. All rights reserved. </p>
            </div>
        </div>
        
    </div>
    </body>
</html>
