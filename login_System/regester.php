<?php
include_once 'includes/database-linck.php';
?>




<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleFormulair.css?v=<?php echo time(); ?>">
    <link rel="icon" href="https://img.icons8.com/nolan/64/workday.png" type="image/x-icon">
    <link rel="stylesheet" href="../login_System/logoStyle.css">
    <title>getWork</title>
</head>
<body >
<header class="header">
<div class="logo">
<a href="../login_System/accueil.php">getWork</a>
                </div>
  <!-- <form action="formulair.php" method="POST">
  <ul class="navbar">
    <li><input placeholder="entre pseudo ou email" name="pseudo" class="inpForgotPass"  type="text"></li>
    <li><input name="passW" placeholder="mot de passe" class="inpForgotPass"  type="password"></li>
    <button class="btn-Connexion">Connexion</button>
  </ul>
  </form> -->
    
    
    
    
 
</header>





    <div  class="for">
        
    <div id="jsT">
    <img id="img" src="">
        <label id="jsTest"></label></div>
    
    <?php if(isset($_GET['Slike'])){  ?>
     
            <form  action="inscrire.php?Slike=<?php echo $_GET['Slike']?>" method="POST" onmouseover="onmous()"  id="form2" >
      <?php
        }else{?>
        
        <form  action="inscrire.php" method="POST" onmouseover="onmous()"  id="form2" >
        
        <?php
        }
        ?>
       

        <div class="user-detail">
            

        <div class="inputDiv">
            <span class="detailINput">
                Nom
            </span>
            <img class="iconF" src="https://img.icons8.com/material-outlined/24/000000/name.png"/>
            <input name="nom" onkeyup='saveValue(this)' onclick="onNpne()" id="nom" type="text" class="inpP" placeholder="votre nom" >
            
           <!--<span id="SpNom"></span>--> 
        </div>
        <div class="inputDiv">
            <span class="detailINput">
                Prenom
            </span>
            <img class="iconF" src="https://img.icons8.com/material-outlined/24/000000/name.png"/>
            <input onclick="onNpne()" onkeyup='saveValue(this)' name="prenom"  id="prenom" type="text"  placeholder="votre pr??nom" >
           <!-- <span id="SpPrenom"></span>-->
        </div>
       
        <div class="inputDiv">
            <span class="detailINput">
               pseudo
            </span>
            <div >
            <img class="iconF" src="https://img.icons8.com/material-outlined/24/000000/name.png"/>
            <input onclick="onNpne()" onkeyup='saveValue(this)' name="userName"  id="pseudo1" type="text" placeholder="votre pseudo" >
        </div>
           <!-- <span id="SpPseu"></span>-->
        </div>
        <div class="inputDiv">
            <span class="detailINput">
                email
            </span>
            <img class="iconF" src="https://img.icons8.com/material-outlined/24/000000/filled-message.png"/>
            <input onclick="onNpne()" onkeyup='saveValue(this)'  name="email"  id="email" type="text" placeholder="votre email" >
           <!--<span id="SpEmail"></span>--> 
        </div>
        <div class="inputDiv">
            <span class="detailINput">
                mote de passe
            </span>
            <img id="eyOP" src="icons/oeil.png" alt="">
            <img id="eyCL" src="icons/eyeC.png" alt="">
            <img id="eye" class="iconFS" src="https://img.icons8.com/windows/50/000000/key-security.png"/>
            <input onclick="eyes()" name="password"  id="password1" type="password" placeholder="entre un mote de passe" >
           <!-- <span id="SpMotPasse"></span>-->
        </div>
        <div class="inputDiv">
            <span class="detailINput">
                confirme le mote de passe
            </span>
            <img id="eyOP2" src="icons/oeil.png" alt="">
            <img id="eyCL2" src="icons/eyeC.png" alt="">
            <img id="eye2" class="iconFS"  src="https://img.icons8.com/windows/50/000000/key-security.png"/>
            <input onclick="eyes2()" id="Copassword" type="password" placeholder=" confirme votre mote de passe" >
           <!-- <span id="SpCoMotPasse"></span>-->
        </div>
    
    </div>

        <dive class="but">
            <button  id="sub" name="sub" type="submit" >cr??er un compte</button>
        </dive>
   







    </form><div>
    <div class="imgS">
        <img src="icons/man+person+profile+user+worker+icon-1320190557331309792.png" alt="" >
    </div>
    <div class="imgSR"><h3>S'inscrire</h3></div>
</div>
    
    <hr class="hr1">

    <div class="or">ou</div>
    <div class="conn" >
    <?php if(isset($_GET['Slike'])){  ?>
        <span >Vous avez d??j?? un compte ?<a href="Connexion.php?Slike=<?php echo $_GET['Slike']?>"> <u>Connexion! </u> </a></span>
        <?php
    }else{
        ?>
         <span >Vous avez d??j?? un compte ?<a href="Connexion.php"> <u>Connexion! </u> </a></span>
        <?php
    }
        ?>
    </div>
</div>

    
    



<script src="testInscription.js?v=<?php echo time()?>"></script>
 
  
</body>
</html>