

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleFormulair.css?v=<?php echo time()?>">
    <link rel="icon" href="../imageService/business-2684758__340.webp" type="image/x-icon">
    <link rel="stylesheet" href="../login_System/logoStyle.css?V=<?php echo time();?>">
    <title>getWork</title>
</head>
<body>

    <header class="header">
        <div class="logo">
        <img src="../imageService/business-2684758__340.webp" alt="">
            <a href="../login_System/accueil.php">getWork</a>
        </div>
        
        <!-- <ul class="navbar">
          
          <a href=" http://localhost/PFFE/login_System/regester.php" class="btn-Connexion-conex" id="">S'inscrire  </a>
         
        </ul> -->
          
          
          
          
          
       
      </header>
    <div  class="for2">
        <div class="a">
        <a  href="http://localhost/PFFE/login_System/forgetPassword.php">  Mot de passe oublié ?</a></div>
        <?php if(isset($_GET['Slike'])){  ?>
        <form   id="form1" method="POST" action="http://localhost/PFFE/login_System/formulair.php?Slike=<?php echo $_GET['Slike']?>" >
      <?php
        }else{?>
        
        
        <form   id="form1" method="POST" action="http://localhost/PFFE/login_System/formulair.php" >
        <?php
        }
        ?>
        <div class="inputDiv2">
            <img class="iconF2" src="https://img.icons8.com/material-outlined/24/000000/name.png"/>
        <input name="pseudo" onclick="onC()" type="text" id="pseudo"  class="inpForm" placeholder="entre pseudo ou email" >
    </div>
    <div class="inputDiv2">
        <img id="eyOP3" src="icons/oeil.png" alt="">
            <img id="eyCL3" src="icons/eyeC.png" alt="">
            <img id="eye" class="iconFS2" src="https://img.icons8.com/windows/50/000000/key-security.png"/>
        <input class="inpP" name="passW" onclick="onCl()" type="password" id="password"  placeholder="mot de passe"  class="inpForm" >
        </div>

       


        
         
        
        
        
        
    
       <button id="sub2" type="submit"  >Se connecter</button>

    </form>
    <div>
        <div class="imgS2">
            <img src="icons/icons8-bunch-of-keys-30.png" alt="" >
        </div>
        <div class="imgSR"><h3>Connexion</h3></div>
    </div>
    
    <hr class="hr2">

    <div class="orHr">ou</div>
    <p class="compte"> Pas encore de compte ?
        <?php if(isset($_GET['Slike'])){ ?>
    <a href=" http://localhost/PFFE/login_System/regester.php?Slike=<?php echo $_GET['Slike'] ?>">  S'inscrire!</a>
   <?php
        }else {
           ?>
            <a href=" http://localhost/PFFE/login_System/regester.php">  S'inscrire!</a>
           <?php
        }
   
   ?>
   </p>
</div>


    <script src="testFormulaire.js">
       /* let myForm = document.getElementById('form1');
        let myInput=document.getElementById('pseudo');
        let myInput1=document.getElementById('password');
        myForm.addEventListener('submit',function(e){
            
            if(myInput.value== "" ){
                let MyErreur=document.getElementById('spanForm');
                MyErreur.innerHTML="entre le nom d'utilisateur";
    
                e.preventDefault();
            }
            if(myInput1.value== "" ){
                let MyErreur1=document.getElementById('spanForm1');
                MyErreur1.innerHTML="entre mot de passe";
                document.getElementById('form1').style.height="350px";
                
                e.preventDefault();
            }
         });
        function onC(){
            document.getElementById('spanForm').innerHTML=" ";
            document.getElementById('spanForm1').innerHTML=" ";
            document.getElementById('form1').style.height="300px"
        }
        function onCl(){
            
            document.getElementById('spanForm1').innerHTML=" ";
            document.getElementById('form1').style.height="300px"
        }*/
    
    </script>

<script>window.localStorage.clear();</script>
</body>
</html>