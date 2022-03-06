

let myForm = document.getElementById('form1');
let myInput=document.getElementById('pseudo');
let myInput1=document.getElementById('password');

mySForm.addEventListener('submit',function(e){

if(myInput.value==""){
myInput.style.border="2px solid red";
e.preventDefault();
}

if(myInput1.value==""){
myInput1.style.border="2px solid red";
e.preventDefault();


}

});
