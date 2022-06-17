<?php

include_once 'includes/database-linck.php';
$conn;
if(isset($_POST['sub'])){
  $today = date("F j, g:i a");
  $message=$_POST['msg'];
  $sen=$_POST['nom'];
  $eml=$_POST['email'];
  $mess="INSERT INTO messages(emetteur,messag,dateMess,emailEmeteur) values('$sen','$message','$today','$eml') ";
  $cop= mysqli_query($conn,$mess);
  if($cop){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>getWork</title>
    </head>
    <body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     
     <script  >
        //alert("email existe deja");
        swal({
title: "Message envoye ",
text: "Merci de nous avoir contacté Votre question sera répondue par e-mail",
icon: "success",
button: "Dacord",
});
     </script>
    </body>
    </html>
    <?php
}else{?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>getWork</title>
      <style>
   
      </style>
  </head>
  <body>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script>
          swal({
    title: "Le message n'a pas pu être envoyé!",
    text: "réessaye à nouveau!",
    icon: "error",
    button: "d'accord!",
    
  });
  
   
      </script>
  </body>
  </html>
    <?php  
}
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
    
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login_System/css/util.css?v=<?php echo time()?>">
	<link rel="stylesheet" type="text/css" href="../login_System/css/main.css?v=<?php echo time()?>">
    <title>getWork</title>

   
</head>

<header class="header">
  <div class="logo">
    <a href="../login_System/accueil.php">getWork</a>
   
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
    <a href="Connexion.php " class="btn-Connexion" id="btn-Connexion"> Connexion</a>
    
    
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
   
</div>
<div class="services_bien">
      <?php
      $sql="SELECT * FROM services";
      $res = mysqli_query($conn,$sql);
      while($g=mysqli_fetch_assoc($res)){
        if($g['serviceName']!="Autre"){
      ?>
      <a href="nosServic.php?Sevice=<?php echo $g['serviceName']?>">
        <div class="service_i">
              <img  src="../admin/<?php echo ($g['serviceIcon'])?>" alt="hiii">
    
       
        <hr>
        <span><?php echo ($g['serviceName'])?></span>
    </div>
    </a>
    <?php
      }}
    ?>
    

    </div>
<!-- 
<button class="pre-btn"><img src="images/icons8-next-64.png" alt=""></button>
        <button class="nxt-btn"><img src="images/icons8-next-64.png" alt=""></button>
        <?php 
        // $sql="SELECT * FROM services";
        // $res = mysqli_query($conn,$sql);
        // while($g=mysqli_fetch_assoc($res)){
        ?>
        
        <div class="product-container">
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag"><?php // ($g['serviceName'//])?></span>
                   <img src="../admin/<?php// echo ($g['serviceIcon'])?>" class="product-thumb" alt="">
                   
                </div>
               
            </div>
            <?php
        // }
            ?> -->
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

<!-- <section class="propos" id="propos">
  <div class="row">
    <div class="col50">
          <h2 class="titre-texte"><span class="spt">A</span><span class="titre-sp">Propos De Nous</span> </h2>
          <p>
          Bienvenue sur getWork, votre source numéro un pour trouver des offres. Nous nous engageons à vous offrir le meilleur des offres
          , en mettant l'accent sur le service express.
          </p>
          <br>
          
          <p>
          Fondée en 2022 par Ait belkacem Soumia et Bouchakour Sara , getWork a parcouru un long chemin depuis ses débuts à l'Université Mustapha Stambouli. Quand le binôme a débuté, leurs passion pour le freelancer l'a poussé à faire des tonnes de recherches pour que getWork puisse vous proposer des offreqs intéressantes. Nous servons maintenant des clients partout dans l'Algérie et nous sommes ravis de pouvoir transformer notre passion en notre propre site Web.
          </p>
          <p>nous espérons que vous apprécierez nos services autant que nous aimons vous les offrir. Si vous avez des questions ou des commentaires, n'hésitez pas à nous contacter.</p>
        </div>
          <div class="col50">
          <div class="img">
            
          </div>
        
      </div>
    </div>
  </section> -->
  <section class="about" id="propos">
  <div class = "image">
               <img src="https://cdn.pixabay.com/photo/2017/08/26/23/37/business-2684758__340.png">
            </div>

            <div class = "content">
                <h2>Propos De Nous</h2>
                <span><!-- line here --></span>
                <p>Bienvenue sur getWork, votre source numéro un pour trouver des offres. Nous nous engageons à vous offrir le meilleur des offres , en mettant l'accent sur le service express.
Fondée en 2022 par Ait belkacem Soumia et Bouchakour Sara , getWork a parcouru un long chemin depuis ses débuts à l'Université Mustapha Stambouli. Quand le binôme a débuté, leurs passion pour le freelancer l'a poussé à faire des tonnes de recherches pour que getWork puisse vous proposer des offres intéressantes. Nous servons maintenant des clients partout dans l'Algérie et nous sommes ravis de pouvoir transformer notre passion en notre propre site Web.nous espérons que vous apprécierez nos services autant que nous aimons vous les offrir. Si vous avez des questions ou des commentaires, n'hésitez pas à nous contacter.</p>
                <ul class = "links">
                    <li><a href = "Connexion.php">Rejoignez-nous</a></li>
                    <div class = "vertical-line"></div>
                    <li><a href = "#services">service</a></li>
                    <div class = "vertical-line"></div>
                    <li><a href = "#Contact">Contactez</a></li>
                </ul>
                <ul class = "icons">
                    <li>
                        <i class = "fa fa-twitter"></i>
                    </li>
                    <li>
                        <i class = "fa fa-facebook"></i>
                    </li>
                    <li>
                        <i class = "fa fa-github"></i>
                    </li>
                    <li>
                        <i class = "fa fa-pinterest"></i>
                    </li>
                </ul>
            </div>
        </section>

<section class="" id="Contact">

  <!-- <div class="titre noir">
    <h2 class="titre-text"><span>C</span>ontact</h2>
    
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
</div> -->

<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="../login_System/images/img-01.png" alt="IMG">
			</div>

			<form class="contact1-form validate-form" method="post" id="form1">
				<span class="contact1-form-title">
				Entrer en contact
				</span>
 
        <div class="wrap-input1 validate-input" id="alert" data-validate = "Name is required">
        
          <img src="../login_System/icons/icons8-xbox-x-50.png" alt="">

        <span> tout les champs sont obligatoire</span>
				</div>
				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input class="input1" type="text"  name="nom" placeholder="Nom" id="nom" >
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input1" type="email"  name="email" placeholder="Email" id="email" >
					<span class="shadow-input1"></span>
				</div>

				<!-- <div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<input class="input1" type="text" name="subject" placeholder="Subject">
					<span class="shadow-input1"></span>
				</div> -->

				<div class="wrap-input1 validate-input" data-validate = "Message is required">
					<textarea class="input1" name="msg"  placeholder="Message" id="msg" ></textarea>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn" name="sub" type="submit">
						<span>
            Envoyer un e-mail
							<!-- <i class="fa fa-long-arrow-right" aria-hidden="true"></i> -->
              <i class="fa fa-send mr-1"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>


</section>

<div class="copyright">
  <p>copyright 2022 - Universite de Mascara : Mustapha Stambouli -par Ait belkacem soumia et Bouchakor sara</p>
</div>








<script src="accueiControl.js?v=<?php echo time();?>"></script>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script>window.localStorage.clear();</script>
    
</body>
</html>