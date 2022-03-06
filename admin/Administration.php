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
    <link rel="stylesheet" href="Style_Administration.css">
    <title>Document</title>
</head>
<body>   
        <header class="page-header">
          <nav>
            
            <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu">
              <i class="fas fa-bars"></i>
            </button>
            <ul class="admin-menu">
              <!--<a href="">LOGO</a>-->
              <center> <div class="left">
                <span class="greeting">Bonjour  <?php echo ($_SESSION['user']); ?></span>
                  <img class="image_profil"  src="<?php echo ($_SESSION['img']);?>" alt="profile_img">
                  </div></center>
              <li class="menu-heading">

                <h3>Admin</h3>
              </li>
              
                <li>
                  <a href="http://localhost/PFFE/admin/Administration.html">
                    
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
                 <!-- <span class="greeting">Bonjour  <?php //echo ($_SESSION['user']); ?></span>
                  <img class="image_profil"  src="<?php //echo ($_SESSION['img']);?>" alt="profile_img">-->
                  
              <div class="notifications">
               <!-- <span class="badge">1</span>-->
                <svg>
                  <use xlink:href="#users"></use>
                </svg>
              </div>
            </div>
          </section>
          <section class="grid">
       
            <article></article>
            <article></article>
            
          </section>
          <section class="etoile" id="etoile">
            <div class="box-etoile">

        <div class="box">
            <div class="image-etoile">
                <img src="images_Admin/images.jpg"alt="">
            </div>
            <div>
                <ul class="image_info">
                    <li> <img class="image_profil_etoile"  src="images_Admin/images.jpg" alt="profile_img"></li>
               <li>  <h3>je suis</h3></li>
     
             </ul>
            <p>blabla blablablaaaaaaaaabllllllaaa</p>                  
                    <div class="center">
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" value="5"/><label for="star5" class="full" title="Awesome"></label>
                            <input type="radio" id="star4.5" name="rating" value="4.5"/><label for="star4.5" class="half"></label>
                            <input type="radio" id="star4" name="rating" value="4"/><label for="star4" class="full"></label>
                            <input type="radio" id="star3.5" name="rating" value="3.5"/><label for="star3.5" class="half"></label>
                            <input type="radio" id="star3" name="rating" value="3"/><label for="star3" class="full"></label>
                            <input type="radio" id="star2.5" name="rating" value="2.5"/><label for="star2.5" class="half"></label>
                            <input type="radio" id="star2" name="rating" value="2"/><label for="star2" class="full"></label>
                            <input type="radio" id="star1.5" name="rating" value="1.5"/><label for="star1.5" class="half"></label>
                            <input type="radio" id="star1" name="rating" value="1"/><label for="star1" class="full"></label>
                            <input type="radio" id="star0.5" name="rating" value="0.5"/><label for="star0.5" class="half"></label>
                        </fieldset>
                    </div>
                </div>
  <hr>
                <div class="etoil-favorit">
                    <ul>
                        <li><i class="fas fa-bookmark" ></i></li>
                        <li>
                            le prix <label for="">1000 DZ</label>
                        </li>
                    </ul>
                  </div>
                 <hr>
                    <div class="button-delete">
                       
                        <button  id="but-1" class="openModal">supprimer l'offre</button>
                         <button id="but-2" class="openModal2">bloqué client</button>
                     </div>

                     <div class="modal">
                      <div class="modalContent">
                      <span class="close">×</span>
                      <p>Êtes-vous sûr de vouloir supprimer l'offre</p>
                     <a href=""> <button class="del" onclick="hideModal()">Supprimer</button></a>
                      <button class="cancel" onclick="hideModal()">Annuler</button>
                      </div>
                      </div>

                      <div class="modal2">
                        <div class="modalContent2">
                        <span class="close2">×</span>
                        <div class="select-box">
                          <div class="options-container">
                          

                  
                            <div class="option">
                              <input required type="radio" class="radio" id="travel" name="temps" />
                              <label for="travel">Un jour</label>
                            </div>
                  
                            <div class="option">
                              <input required type="radio" class="radio" id="sports" name="temps" />
                              <label for="sports">Une Semaine</label>
                            </div>
                  
                            <div class="option">
                              <input required type="radio" class="radio" id="news" name="temps" />
                              <label for="news">Un mois</label>
                            </div>
                  
                            <div class="option">
                              <input required type="radio" class="radio" id="tutorials" name="temps" />
                              <label for="tutorials">définitivement</label>
                            </div>
                          </div>
                  
                          <div class="selected">
                            Blocage d'utilisateurs pour :
                          </div>
                        </div>
                        <a href=""> <button class="del" onclick="hideModal2()">bloqué</button></a>
                        <button class="cancel" onclick="hideModal2()">Annuler</button>
                      </div>
                      
                        </div>
                        </div>

                      
                      
                  </div>
                </div>
                </section>
            
        </section>

</body>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script src="Control-Administration.js"></script>
<script src="Control_Admin.js"></script>
</html>