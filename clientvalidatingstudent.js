
function validate()
{
	var ele = document.getElementsByTagName("input");
	var labels  = document.getElementsByTagName("label");
	var selects = document.getElementsByTagName("select");
	
	//element[0] = firstname
	//element[1] = lastname
	//element[2] = rollnumber
	//element[3] = email
	//element[4] = password
	//element[5] = confirm password
	//element[7] = mobile
	//element[8] = gender
	//selects[0] = year
	//selects[1] = branch
	//labels[8] = year
	// labels[9] = branch
	
	
	var fname = ele[0].value;
	var lname = ele[1].value;
	var rollno = ele[2].value
	var pass = ele[4].value;
	var confpass = ele[5].value;
	var mobile = ele[7].value;
	
	var pattern = new RegExp("^(?=.*[A-Za-z])[A-Za-z ]{2,}");
	
	if(pattern.test(fname))
		{labels[0].innerHTML="";}
	
	else
		{labels[0].innerHTML="* Invalid Name";}
	
	if(pattern.test(lname))
		{labels[1].innerHTML="";}
	
	else
		{labels[1].innerHTML="* Invalid Name";}
	
	pattern = new RegExp("^(1(6|7|8|9)881A05(1|2|3|4|5|6|7|8|9|[A-R])[0-9])$");
	
	if(pattern.test(rollno))
		{labels[2].innerHTML="";}
	
	else
		{labels[2].innerHTML="* Invalid Roll Number";}
	
	
	pattern = new RegExp("^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[@])[A-Za-z0-9@]{8,}");
	
	
	if(pattern.test(pass))
	{labels[4].innerHTML="";}
	
	else
	{labels[4].innerHTML="* Invalid Password";}
	
	
	if(pass!=confpass)
	{labels[5].innerHTML=" * Passwords dont match";}

	else
	{labels[5].innerHTML="";}

	
	pattern = new RegExp("^[0-9]{10}$");
	
	if(pattern.test(mobile))
		{labels[6].innerHTML="";}
	
	else
	{labels[6].innerHTML=" * Invalid mobile no";}
	
	if(selects[0].value=="Year")
	{
		labels[8].innerHTML=" * Choose Year";
	}
	
	else
	{
		labels[8].innerHTML="";
	}	
	
	if(selects[1].value=="Branch")
	{
		labels[9].innerHTML=" * Choose Branch";
	}
	
	else
	{
		labels[9].innerHTML="";
	}	
	
	var i=0;
	for(i=0;i<10;i++)
	{
		alert(labels[i].innerHTML);
		if(labels[i].innerHTML!="")
		{
			alert('client failedeeses');
			return false;
		}
	}
	
	return true;
}