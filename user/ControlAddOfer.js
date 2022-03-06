var fileUpload = document.getElementById("fileUpload");
var enviar = document.getElementById("enviar");
var alert= document.getElementById("echoAlert");
enviar.addEventListener('submit',function(e){
 
  
  if (document.getElementById('customx').value === ""){
   
    
    
    document.getElementById("alert").style.display="block";
    document.getElementById("echoAlert").innerHTML="entre un nom de service";
    
    e.preventDefault();
  }
  
    

  
  if (document.getElementById('textarea').value === ""){
   
    
    document.getElementById("alert").style.display="block";
    document.getElementById("echoAlert").innerHTML="donne une description";
 
    e.preventDefault();
  }


  if (fileUpload.files.length == 0) {
   
    document.getElementById("alert").style.display="block";
    document.getElementById("echoAlert").innerHTML="Aucun image sélectionné";

   
    e.preventDefault();
  }

  if (fileUpload.files[0].type.indexOf("image") != 0) {
   
    document.getElementById("alert").style.display="block";
    document.getElementById("echoAlert").innerHTML="Ce fichier n'est pas une image";

   

    e.preventDefault();
  }
});


//formulaire

var fileUpload = document.getElementById("fileUploadd");
var enviar = document.getElementById("HO");
var alert= document.getElementById("echoAlertt");
enviar.addEventListener('submit',function(e){
 
  
  if (document.getElementById('customx').value === ""){
   
    
    
    document.getElementById("alert").style.display="block";
    document.getElementById("echoAlert").innerHTML="entre un nom de service";
    
    e.preventDefault();
  }
  
    

  
  if (document.getElementById('textarea').value === ""){
   
    
    document.getElementById("alert").style.display="block";
    document.getElementById("echoAlert").innerHTML="donne une description";
 
    e.preventDefault();
  }


  if (fileUpload.files.length == 0) {
   
    document.getElementById("alert").style.display="block";
    document.getElementById("echoAlert").innerHTML="Aucun image sélectionné";

   
    e.preventDefault();
  }

  if (fileUpload.files[0].type.indexOf("image") != 0) {
   
    document.getElementById("alert").style.display="block";
    document.getElementById("echoAlert").innerHTML="Ce fichier n'est pas une image";

   

    e.preventDefault();
  }
});

//
