let mySForm=document.getElementById('form');
let email = document.getElementById('email');
let motPasse= document.getElementById('password1');
let motPasseCo= document.getElementById('Copassword');
let numval=/^(00213|\+213|0)(5|6|7)[0-9]{8}$/;
var validityEmail=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ ;
mySForm.addEventListener('submit',function(e){
    if(numval.test(num.value)==false){
        document.getElementById('sptl').innerHTML=" ";

        e.preventDefault();

    }
    
    else if(validityEmail.test(email.value)==false){
        document.getElementById('spem').innerHTML=" ";
        
        

        e.preventDefault();

    }

   else if(validityEmail.test(email.value)==false){
        document.getElementById('spem').innerHTML="entre un email valide";
        
        

        e.preventDefault();

    }

    if(motPasse.value.length<6){
        document.getElementById('pass').innerHTML=" ";
        document.getElementById('copass').innerHTML="Entrez au moins 6 characters";
        
        e.preventDefault();
        



    }

    if(motPasseCo.value==""){
        document.getElementById('pass').innerHTML=" ";
        document.getElementById('copass').innerHTML="confirmer le mote de passe";
        e.preventDefault();


    }
    if(motPasse.value!=motPasseCo.value ){
        document.getElementById('pass').innerHTML=" ";
        document.getElementById('copass').innerHTML="confirmer le mote de passe";
        e.preventDefault();


    }
});