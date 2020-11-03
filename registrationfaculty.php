<!DOCTYPE html>

<html lang="en">

<head>

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
	
<style>
		body{
			background-size:cover;
			background-image:url("https://image.freepik.com/free-photo/hand-with-pen-application-form_1232-2536.jpg");
			font-family:Comic Sans Ms;
		}
		
		.wrap{
			max-width:400px;
			border-radius:20px;
			margin:auto;
			background:rgba(0,0,0,0.8);
			border-sizing:border-box;
			padding:40px;
			color:#fff;
			margin-top:50px;
		}
		h3{
			margin-top:0;
			text-align:center;
		}
		input[type=text],input[type=password]{
			width:100%;
			box-sizing:border-box;
			padding:12px 5px;
			background:rgba(0,0,0,0.10);
			outline:none;
			border:none;
			border-bottom:1px #fff;
			color:#fff;
			border-radius:5px;
			margin:5px;
		}
		input[type=submit],input[type=reset]{
			width:100%;
			box-sizing:border-box;
			padding:10px 0;
			margin-top:30px;
			outline:none;
			border:none;
			background:#60adde;
			opacity:0.7;
			border-radius:20px;
			font-size:20px;
			color:#fff;
		}
		input[type=submit]:hover,input[type=reset]:hover{
			background:#003366;
			opacity:0.7;
		}

	</style>

	
	<script type="text/javascript" src="clientvalidatingfaculty.js">

	</script>


	<?php require "servervalidatefaculty.php";?>


</head>



<body>
	
	

	<div class="wrap">
		
	<h3 class="heading"> Registration Page </h3>

	<form method="post" onsubmit="return validate()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

	First Name  &nbsp  : 
	<input name="t1"  type='text' placeholder='Enter FirstName' required>

	<label name="l1"></label>
 
	Last Name  &nbsp  : 
	<input name="t2"  type='text' placeholder='Enter Last Name' required>

	<label name="l2"></label> 
	 Email  &nbsp  :  
	<input name="t3"  type='text' placeholder='Enter Email'>

	<label name="l3"></label>
	 Password &nbsp   : 
	<input name="t4" type = 'password' placeholder= 'Enter Password'>

	<label name="l4"></label>
	 Confirm Password &nbsp   : 
	<input name="t5" type = 'password' placeholder= 'Enter Password'>
		
	<label name="l5"></label> 
			
	Enter PIN &nbsp   : 
	<input name="pin" type = 'password' placeholder= 'Enter PIN'>

		
	Mobile &nbsp  : 		
	<input name="t6" type = 'text'  placeholder='Enter Number'> </input>

	<label name="l6"></label> 
		
	Gender : 

	<br>
						
	<input name='gender' type = 'radio' value='Male' checked> Male
 
	<input name='gender' type = 'radio' value='Female' > Female
			
	<br>
			
			
	<input class="btn btn-primary px-5" type='submit' onclick="return validate()" value="Register"  value='submit'/>
 
	<input class="btn btn-primary  px-5" type='reset'  value="Reset"     value='reset'/>
			
	<br>
<br>
		
</form>
	
</div>


</body>

</html>
