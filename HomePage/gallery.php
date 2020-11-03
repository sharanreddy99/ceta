<!DOCTYPE html>
<html>
<title>Gallery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
<style>
h1,body{
	font-family: Comic Sans Ms;
  }
body, html {
  		height: 100%;
  		line-height: 1.8;
	   }
.w3-bar .w3-button {
  		padding: 16px;
	}
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

.header {
  text-align: center;
  padding: 42px;
  color: #08325D;
}
	.content1{
	color:#FCF8F8;
	bottom:0;
	display: flex;
	justify-content: left;
	font-family:Comic Sans Ms;
	margin-left: 20px;
	font-size: 13px;
	font-weight: 200;
	letter-spacing: 2px;
}
a.id{
color:white;}
a.id:hover{
color:white;

}
a{

	cursor:pointer;
	background-color:transparent;

}


footer{
background-color:#060606;
}
</style>
<body >
	<!-- Sidebar on small screens when clicking the menu icon -->
	<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  		<a style="text-decoration:none" href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close x</a>
  		<a style="text-decoration:none" style="text-decoration:none" href="sample.html" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">HOME</a>
  		<a style="text-decoration:none" href="up.php" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">UPCOMING EVENTS</a>
  		<a style="text-decoration:none" href="results.php" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">RESULTS</a>
  		
  		<a style="text-decoration:none" href="gallery.php" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">GALLERY</a>
		<a style="text-decoration:none" href="../registrationhome.php" target="_self" class="w3-bar-item w3-button">STUDENT'S LOGIN</a>
  		<a style="text-decoration:none" href="contact.php" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
		<a style="text-decoration:none" href="aboutus.php" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT US</a>
	</nav>

	<!-- Navbar (sit on top) -->
	<div class="w3-top">
  		<div class="w3-bar w3-white w3-card" id="myNavbar">
    			<a style="text-decoration:none" href="sample.html" target="_self" class="w3-bar-item w3-button w3-wide">CetaCseVce</a>
    			<!-- Right-sided navbar links -->
    				<div class="w3-right w3-hide-small">
      					<a style="text-decoration:none" href="sample.html" target="_self" class="w3-bar-item w3-button">HOME</a>
      					<a style="text-decoration:none" href="up.php" target="_self" class="w3-bar-item w3-button"> UPCOMING EVENTS</a>
      					<a style="text-decoration:none" href="results.php" target="_self" class="w3-bar-item w3-button"> RESULTS</a>
      					
      					<a style="text-decoration:none" href="gallery.php" target="_self" class="w3-bar-item w3-button"> GALLERY</a>
					<a style="text-decoration:none" href="../registrationhome.php" target="_self" class="w3-bar-item w3-button"> STUDENT'S LOGIN</a>
      					<a style="text-decoration:none" href="contact.php" target="_self" class="w3-bar-item w3-button"> CONTACT</a>
					<a style="text-decoration:none" href="aboutus.php" target="_self" class="w3-bar-item w3-button"> ABOUT US</a>
					</div>
    			<!-- Hide right-floated links on small screens and replace them with a menu icon -->
		    	<a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      			<i class="fa fa-bars"></i></a>
  		</div>
	</div>


<!-- Header -->
<div  class="header" style="font-family: Comic Sans MS" >
  <h2>Computer Engineers Technical Association</h2>
  <p  size=6>Let's Go Down The Memory Lane and Witness Few Successful Events Been Conducted..!</p>
</div>

<div class="container">
  <div id="myCarousel" class="carousel" data-ride="carousel" data-interval="3000">
   
	<div class='carousel-inner'>
	<?php
			
	$directory = "../Gallery";
    if(is_dir($directory))
    {
        if($dh = opendir($directory))
        {
						
			$count=0;
            while(($file = readdir($dh))!== false)
            {
				$arr = explode(".",$file);
				if($arr[1]=='jpg')
				{
				
					if($count==0)
					{
						echo '<div class="item active">
								<img src="../Gallery/'.$file.'" alt="'.$file.'" style="width:100%;height:100%;"/>
								<div class="carousel-caption">
								</div>
							  </div>
							';
					}
					
					else
					{
						echo '<div class="item">
							<img src="../Gallery/'.$file.'" alt="'.$file.'" style="width:100%;height:100%;"/>
							<div class="carousel-caption">
							</div>
						  </div>';
					}
					$count+=1;
				}
				
            }
			echo '</div>';
				
			closedir($dh);
        }
    }
		
  ?>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<script>
var mySidebar = document.getElementById("mySidebar");
		function w3_open() 
		{
  			if (mySidebar.style.display === 'block') 
    				mySidebar.style.display = 'none';
  		 	else 
    				mySidebar.style.display = 'block';
		}

	// Close the sidebar with the close button
		function w3_close() 
		{
    			mySidebar.style.display = "none";
		}
</script>
	<footer>
	<div class="content1 " style='margin-top:100px;'>
	<div>
	<br>
	Developers:<br><br>
	Ch.Deeksha(17881A0566)<br>
	Sharan(17881A05G6)<br><br>
	<a class=" id" style="text-decoration:underline" href="aboutus.php" target="_self">Learn about them..!</a><br><br>
	</div>
  </div>
  </footer>
</body>
</html>