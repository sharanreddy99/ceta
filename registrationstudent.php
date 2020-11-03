<!DOCTYPE html>

<html lang="en">

<?php require "servervalidatestudent.php";?>


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
		select {
			margin-top:5px;
   			-webkit-border-radius: 5px;
   			-moz-border-radius: 5px;
   			border-radius: 5px;
   			height: 29px;
   			overflow: hidden;
   			width: 240px;
			margin-bottom:10px;
			color:#fff;
			background-color: #3F3F48;
		}
			
	</style>

	
	<script type="text/javascript" src="clientvalidatingstudent.js">
	
	</script>


</head>



<body>

	
	<div class="wrap">
		
	<h3> Registration Page </h3>
		
		
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
							
			First Name  &nbsp  :  
			<input name="t1" type='text' autocomplete="off" placeholder='Enter FirstName' required>

			<label name="l1"></label>
			Last Name  &nbsp  :  

			<input name="t2" type='text' autocomplete="off" placeholder='Enter Last Name' required>

			<label name="l2"></label>
			 Roll Number  &nbsp  :  
			<input name="t3" type='text' autocomplete="off" placeholder='Enter Roll Number' required>

			<label name="l3"></label> 
			
			 Email  &nbsp  :  
			<input name="t4" type='text' autocomplete="off" placeholder='Enter Email'>

			<label name="l4"></label>
		
	 Password &nbsp : (Should have 8 Characters with atleast 1 Uppercase, 1 Lowercase , 1 Digit , 1 @symbol)
			<input name="t5"  type = 'password' placeholder= 'Enter Password'>
	
		<label name="l5"></label>
		
	 Confirm Password &nbsp   : 
	
		<input name="t6"  type = 'password'  placeholder= 'Enter Password'>

			<label name="l6"></label>
		
	 Enter Pin &nbsp   : 
	
		<input name="pin" type = 'text' autocomplete="off"  placeholder= 'Enter PIN'>
		
	 Mobile &nbsp  : 
			<input name="t7"  type = 'text'  autocomplete="off"  placeholder='Enter Number'> </input>
	
		<label name="l7"></label>
			 Gender : 
			<br>
			<input name='gender' type = 'radio' value='Male' checked/> Male
			<input name='gender' type = 'radio' value='Female' > Female
			<br>

			 Select Year &nbsp  : 
 
			<select name='Year' >
 
				<option value="Year" selected> select </option>

				<option value='2nd Year' > 2nd Year </option>

				<option value="3rd Year"> 3rd Year </option>

				<option value='4th Year'> 4th Year </option>

			</select>

			<label name="l9"></label>
			 Select Branch &nbsp   : 
 
			<select name='Branch' >

				<option value="Branch" selected> select </option>

				<option value='CSE-A'> CSE-A </option>

				<option value='CSE-B'> CSE-B </option>

				<option value='CSE-C'> CSE-C </option>

				<option value='CSE-D'> CSE-D </option>

			</select>

			<label name="l10"></label>
		<input class="btn btn-primary px-5" type='submit' onclick="return validate()"  value="Register"  value='submit'/>
 
		<input class="btn btn-primary px-5" type='reset'  value="Reset"     value='reset'/>

		<br>
<br>

	</form>
</div>
	
</body>

</html>
