let mySForm=document.getElementById('form1');
var validityEmail=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ ;
let email = document.getElementById('emailPass');
let motPasse= document.getElementById('password');
let motPasseCo= document.getElementById('passwordC');
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
    
    
    if(motPasse.value==""){
        
        motPasse.style.border="2px solid red";
        e.preventDefault();


    }
    else
    if(motPasse.value.length<6){
        
        motPasse.style.border="2px solid red";
        e.preventDefault();
        



    }
    
    if(motPasseCo.value==""){
        
        motPasseCo.style.border="2px solid red";
        e.preventDefault();


    }
    if(motPasse.value!=motPasseCo.value && motPasse.value!="" &&motPasseCo.value!="" ){
        
        motPasseCo.style.border="2px solid red";
        motPasse.style.border="2px solid red";
        e.preventDefault();


    }
});


function onmous(){
    if(email.value!="" && validityEmail.test(email.value)==true){
        email.style.border="2px solid green"; 
    }

    if(motPasse.value!="" && motPasse.value.length>=6){
        motPasse.style.border="2px solid green";
    }

    if(motPasseCo.value!="" && motPasse.value==motPasseCo.value){
        motPasseCo.style.border="2px solid green";

    }



}
function eyes(){
    document.getElementById('inputDiv3').style.display="block";
    document.getElementById('eye').style.display="none";
    document.getElementById('eyOP3').style.display="block";
    document.getElementById('eyOP3').addEventListener("click",()=>{
        document.getElementById('eyCL3').style.display="block";
        document.getElementById('eyOP3').style.display="none";
        motPasse.type = "text";

    });
    document.getElementById('eyCL3').addEventListener("click",()=>{
        document.getElementById('eyCL3').style.display="none";
        document.getElementById('eyOP3').style.display="block";
        motPasse.type = "password";

    });

    document.getElementById('eye2').style.display="block";
    document.getElementById('eyOP4').style.display="none";
    document.getElementById('eyCL4').style.display="none";
    motPasseCo.type = "password";

   
}

function eyes2(){
    document.getElementById('eye2').style.display="none";
    document.getElementById('eyOP4').style.display="block";
    document.getElementById('eyOP4').addEventListener("click",()=>{
        document.getElementById('eyCL4').style.display="block";
        document.getElementById('eyOP4').style.display="none";
        motPasseCo.type = "text";

    });
    document.getElementById('eyCL4').addEventListener("click",()=>{
        document.getElementById('eyCL4').style.display="none";
        document.getElementById('eyOP4').style.display="block";
        motPasseCo.type = "password";

    });

    document.getElementById('eye').style.display="block";
    document.getElementById('eyOP3').style.display="none";
    document.getElementById('eyCL3').style.display="none";
    motPasse.type = "password";
}

function onNpne(){
    document.getElementById('eye').style.display="block";
    document.getElementById('eyOP3').style.display="none";
    document.getElementById('eyCL3').style.display="none";
    document.getElementById('eye2').style.display="block";
    document.getElementById('eyOP2').style.display="none";
    document.getElementById('eyCL2').style.display="none";
    motPasseCo.type = "password";
    motPasse.type = "password";

}

