document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
    const dropZoneElement = inputElement.closest(".drop-zone");
  
    dropZoneElement.addEventListener("click", (e) => {
      inputElement.click();
    });
  
    inputElement.addEventListener("change", (e) => {
      if (inputElement.files.length) {
        updateThumbnail(dropZoneElement, inputElement.files[0]);
      }
    });
  
    dropZoneElement.addEventListener("dragover", (e) => {
      e.preventDefault();
      dropZoneElement.classList.add("drop-zone--over");
    });
  
    ["dragleave", "dragend"].forEach((type) => {
      dropZoneElement.addEventListener(type, (e) => {
        dropZoneElement.classList.remove("drop-zone--over");
      });
    });
  
    dropZoneElement.addEventListener("drop", (e) => {
      e.preventDefault();
  
      if (e.dataTransfer.files.length) {
        inputElement.files = e.dataTransfer.files;
        updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
      }
  
      dropZoneElement.classList.remove("drop-zone--over");
    });
  });
  
  /**
   * Updates the thumbnail on a drop zone element.
   *
   * @param {HTMLElement} dropZoneElement
   * @param {File} file
   */
  function updateThumbnail(dropZoneElement, file) {
    let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");
  
    // First time - remove the prompt
    if (dropZoneElement.querySelector(".drop-zone__prompt")) {
      dropZoneElement.querySelector(".drop-zone__prompt").remove();
    }
  
    // First time - there is no thumbnail element, so lets create it
    if (!thumbnailElement) {
      thumbnailElement = document.createElement("div");
      thumbnailElement.classList.add("drop-zone__thumb");
      dropZoneElement.appendChild(thumbnailElement);
    }
  
    thumbnailElement.dataset.label = file.name;
  
    // Show thumbnail for image files
    if (file.type.startsWith("image/")) {
      const reader = new FileReader();
  
      reader.readAsDataURL(file);
      reader.onload = () => {
        thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
      };
    } else {
      thumbnailElement.style.backgroundImage = null;
    }
  }




  //deltConfirmation

  function confirmDelete(self) {
    var modal = document.getElementById('id01');
    

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
}


//image loaded


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








