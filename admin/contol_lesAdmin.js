var modal = document.getElementById('con');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    document.getElementById('new_admin').style.display='none';
  }
}


function block(){
    if( document.getElementById("block").disabled == false){
        modal.style.display = "none";
        document.getElementById('new_admin').style.display='block';
		
		
    }

	
   
}
//eye password
var password = document.getElementById('password')
var Cpassword = document.getElementById('Cpassword')
var password_toggle = document.getElementById('password-toggle')
var Cpassword_toggle = document.getElementById('Cpassword-toggle')

function passwordToggle() {
	if (password.type === 'password') {
		password.type = 'text'
		password_toggle.classList.remove('fa-eye-slash')
		password_toggle.classList.add('fa-eye')
	} else {
		password.type = 'password'
		password_toggle.classList.remove('fa-eye')
		password_toggle.classList.add('fa-eye-slash')
	}
}
function CpasswordToggle() {
	if (Cpassword.type === 'password') {
		Cpassword.type = 'text'
		Cpassword_toggle.classList.remove('fa-eye-slash')
		Cpassword_toggle.classList.add('fa-eye')
	} else {
		Cpassword.type = 'password'
		Cpassword_toggle.classList.remove('fa-eye')
		Cpassword_toggle.classList.add('fa-eye-slash')
	}
}