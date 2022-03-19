<?php
session_start();

if(!isset($_SESSION['pseudo'])){
    header('location:http://localhost/PFFE/login_System/regester.php');
}else{
include_once '../includes/database-linck.php';
$conn;
         
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../admin/Style_AccuiAdmin.css?v=<?php echo time(); ?>">
   <!-- <link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="style_profil.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../admin/StyleService.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../user/Style_param.css?v=<?php echo time(); ?>">
  
    <link rel="icon" href="https://img.icons8.com/nolan/64/workday.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <title>Document</title>
   
</head>
<body >

    <header class="header">
  
        <div class="wrapper">
            <div class="navbar">
                <div class="logo">
                    <a href="#">getWork</a>
                </div>
                <div>
                <form action="">
                    <div class="box-recherch">
                  <i class="fa fa-search" aria-hidden="true"></i>
                    <input placeholder="trouver des services" id="input-Rechercher" type="text">
                    <button id="button-Rechercher">Rechercher</button>
                  </div>
                    
                </form>
            </div>
                <div class="nav_right">
                    <ul>
                        <li class="nr_li">
                            <!--<i class="fas fa-plus"></i>-->
                        </li>
                       
    
                        <?php
                    
                    if($_SESSION['admin']==1){
                    ?>
                   

                    <li class="nr_li">
                      <a href="../admin/Administration.php">  <i class="fas fa-user-shield"></i></a>
                    </li>
                    <?php
                    }

                    ?>
                        
                       
                        <li class="nr_li">
                            <i class="fas fa-envelope-open-text"></i>
                        </li>
                        
                        <li class="nr_li dd_main">
                  
    
                            <img class="image_profil"  src="<?php echo ($_SESSION['img']);?>" alt="profile_img">
                            
                            <div class="dd_menu">
                                <div class="dd_left">
                                    <ul>
                                        <li><i class="far fa-user"></i></li>
                                       <!-- <li><i class="fas fa-user-shield"></i></li>-->
                                        <li><i class="fas fa-bookmark"></i></li>
                                        
                                        <li><i class="fas fa-cog"></i></li>
                                        
                                        <li><i class="fas fa-sign-out-alt"></i></li>
                                    </ul>
                                </div>
                                <div class="dd_right">
                                    <ul>
                                       <a href="userProfil.php"> <li>Profil</li></a>   
                                      <!-- <a href="Administration.php"> <li>Administration</li></a>-->
                                       <a href=""> <li>Favorites</li> </a>               
                                       <a href=""> <li>Settings</li> </a>
                                       <a href=" http://localhost/PFFE/admin/deconnextion.php"><li>Deconnextion</li></a>      
                                        
                                    </ul>
                                </div>
                            </div>
                        </li>
                      
                    </ul>
                </div>
            </div>
        </div>	
    
          
        </header>
          
        <div class="cont">
        <div class="roww profil">
            <div class="col-md-3">
                <div class="profile-sideba">
                    <!-- SIDEBAR USERPIC -->
                    
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                   
                    <!-- END MENU -->

                    
                    <div class="card-block">
                                <div  class="user-image">
                                <img  src="<?php echo $_SESSION['img'];?>" id="photo">
                                    
                                </div>
                               
                               
                               
                                <h6 class="f-w-600 m-t-25 m-b-10"><?php echo ($_SESSION['user']); ?></h6>
                            
                            </div>
                               
                                <p class="text-muted">Membre depuis : <?php  echo $_SESSION['dat'];?></p>
                              
                            </div>
                        </div>
                  
            </div>
               

           
            <div class="page-wrapper bg-dark p-t-100 p-b-50">
        <div class="wrapper wrapper--w900">
            <div class=" card-6">
                <div class="card-heading">
                    <h2 class="title">Paramètres</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row">
                            <div class="name">votre e-mail</div>
                            <div class="value">
                                <input placeholder="<?php echo $_SESSION['pseudo'] ?>" class="input--style-6" type="email" name="full_name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">votre numéro de téléphone</div>
                            <div class="value">
                                <input placeholder="<?php echo $_SESSION['phone'] ?>" class="input--style-6" type="text" name="full_name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">changer le mot de passe</div>
                            <div class="value">
                                <input placeholder="nouveau mot de passe" class="input--style-6" type="text" name="full_name">
                                <span>Entrez une combinaison d'au moins six character .</span> <br>
                                <input placeholder="Confirmez le mot de passe" class="input--style-6" type="text" name="full_name">
                            </div>
                        </div>
                        <button class="btn_par" >modifier</button>
                      
                    </form>
                </div>
                <div class="card-heading">
                    <h2 class="title">aider</h2>
                </div>
                <form action="">
                <div class="form-row">
                    
                            <div class="name">Avec quoi as tu besoin d'aide?</div>
                            <div class="value">
                            <textarea class="textarea--style-6" name="message" placeholder="envoyez-nous un message"></textarea>
                            </div>
                        </div>
                        <button class="btn_par">envoyer</button>
                        </form>  
                        <br>
                         
                

                        
                <div class="form-row">
                    
                            <div class="name">DÉSACTIVATION DU COMPTE</div>
                            <button onclick="document.getElementById('con').style.display='block'" class="btn_par_des">Desactiver</button>
                        </div>
                        <div id="con" class="modal_condition">

                  
                  
                        <form action=" ">
                    <div class="display_condition">
                      <span onclick="document.getElementById('con').style.display='none';document.getElementById('new_admin').style.display='none'" class="close" title="Close Modal">×</span> 
                      <h3>Attention</h3>
                    <div class="condition" onscroll="myFunction()" id="myDIV">
                      
                     <p> L'ajout d'un nouvel administrateur peut entraîner des dangers !</p>
                      <ul>
                       <p> Le nouvel administrateur peut:</p>
                        <li>. Ajoute un nouvel admin .</li>
                        <li>. blocke un contacte .</li>
                        <li>. sepprime et ajoute un service .</li>
                        <li>. sepprime un offer .</li>
                        <li>. repondre aux message .</li>
                        Tout cela peut arriver sans votre consentement.
                      </ul>
                        <hr>
                        
    <div>
                        <input onchange="document.getElementById('block').disabled = !this.checked;" type="checkbox" id="scales" name="scales" value="scales">
                      <label for="scales">J'accepte et continuer.</label> <br>
      </div>
    </div>
     
      <button id="block" onclick="block()" disabled class="but_condition" name="confirme"> J'accepte</button>
                      </div>
                    
                     
                    
                </div>
                        
                        </form> 
            </div>
        </div>
    </div>

                  


                 



                  
                
          
       
     


  
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<!--<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>-->
<script src="../admin/Control-Administration.js"></script>
<script src="Control_profil.js"></script>
<script src="https://kit.fontawesome.com/6f2f9c8fbf.js" ></script>
</body>
</html>

<?php
}
?>