let mySForm=document.getElementById('form1');
var validityEmail=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ ;
let email = document.getElementById('emailPass');
mySForm.addEventListener('submit',function(e){

        if(email.value==""){
            
            
            email.style.border="2px solid red";
            
           // mySForm.style.height="450px";
            e.preventDefault();
    
        }else
        if(validityEmail.test(email.value)==false){
            
            email.style.border="2px solid red";
            
    
            event.preventDefault();
    
        }
});
function onmous(){
        if(email.value!="" && validityEmail.test(email.value)==true){
            email.style.border="2px solid green"; 
        }}
