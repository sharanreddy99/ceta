<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  
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



</style>
<body>
	<!-- Sidebar on small screens when clicking the menu icon -->
	<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  		<a style="text-decoration:none" href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close x</a>
  		<a style="text-decoration:none" href="sample.html" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">HOME</a>
  		<a style="text-decoration:none" href="up.php" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">UPCOMING EVENTS</a>
  		<a style="text-decoration:none" href="results.php" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">RESULTS</a>
  		
  		<a style="text-decoration:none" href="gallery.php" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">GALLERY</a>
		<a style="text-decoration:none" href="../registrationhome.php" target="_self" class="w3-bar-item w3-button"> STUDENT'S LOGIN</a>
  		<a style="text-decoration:none" href="contact.php" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
		<a vhref="aboutus.php" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT US</a>
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

<center>	
<div class="row ">
	<div class="col p-5">
		  <div class="card" style="border:2px solid black;width:400px;height:100%;">
			<img class="card-img-top" src="sharan.jpg" alt="Card image" style="width:100%">
			<div class="card-body">
			<h4 class="card-title">Sharan Reddy</h4>
			<br>
			<a href="http://www.linkedin.com/in/sharan-reddy-90b3a6193" class="btn btn-primary">See LinkedIn Profile</a>
			</div>
		</div>
  </div>
	
	<div class="col p-5">
		  <div class="card" style="border:2px solid black;width:400px;height:100%;">
			<img class="card-img-top" src="deeksha.jpg" alt="Card image" style="width:100%">
			<div class="card-body">
			<h4 class="card-title">Deeksha Cheruku</h4>
			<br>
			<a href="https://www.linkedin.com/in/deeksha-cheruku-302a42193/" class="btn btn-primary">See LinkedIn Profile</a>
			</div>
		</div>
  </div>
</div>
</center>
</body>
</html>
