
function validate()
{
	var ele = document.getElementsByTagName("input");
	var labels  = document.getElementsByTagName("label");
	var selects = document.getElementsByTagName("select");

	var fname = ele[0];
	var email = ele[2];
	var pass = ele[3];
	var confpass = ele[4];
	var mobile = ele[6];
	
	var pattern = new RegExp("^(?=.*[A-Za-z])[A-Za-z ]{2,}");
    if(!pattern.test(fname.value)){
        if(fname.value==""){
            fname.setCustomValidity('First Name Shouldn\'t be empty');   
            $(fname).trigger('invalid');
            return false;
        }else{
            fname.setCustomValidity('Invalid Name');
            $(fname).trigger('invalid');
            return false;
        }
	}
	
	pattern = new RegExp(/^[A-Za-z0-9\._-]{2,}@\w+\.\w+$/);
    if(!pattern.test(email.value)){
        if(email.value==""){
            email.setCustomValidity('Email Shouldn\'t be empty');   
            $(email).trigger('invalid');
            return false;
        }else{
            email.setCustomValidity('Invalid Email');
            $(email).trigger('invalid');
            return false;
        }
    }

    
    pattern = new RegExp("^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[@])[A-Za-z0-9@]{8,}");
	if(!pattern.test(pass.value)){
        if(pass.value==""){
            pass.setCustomValidity('Password Shouldn\'t be empty');   
            $(pass).trigger('invalid');
            return false;
        }else{
            pass.setCustomValidity('(Should have 8 Characters with atleast 1 Uppercase, 1 Lowercase , 1 Digit , 1 @symbol)');
            $(pass).trigger('invalid');
            return false;
        }
    }

    if(confpass.value==""){
        confpass.setCustomValidity('Confirm the password');   
            $(pass).trigger('invalid');
            return false;
    
    }else if(confpass.value!=pass.value){
        confpass.setCustomValidity('Passwords don\'t match');
        $(confpass).trigger('invalid');
        return false;
    }

    pattern = new RegExp("^[0-9]{10}$");
	if(!pattern.test(mobile.value)){
        if(mobile.value==""){
            mobile.setCustomValidity('Mobile No Shouldn\'t be empty');   
            $(mobile).trigger('invalid');
            return false;
        }else{
            mobile.setCustomValidity('Invalid Mobile Number');
            $(mobile).trigger('invalid');
            return false;
        }
	}
	
	$('form[name="registration"]').on('submit',()=>{
        return true;
    })

    $('form[name="registration"]').trigger('submit');
	
}