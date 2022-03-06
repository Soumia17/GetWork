var validityEmail=/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ ;
let mySForm=document.getElementById('form2');
let email = document.getElementById('email');
let motPasse= document.getElementById('password1');
let motPasseCo= document.getElementById('Copassword');
let nom= document.getElementById('nom');
let preNom= document.getElementById('prenom');
let Pseu= document.getElementById('pseudo1');
let jsTest=document.getElementById('jsTest');
let jsT=document.getElementById('jsT');
mySForm.addEventListener('submit',function(e){


    if(nom.value==""){
        jsT.style.border="1px solid red";
        jsT.style.backgroundColor="#FFCCCC";
        document.getElementById('img').src="icons8-xbox-x-50.png";
        jsTest.innerHTML="Entrez votre nom";
        nom.style.border="2px solid red";
        e.preventDefault();


    }
    if(preNom.value==""){
        jsT.style.border="1px solid red";
        jsT.style.backgroundColor="#FFCCCC";
        document.getElementById('img').src="icons8-xbox-x-50.png";
        jsTest.innerHTML="Entrez votre prenom";
        preNom.style.border="2px solid red";
        e.preventDefault();


    }
    if(Pseu.value==""){
        jsT.style.border="1px solid red";
        jsT.style.backgroundColor="#FFCCCC";
        document.getElementById('img').src="icons8-xbox-x-50.png";
        jsTest.innerHTML="Entrez votre pseudo";
        Pseu.style.border="2px solid red";
        e.preventDefault();


    }
    if(Pseu.value<4){
        jsT.style.border="1px solid red";
        jsT.style.backgroundColor="#FFCCCC";
        document.getElementById('img').src="icons8-xbox-x-50.png";
        jsTest.innerHTML="Entrez d'au moins six character";
        Pseu.style.border="2px solid red";
        e.preventDefault();


    }
    
    if(email.value==""){
        
        jsT.style.border="1px solid red";
        jsT.style.backgroundColor="#FFCCCC";
        document.getElementById('img').src="icons8-xbox-x-50.png";
        jsTest.innerHTML="Entrez votre email";
        email.style.border="2px solid red";
        
       //mySForm.style.height="450px";
        e.preventDefault();

    }else
    if(validityEmail.test(email.value)==false){
        jsT.style.border="1px solid red";
        jsT.style.backgroundColor="#FFCCCC";
        document.getElementById('img').src="icons8-xbox-x-50.png";
        jsTest.innerHTML="l'email n'est pas valid";
        email.style.border="2px solid red";
        

        e.preventDefault();

    }
    
    
    if(motPasse.value==""){
        jsT.style.border="1px solid red";
        jsT.style.backgroundColor="#FFCCCC";
        document.getElementById('img').src="icons8-xbox-x-50.png";
        jsTest.innerHTML="Entrez une combinaison d'au moins six character ";
        motPasse.style.border="2px solid red";
        e.preventDefault();


    }
    else
    if(motPasse.value.length<6){
        jsT.style.border="1px solid red";
        jsT.style.backgroundColor="#FFCCCC";
        document.getElementById('img').src="icons8-xbox-x-50.png";
        jsTest.innerHTML="Entrez une combinaison d'au moins six chiffres , lettres et signes de ponctuation";
        motPasse.style.border="2px solid red";
        e.preventDefault();
        



    }
    
    if(motPasseCo.value==""){
        jsT.style.border="1px solid red";
        jsT.style.backgroundColor="#FFCCCC";
        document.getElementById('img').src="icons8-xbox-x-50.png";
        jsTest.innerHTML="confirmer le mote de passe";
        motPasseCo.style.border="2px solid red";
        e.preventDefault();


    }
    if(motPasse.value!=motPasseCo.value && motPasse.value!="" &&motPasseCo.value!="" ){
        jsT.style.border="1px solid red";
        jsT.style.backgroundColor="#FFCCCC";
        document.getElementById('img').src="icons8-xbox-x-50.png";
        jsTest.innerHTML="confirmer le mote de passe";
        motPasseCo.style.border="2px solid red";
        motPasse.style.border="2px solid red";
        e.preventDefault();


    }

    


 


} );

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

    if(nom.value!=""){
        nom.style.border="2px solid green";

    }

    if(preNom.value!=""){
        preNom.style.border="2px solid green";
    }

    if(Pseu.value!=""){
        Pseu.style.border="2px solid green";

    }


}


function eyes(){
    document.getElementById('eye').style.display="none";
    document.getElementById('eyOP').style.display="block";
    document.getElementById('eyOP').addEventListener("click",()=>{
        document.getElementById('eyCL').style.display="block";
        document.getElementById('eyOP').style.display="none";
        motPasse.type = "text";

    });
    document.getElementById('eyCL').addEventListener("click",()=>{
        document.getElementById('eyCL').style.display="none";
        document.getElementById('eyOP').style.display="block";
        motPasse.type = "password";

    });

    document.getElementById('eye2').style.display="block";
    document.getElementById('eyOP2').style.display="none";
    document.getElementById('eyCL2').style.display="none";
    motPasseCo.type = "password";

   
}

function eyes2(){
    document.getElementById('eye2').style.display="none";
    document.getElementById('eyOP2').style.display="block";
    document.getElementById('eyOP2').addEventListener("click",()=>{
        document.getElementById('eyCL2').style.display="block";
        document.getElementById('eyOP2').style.display="none";
        motPasseCo.type = "text";

    });
    document.getElementById('eyCL2').addEventListener("click",()=>{
        document.getElementById('eyCL2').style.display="none";
        document.getElementById('eyOP2').style.display="block";
        motPasseCo.type = "password";

    });

    document.getElementById('eye').style.display="block";
    document.getElementById('eyOP').style.display="none";
    document.getElementById('eyCL').style.display="none";
    motPasse.type = "password";
}

function onNpne(){
    document.getElementById('eye').style.display="block";
    document.getElementById('eyOP').style.display="none";
    document.getElementById('eyCL').style.display="none";
    document.getElementById('eye2').style.display="block";
    document.getElementById('eyOP2').style.display="none";
    document.getElementById('eyCL2').style.display="none";
    motPasseCo.type = "password";
    motPasse.type = "password";

}



//function animation(){
  //  jsT.style.display="block";
   // jsT.style.animation="@keyframes shake-bottom{0%,100%{transform:rotate(0deg);transform-origin:50% 100%}10%{transform:rotate(2deg)}20%,40%,60%{transform:rotate(-4deg)}30%,50%,70%{transform:rotate(4deg)}80%{transform:rotate(-2deg)}90%{transform:rotate(2deg)}}";
   // jsT.style.animationDuration="2s"
//}