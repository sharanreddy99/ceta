<!DOCTYPE html>
<html>
<title>CetaCseVce</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	body {font-family: Comic Sans MS;}
	body, html {
  			height: 100%;
  			line-height: 1.8;
		   }
	.w3-bar .w3-button {
  			padding: 16px;
		}
	
		h1 {
  		font-size:85px;
  		font-weight:200;
  		letter-spacing:2px;
  		font-family:Comic Sans Ms;
  		text-align:center;
  		color: white;
  		text-shadow: 1px 1px 2px black, 0 0 40px blue, 0 0 15px darkblue;
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
a{
	text-decoration:none;
	cursor:pointer;

}
.effect-underline:after {content: '';position: absolute;left: 0;display: inline-block;height: 1em;width: 150px;margin-left:20px;border-bottom: 1px solid;margin-top: 10px;opacity: 0; -webkit-transition: opacity 0.35s, -webkit-transform 0.35s; transition: opacity 0.35s, transform 0.35s; -webkit-transform: scale(0,1); transform: scale(0,1);}
.effect-underline:hover:after {opacity: 1;  -webkit-transform: scale(1);  transform: scale(1)}

footer{
background-color:#060606;
}

</style>

<body>
	
<!-- Sidebar on small screens when clicking the menu icon -->
	<nav class="w3-sidebar w3-bar-block w3-black w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
  		<a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close x</a>
  		<a href="sample.html" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">HOME</a>
  		<a href="up.php" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">UPCOMING EVENTS</a>
  		<a href="results.php" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">RESULTS</a>
  		
  		<a href="gallery.php" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">GALLERY</a>
		<a href="../registrationhome.php" target="_self" class="w3-bar-item w3-button"> STUDENT'S LOGIN</a>
  		<a href="contact.php" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">CONTACT</a>
		<a href="aboutus.php" target="_self" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT US</a>
	</nav>

	<!-- Navbar (sit on top) -->
	<div class="w3-top">
  		<div class="w3-bar w3-white w3-card" id="myNavbar">
    			<a href="sample.html" target="_self" class="w3-bar-item w3-button w3-wide">CetaCseVce</a>
    			<!-- Right-sided navbar links -->
    				<div class="w3-right w3-hide-small">
      					<a href="sample.html" target="_self" class="w3-bar-item w3-button">HOME</a>
      					<a href="up.php" target="_self" class="w3-bar-item w3-button"> UPCOMING EVENTS</a>
      					<a href="results.php" target="_self" class="w3-bar-item w3-button"> RESULTS</a>
      					
      					<a href="gallery.php" target="_self" class="w3-bar-item w3-button"> GALLERY</a>
					<a href="../registrationhome.php" target="_self" class="w3-bar-item w3-button"> STUDENT'S LOGIN</a>     
 					<a href="contact.php" target="_self" class="w3-bar-item w3-button"> CONTACT</a>
    				<a href="aboutus.php" target="_self" class="w3-bar-item w3-button"> ABOUT US</a>
					</div>
    			<!-- Hide right-floated links on small screens and replace them with a menu icon -->
		    	<a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
      			<i class="fa fa-bars"></i></a>
  		</div>
	</div>

	
	<h1> Contact Us. </h1>
	<script>
	// Toggle between showing and hiding the sidebar when clicking the menu icon
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
	
		<object style="width:100%;height:100%;overflow:scroll;" data="volunteers.php">
		</object>
	
	<footer>
	<div class="content1 ">
	<div>
	<br>
	Developers:<br><br>
	Ch.Deeksha(17881A0566)<br>
	Sharan(17881A05G6)<br><br>
	<a style="text-decoration:underline;color:white" href="aboutus.php" target="_self">Learn about them..!</a><br><br>
	</div>
  </div>
  </footer>
</body>