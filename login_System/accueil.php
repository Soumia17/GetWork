<?php

include_once 'includes/database-linck.php';
$conn;
if(isset($_POST['sub'])){
  $today = date("F j, g:i a");
  $message=$_POST['msg'];
  $sen=$_POST['nom'];
  $eml=$_POST['email'];
  $mess="INSERT INTO messages(emetteur,messag,dateMess,emailEmeteur) values('$sen','$message','$today','$eml') ";
  mysqli_query($conn,$mess);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="stylrAccueil.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../login_System/logoStyle.css?v=<?php echo time(); ?>">
    <link rel="icon" href="https://img.icons8.com/nolan/64/workday.png" type="image/x-icon">
    <title>Document</title>

   
</head>

<header class="header">
  <div class="logo">
    <a href="../login_System/accueil.html">getWork</a>
   
  <!-- <div>
      <form action="">
          <div class="box-recherch">
        <i class="fa fa-search" aria-hidden="true"></i>
          <input placeholder="trouver des services" id="input-Rechercher" type="text">
          <button id="button-Rechercher">Rechercher</button>
        </div>
          
      </form>
  </div> -->
</div>
  <ul class="navbar">
    <!-- <div class="container">
      <input type="text" placeholder="Search...">
      <div class="search"></div>
    </div> -->
    <div class="search-box">
       <form action="searchR.php" method="GET">
      <button name="onSub"  class="btn-search"><i class="fas fa-search"></i></button>
      
    <input type="search"  name="search" class="input-search" placeholder="Type to Search...">
    </form>
      
  </div>
  

    <li><a href="#S1" onclick="toggleMenu();">Accueil</a></li>
    <li><a href="#services" onclick="toggleMenu();">services</a></li>
    <li><a href="#propos" onclick="toggleMenu();">A propos</a></li>
    <li><a href="#Contact" onclick="toggleMenu();">Contact</a></li>
    <a href=" http://localhost/PFFE/login_System/regester.php" class="btn-Connexion" id="">S'inscrire  </a>
    <a href="Formulaire.html " class="btn-Connexion" id="btn-Connexion"> Connexion</a>
    
    
  </ul>
 
    
    
    
    
    
 
</header>

<section class="S1" id="S1">
  
  <div >
<h1>trouvez votre
  <span
     class="txt-rotate"
     data-period="2000"
     data-rotate='[ "besoin.", "travail.", "plaisir.", "passio.","talent!" ]'></span>
</h1>
<h2>Tout cela et plus dans getWork.</h2>
</div>

</section>

<section class="services" id="services">
  
  <div class="titre">
    <h2 class="titre-texte">Nos <span>S</span>ervices</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt. </p>
</div>


<button class="pre-btn"><img src="images/icons8-next-64.png" alt=""></button>
        <button class="nxt-btn"><img src="images/icons8-next-64.png" alt=""></button>
        <?php 
        $sql="SELECT * FROM services";
        $res = mysqli_query($conn,$sql);
        while($g=mysqli_fetch_assoc($res)){
        ?>
        
        <div class="product-container">
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag"><?php echo ($g['serviceName'])?></span>
                   <img src="../user/<?php echo ($g['serviceIcon'])?>" class="product-thumb" alt="">
                   
                </div>
               
            </div>
            <?php
        }
            ?>
            <!-- <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">service1</span>
                   <a href=""> <img src="images/pexels-vlada-karpovich-4050319.jpg" class="product-thumb" alt=""></a>
                   
                </div>
                
            </div> -->
            <!-- <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">service1</span>
                   <a href=""> <img src="images/mentir_cv_header_zety_fr_2.jpg" class="product-thumb" alt=""></a>
                   
                </div>
               
            </div> -->
            <!-- <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">service1</span>
                   <a href=""> <img src="images/pexels-vlada-karpovich-4050319.jpg" class="product-thumb" alt=""></a>
                   
                </div>
                
            </div> -->
            <!-- <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">service1</span>
                   <a href=""> <img src="images/K9AYn9bRY7d49RZdWkjvHxK.jpg" class="product-thumb" alt=""></a>
                   
                </div>
               
            </div> -->
            <!-- <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">service1</span>
                   <a href=""> <img src="images/K9AYn9bRY7d49RZdWkjvHxK.jpg" class="product-thumb" alt=""></a>
                   
                </div>
              
            </div> -->
           
              
            </div>
           
              
            </div>
        </div>


        
</section>

<section class="propos" id="propos">
  <div class="row">
    <div class="col50">
          <h2 class="titre-texte"><span>A</span> Propos De Nous</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
          </p>
        </div>
          <div class="col50">
          <div class="img">
            
          </div>
        
      </div>
    </div>
  </section>

<section class="Contact" id="Contact">

  <div class="titre noir">
    <h2 class="titre-text"><span>C</span>ontact</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
</div>
<div class="contactform">
    <h3>Envoyer un message</h3>
    <form action="" method="POST">
    <div class="inputboite">
        <input name="nom" require type="text" placeholder="Nom">
    </div>
    <div class="inputboite">
       <input name="email" require type="email" placeholder="email">
    </div>
    <div class="inputboite">
       <textarea name="msg" require placeholder="message"></textarea>
    </div>
    <div class="inputboite">
        <input name="sub" type="submit" value="envoyer">
    </div>
    </form>
</div>
</section>

<div class="copyright">
  <p>copyright 2022 <a href="#">de</a> Mustapha stamboli mascara</p>
</div>








<script src="accueiControl.js"></script>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    
</body>
</html>