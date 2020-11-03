<?php 
	
	session_start();
	$_SESSION = array();
	session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
	
	<link rel="stylesheet" href="bst/css/bootstrap.css">
	
	<style>
.login-box p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}		
.login-box input{
    width: 100%;
    margin-bottom: 20px;
}
.login-box input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}
.login-box input[type="submit"],.login-box input[type="button"]
{
    border: none;
    outline: none;
    height: 40px;
    background: #1c8adb;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}
.login-box input[type="submit"]:hover,.login-box input[type="button"]:hover
{
    cursor: pointer;
    background: #003366;
    color: #000;
}	

.login-box{
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    box-sizing: border-box;
    padding: 40px 30px;
}
h3{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 19px;
}
.id{
   font-size:15px;
   margin-top:0px;
   margin-bottom:20px;
   text-align:center;
}		
body{
   	margin: 0;
   	padding: 0;
	font-family:Comic Sans MS;
	background-size:cover;
	background-image:url("https://cdn.pixabay.com/photo/2016/03/26/13/09/cup-of-coffee-1280537__340.jpg");
	background-position:center;
}

</style>

<script>
function validatestudent()
{
	var tags   = document.getElementsByTagName("input");
	var s_roll = tags['t1'].value;
	var s_pass = tags['t2'].value;
	var f_email = tags['t3'].value;
	var f_pass = tags['t4'].value;
	
	var count=0;
	
	if(s_roll!="")
		{tags['t1'].required=false;
		count+=1;}
	else
		{tags['t1'].required=true;}
	
	if(s_pass!="")
		{tags['t2'].required=false;
		count+=1;}
	else
		{tags['t2'].required=true;
		}
	
	if(count==2)
		return true;
	else
		return false;
}

function validatefaculty()
{
	var tags   = document.getElementsByTagName("input");
	var s_roll = tags['t1'].value;
	var s_pass = tags['t2'].value;
	var f_email = tags['t3'].value;
	var f_pass = tags['t4'].value;
	
	var count=0;
	
	if(f_email!="")
		{tags['t3'].required=false;
		count+=1;}
	else
		{tags['t3'].required=true;}
	
	if(f_pass!="")
		{tags['t4'].required=false;
		count+=1;}
	else
		{tags['t4'].required=true;
		}
		
	if(count==2)
		return true;
		
	else
		return false;
}
</script>

</head>

<body >
	<br><br>
	<div class="container">
		<div class="row">
			<div class="col login-box  m-5" style="height:72vh;">
							
				<center class=" container-fluid  text-white"> <h3>Student Login</h3> </center>
				
				<form method="post"  action="loginstudent.php">
					<p>Roll No:</p>
					<input type="text"      name="t1"  autocomplete="off" placeholder="Enter Roll Number"/>
					<p>Password:</p>
					<input type="password"  name="t2"                     placeholder="Enter Password"/>
					
					<div class="buttons">
					<input name="studentlogin" onclick="return validatestudent()" type="submit" value="Login"/>
					<p class="id">(Or)</p><br>
					<input type="button" onclick="window.location.href='registrationstudent.php'" name="Register" value="Register"/>
					</div>
					</form>
				</div>
		
			<div class="col login-box m-5  " style="height:72vh;">
					<center class=" container-fluid text-white"><h3> Admin Login </h3> </center>
					
					<form method="post" action="loginfaculty.php">
					<p>E-Mail:</p>
					<input type="text"      name="t3"  autocomplete="off" placeholder="Enter Email Id"/>
					<p>Password:</p>
					<input type="password"  name="t4"                               placeholder="Enter Password"/>
					
					<div  class="buttons">		
					<input  name="facultylogin" onclick="return validatefaculty()" type="submit" value="Login"/>
					<p class="id">(Or)</p><br>
					<input  type="button" onclick="window.location.href='registrationfaculty.php'" name="Register" value="Register"/>
					</div>
					</form>
			</div>
		
		</div>
	</div>
</body>
</html>