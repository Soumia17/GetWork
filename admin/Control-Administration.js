

  
	var dd_main = document.querySelector(".dd_main");

	dd_main.addEventListener("click", function(){
		this.classList.toggle("active");
	})
	  
	var box  = document.getElementById('box');
var down = false;


function toggleNotifi(){
	
	if (down) {
		box.style.height  = '0px';
		box.style.opacity = 0;
		down = false;
		document.location.href='?seen=true';
	}else {
		box.style.height  = '510px';
		box.style.opacity = 1;
		down = true;
	}
	
}



  //etoileq

  let star = document.querySelectorAll('input');
let showValue = document.querySelector('#rating-value');

for (let i = 0; i < star.length; i++) {
	star[i].addEventListener('click', function() {
		i = this.value;

		showValue.innerHTML = i + " out of 5";
	});
}



