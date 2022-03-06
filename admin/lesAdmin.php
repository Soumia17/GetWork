<?php
session_start();
include_once 'includes/database-linck.php';
$conn;


?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="Style_Administration.css">
        <link rel="stylesheet" href="Style_Administrateur.css">
       
        
        

        
        <title>Document</title>
    </head>
    <body onload="document.getElementById('new_admin').style.display='block';" >   
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
                    <a href="http://localhost/PFFE/admin/Administrateurs.php">
                      
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
                  <!--
                  <span class="greeting">Bonjour  <?php// echo ($_SESSION['user']); ?></span>
                  <img class="image_profil"  src="<?php// echo ($_SESSION['img']);?>" alt="profile_img">-->
                  
                  <div class="notifications">
                   <!-- <span class="badge">1</span>-->
                    <svg>
                      <use xlink:href="#users"></use>
                    </svg>
                  </div>
                </div>
              </section>
              <section class="grid">
           
                <article>
                    <div class="admin_num">
                        <div class="admin_num_1"> 
                            <span>10</span><br>

                            <label for="">Admin</label>
                        </div>
                        <div class="admin_num_2">
                           <img src="images_Admin/admin-avec-roues-dentees.png" alt="">
                        </div>

                    </div>
                </article>
                <article>
                    <div class="admin_num">
                        <div class="admin_num_1"> 
                            <span>10</span><br>
                            
                            <label for="">en ligne</label>
                        </div>
                        <div class="admin_num_2">
                           <img src="images_Admin//cochez-le-cercle-interieur.png" alt="">
                        </div>

                    </div>
                </article>
                </section>
                <section class="Add_Service">
                   <!-- <div class="but_Add_Service">
                        <a href="#new_admin" onclick="document.getElementById('new_admin').style.display='block';document.getElementById('con').style.display='block'"><i class="fas fa-plus"></i>ajoute un admin</a>
              </div>-->
              <div class="but_Add_Service">
                        <a href="#new_admin" ><i class="fas fa-plus"></i>ajoute un admin</a>
              </div>
                  </section>

                <section class="etoile" id="etoile">
                    <div class="box-etoile">
                  <?php  
                  $searsh="SELECT * FROM admin ";
    $admin = mysqli_query($conn,$searsh);
   
    $action="SELECT * FROM userinformation WHERE email ='".$_SESSION['pseudo']."' ";
    $adm = mysqli_query($conn,$action);
    while($info=mysqli_fetch_assoc($adm)){
$admi=$info['Theadmin'];
//$_SESSION['user']=$info['psudo'];
//$_SESSION['img']=$info['image'];


    }
    
   
   while($infoAdmin=mysqli_fetch_assoc($admin)){?>
                    <div class="card">
                        <img src="<?php echo ($_SESSION['img']);?>" alt="Avatar" style="width:100%">
                        <div class="card-container">
                         <a href=""> <h4><b><?php echo ($infoAdmin["pseudoo"]);?></b></h4> </a>
                          <p> Admin de puis: <br>   <?php /*echo date("j, n, Y");*/ echo ($infoAdmin["adminDate"]);?> </p>
                          <p> Ajouter par: <br>   <?php /*echo date("j, n, Y");*/ echo ($infoAdmin["addBy"]);?> </p>
                          
                        </div>
                        <?php
                        if($admi==0 && $infoAdmin["pseudoo"]!=$_SESSION['user'] ){
                        ?>
                        <button class="but_admin_delet" onclick="document.getElementById('<?php echo $infoAdmin['pseudoo'] ?>').style.display='block'" >Retirer</button>
                        <?php
                        }
                        else
                        
                        {
                          ?>
                        <button class="but_admin_delet"  disabled >Retirer</button>
                        
                        <?php

                        


                        }
                        ?>

                        
                        </div>
                        <div id="<?php echo $infoAdmin["pseudoo"] ?>" class="modal">
                     
                     <div class="modalContent">
                     <span onclick="document.getElementById('<?php echo $infoAdmin['pseudoo'] ?>').style.display='none'" class="close">×</span>
                     <div class="icon-box">
                      <span>!</span>
                    
                   </div>	
                     <p>Êtes-vous sûr de vouloir retirer ladmin</p>
                     
                     <a name="delet_ad" href="delet_Adm.php?del_ad=<?php echo $infoAdmin["pseudoo"]?>"><button   class="del" onclick="hideModal()">Supprimer</button></a>
                     
                     <button type="button"  class="cancel" onclick="hideModal()">Annuler</button>
                     </div>
                      </div>

                        
                        <?php
                       }
                    ?>
                    </div>
                </section>
                

               <!-- <div id="con" class="modal_condition">

                  
                  
                   
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
                        
    
                        <input onchange="document.getElementById('block').disabled = !this.checked;" type="checkbox" id="scales" name="scales"
              value="Scales">
      <label for="scales">J'accepte et continuer.</label> <br>
      
    </div>
     
      <button id="block" onclick="block()" disabled class="but_condition"> J'accepte</button>
                      </div>
                    
                     
                    
                </div>-->

                

               

             
       
                  
                    

               <section id="new_admin" >
               <?php if($admi==0){
                        ?>
                        
               <div id="con" class="modal_condi">

                  
                  
                   
<div class="display_condi">
  
  <h3>Attention</h3>
<div class="condi" onscroll="myFunction()" id="myDIV">
  
 <p> L'ajout d'un nouvel administrateur peut entraîner des dangers !</p>
  <ul>
   <p> Le nouvel administrateur peut:</p>
    <li>. Ajoute un nouvel admin .</li>
    <li>. blocke un contacte .</li>
    <li>. sepprime et ajoute un service .</li>
    <li>. sepprime un offer .</li>
    <li>. repondre aux message .</li>
   <span> Tout cela peut arriver sans votre consentement.</span>
  </ul>
  </div>
  </div>
  </div>
  <?php
               }
  ?>
               <label for="">Rechercher un utilisateur :</label>
