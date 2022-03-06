<?php
session_start();
include_once 'includes/database-linck.php';
$conn;

$sql="SELECT * FROM services";
$res = mysqli_query($conn,$sql);
$del="";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style_Administration.css">
    <link rel="stylesheet" href="StyleService.css">
    

    <title>Document</title>
</head>
<body>  
  

<header class="page-header">


          <nav>
            
            <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu">
              <i class="fas fa-bars"></i>
            </button>
            <ul class="admin-menu">
            <center> <div class="left">
                <span class="greeting">Bonjour  <?php echo ($_SESSION['user']); ?></span>
                  <img class="image_profil"  src="<?php echo ($_SESSION['img']);?>" alt="profile_img">
                  </div></center>
              <li class="menu-heading">

                <h3>Admin</h3>
              </li>
              
                <li>
                  <a href="http://localhost/PFFE/admin/Administration.php">
                    
                    <i class="fas fa-home"></i>
                    
                    <span>Accueil</span>
                  </a>
                </li>
                <li>
                <a href="http://localhost/PFFE/admin/lesAdmin.php">
                  
                  <i class="fas fa-user-shield"></i>
                  
                  <span>Administrateurs</span>
                </a>
              </li>
              <li>
                <a href="http://localhost/PFFE/admin/utilisateurs.php">
                  <i class="fas fa-users"></i>
                  <span>utilisateurs</span>
                </a>
              </li>
              <li>
                <a href="http://localhost/PFFE/admin/Message.php">
                  <i class="far fa-comments"></i>
                  <span>Message</span>
                </a>
              </li>
              <li>
                <a href="http://localhost/PFFE/admin/services.php">
                  <i class="fas fa-briefcase"></i>
                  <span>Services</span>
                </a>
              </li>
             
             
              <li>
                <div class="switch">
                  <input type="checkbox" id="mode" checked>
                  <label for="mode">
                    <span></span>
                    <span>Dark</span>
                  </label>
                </div>
                <a href="http://localhost/PFFE/admin/Acceui_Admin.php">
                  
                  <i class="fas fa-sign-out-alt"></i>
                  <span>sortir de l'dministration</span>
                </a>
                <button class="collapse-btn" aria-expanded="true" aria-label="collapse menu">
                  <i class="fas fa-chevron-left"></i>
                  <span>Effondrer</span>
                </button>
              </li>
            </ul>
          </nav>
        </header>
        
        <section class="page-content">
          <section class="search-and-user">
                 <!-- <form action="GET">
                  <input type="search" placeholder="Chercher...">
                  <button type="submit" aria-label="submit form">
                    <i class="fas fa-search"></i>
                  </button>

                </form>-->
                
                <div class="admin-profile">
                  
                  
              <div class="notifications">
               <!-- <span class="badge">1</span>-->
                
              </div>
            </div>
           
          </section>
          <section class="Add_Service">
            <div class="but_Add_Service">
                <a href="#newService_Formulair" onclick="toggleMenu()"><i class="fas fa-plus"></i>ajoute un service</a>
      </div>
          </section>
          
  
          <section class="grid_SERVICE">

         
          <?php
           
            

           while($g=mysqli_fetch_assoc($res)){
               ?>
       
            <article>

                <div class="card">
                    <img src="<?php echo ($g['serviceIcon'])?>" alt="Avatar">
                    <div class="card-container">
                     <h4><b><?php echo ($g['serviceName'])?></b></h4>
                      <p><?php echo ($g['serviceDescription'])?>
                      </p> 
                    </div>
                    <button  id="but_card"  onclick="document.getElementById('<?php echo $g['id'] ?>').style.display='block'" > supprime le service</button>
                    


                    <div id="<?php echo $g['id'] ?>" class="modal">
                     
                     <div class="modalContent">
                     <span onclick="document.getElementById('<?php echo $g['id'] ?>').style.display='none'" class="close">×</span>
                     <div class="icon-box">
                      <span>!</span>
                    
                   </div>	
                     <p>Êtes-vous sûr de vouloir supprimer le service</p>
                     
                     <a name="delet" href="isertServis.php?del=<?php echo $g['id']?>"><button   class="del" onclick="hideModal()">Supprimer</button></a>
                    
                     <button type="button"  class="cancel" onclick="hideModal()">Annuler</button>
                     </div> 
                
            </article>

            
            <?php

           }
           
                 
         
            ?>
             
            
            
              
          </section>
                 
          <section id="newService_Formulair" class="newService_Formulair">
            
              
              <form id="enviar" action="isertServis.php" method="POST">

               
               
                <h2>Ajouter un nouveau service</h2>

               <center> <div class="alert" id="alert" >
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <span id="echoAlert"></span>
</div></center>
                    
                    
                        <label for="">le nom de sercice</label>
                        <input name="serviceName" id="customx" type="text" class="field" >
                        <span>Entrez un titre clair qui décrit le service. N'entrez pas de symboles ou de mots tels que « exclusivement », « pour la première fois », « pour un temps limité », etc.</span>
                        <br>
                        <label for="">Description du service</label>
                        <textarea id="textarea" name="serviceDescription" class="field"></textarea>
                        <span>Entrez une description précise du service qui inclut toutes les informations et conditions</span>
                        <br>
                        <label for="">Ajoute une image  .png</label>
                        <div class="drop-zone">
                            <span class="drop-zone__prompt">cliquez pour télécharger</span>
                            <input name="serviceIcon" id="fileUpload" type="file" name="myFile" class="drop-zone__input">
                          </div>

                          <button  name="save">sauver</button>
          
              </form>

           



          </section>
         
        </section>

</body>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script src="Control-Administration.js"></script>
<script src="Control_Admin.js"></script>
<script src="controlService.js"></script>
</html>