<form  action="lesAdmin.php" method="GET">
<div class="search-box">
       
         <button name="onSub"  class="btn-search"><i class="fas fa-search"></i></button>
         
       <input type="search"  name="search" class="input-search" placeholder="Type to Search...">
       
         
     </div>
     </form>

     <div class="box-etoile">
       <?php
      if(isset($_GET['search'])){
        $resu=$_GET['search'];
        $searsh="SELECT * FROM userinformation WHERE psudo LIKE '%$resu%'";
        $res = mysqli_query($conn,$searsh);
      
      if(mysqli_num_rows($res)>0){


        while($infoAdmin=mysqli_fetch_assoc($res)){?>
                 
                    <div class="card">
                      
                        <img src="<?php echo($infoAdmin["image"]) ?>" alt="Avatar" style="width:100%">
                        <div class="card-container">
                         <a href=""> <h4><b><?php echo($infoAdmin["psudo"]) ?> </b></h4> </a>
                          <p> <br>   <?php /*echo date("j, n, Y");*/ ?> </p>
                          
                        </div>
                       <a name="Add_Admin" href="addAdmin.php?newAD=<?php echo $infoAdmin["psudo"]?>"> <button id="but_admin" name="Add_Admin"  class="openModal2">Ajoute comme un admin</button></a>

                        </div>
                     
               
              </div>
                        <?php
       }}
      
      else{
        ?>
        <span class="noResult">aucun resultat trouver</span>
        <?php
      }
      }
       


                        ?>
 
                    </div>
    
                            <hr>

                            <label for="">cree un copmte administrateur :</label>


                             
                            <form action="http://localhost/PFFE/admin/newAdmin.php" method="POST">
                                <div class="user-details">
                                  <div class="input-box">
                                    <span class="details">Nom</span>
                                    <input type="text" name="nom"  required>
                                  </div>
                                  <div class="input-box">
                                    <span class="details"> Prenom</span>
                                    <input type="text" name="prenom" required>
                                  </div>
                                  <div class="input-box">
                                    <span class="details">pseudo</span>
                                    <input type="text" name="userName" required>
                                  </div>
                                  <div class="input-box">
                                    <span class="details">email</span>
                                    <input type="email" name="email"  required>
                                  </div>
                                  <div class="input-box">
                                    <span class="details">mote de passe</span>
                                   
                                    <input type="password" name="password" id="password"  required>
                                    <i class="password-toggle far fa-eye-slash" id="password-toggle" onclick="passwordToggle()"></i>
                                  </div>
                                  <div class="input-box">
                                    <span class="details"> confirme le mote de passe</span>
                                    <input type="password" id="Cpassword"  required>
                                    <i class="password-toggle far fa-eye-slash" id="Cpassword-toggle" onclick="CpasswordToggle()"></i>
                                    
                                  </div>
                                </div>
                               
                                <div class="button">
                                  <input type="submit" value="Register">
                                </div>
                              </form>

           

                


                

            

                


                
                
               
             
               </section>
                    
                
              </section>
              
    
    </body>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="Control-Administration.js"></script>
    <script src="Control_Admin.js"></script>
    <script src="/login_System/testRegester.js"></script>
    <script src="contol_lesAdmin.js"></script>
   
    </html>
