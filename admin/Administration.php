<?php
session_start();
if(!isset($_SESSION['pseudo'])){
  header('location:http://localhost/PFFE/login_System/regester.php');
}else{
include_once 'includes/database-linck.php';
$conn;
$action="SELECT * FROM offers ORDER BY idOffer DESC ";
    $offr = mysqli_query($conn,$action);
    $action="SELECT * FROM userinformation WHERE email ='".$_SESSION['pseudo']."' ";
                    $adm = mysqli_query($conn,$action);
                    while($info=mysqli_fetch_assoc($adm)){
                
                $_SESSION['admn']=$info['Theadmin'];
                
                
                    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style_Administration.css?v=<?php echo time(); ?>">
    <link rel="icon" href="https://img.icons8.com/nolan/64/workday.png" type="image/x-icon">
    <title>Document</title>
    <link rel="stylesheet" href="../login_System/logoStyle.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
              <span class="greeting">Administration</span><br>
                <span class="greeting">Bonjour  <?php echo ($_SESSION['user']); ?></span>
                  <img class="image_profil"  src="../user/<?php echo ($_SESSION['img']);?>" alt="profile_img">
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
                <?php
                if ($_SESSION['admn']==0) {
                  
                
                ?>
                <li>
                <a href="http://localhost/PFFE/admin/lesAdmin.php">
                  
                  <i class="fas fa-user-shield"></i>
                  
                  <span>Administrateurs</span>
                </a>
              </li>
              <?php
              }
              ?>
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
       
            <!-- <article></article> -->
            <article>
                    <div class="admin_num">
                        <div class="admin_num_1"> 
                            <span><?php echo mysqli_num_rows($offr)?></span><br>

                            <label for="">Offres</label>
                        </div>
                        <div class="admin_num_2">
                           <img src="images_Admin/icons8-travailler-avec-un-ordinateur-portable-90.png" alt="">
                        </div>

                    </div>
                </article>
            
          </section>
          <section class="etoile" id="etoile">
            <div class="box-etoile">
            <?php
 while($g=mysqli_fetch_assoc($offr)){
  $ofstar="SELECT Eval FROM evaleuation WHERE  numoff ='".$g['idOffer']."'";
  $ofstar_run=mysqli_query($conn,$ofstar);
  if(mysqli_num_rows($ofstar_run)>0){
  $w=$t=$th=$f=$fi=$max=0;
  while($star=mysqli_fetch_assoc($ofstar_run)){
      if($star['Eval']==1)
      $w=$w+1;
      else
      if($star['Eval']==2)
      $t=$t+1;
      else
      if($star['Eval']==3)
      $th=$th+1;
      else
      if($star['Eval']==4)
      $f=$f+1;
      else
      if($star['Eval']==5)
      $fi=$fi+1;



  } 
  if($w>=$t && $w>=$th && $w>=$f && $w>=$fi){
      $max=1;
  }
   else if($t>=$w && $t>=$th && $t>=$f && $t>=$fi){
      $max=2;
  }
 else if($th>=$t && $th>=$w && $th>=$f && $th>=$fi){
      $max=3;
  }
  else if($f>=$t && $f>=$th && $f>=$w && $f>=$fi){
      $max=4;
  }
  else if($fi>=$t && $fi>=$th && $fi>=$w && $fi>=$w){
      $max=5;
  }
}
else
$max=0;   

?>
        <div class="box">
            <div class="image-etoile">
                <img src="<?php echo "../user/".$g['OfferImage'] ?>"alt="">
            </div>
            
            <div>
                <ul class="image_info">
                <?php
                    $action="SELECT * FROM userinformation WHERE email ='".$g['OfferPoster']."' ";
                    $adm = mysqli_query($conn,$action);
                    while($info=mysqli_fetch_assoc($adm)){
                $pho=$info['image'];
                $Theadmin=$info['Theadmin'];
                $poster=$info['psudo'];
                
                    }
                    ?>
                    <li> <img class="image_profil_etoile"  src="../user/<?php echo $pho?>" alt="profile_img"></li>
                    <?php
                    if($_SESSION['pseudo']!=$g['OfferPoster']){
                    ?>
               <li> <a href="../user/usrVBA.php?poster=<?php echo $poster?>& idPOS=<?php echo $g['idOffer']?>" target="_blank"> <h3><?php echo $poster?></h3></a></li>
               <?php
               }
               else{
               ?>
               
               <li> <a href="../user/userProfil.php" target="_blank"> <h3><?php echo $poster?></h3></a></li>
               
               <?php
            }
               ?>
     
             </ul>
             <div class="OfferDescription">
            <p><?php echo $g['OfferDescription']?></p> 
            </div>                
                    <div class="center">
                    <?php
                    if($max==0){
                    ?>
                        
                    <div class="stars">
            <i class="lar la-star " data-value="1"></i>
            <i class="lar la-star " data-value="2"></i>
            <i class="lar la-star " data-value="3"></i>
            <i class="lar la-star" data-value="4"></i>
            <i class="lar la-star" data-value="5"></i>
        </div>
        <?php
        } else if($max==1){
        ?>
                <div class="stars">
            <i class="lar la-star star" data-value="1"></i>
            <i class="lar la-star " data-value="2"></i>
            <i class="lar la-star " data-value="3"></i>
            <i class="lar la-star" data-value="4"></i>
            <i class="lar la-star" data-value="5"></i>
        </div>
        <?php
        } else if($max==2){
        ?>
                <div class="stars">
            <i class="lar la-star star" data-value="1"></i>
            <i class="lar la-star star" data-value="2"></i>
            <i class="lar la-star " data-value="3"></i>
            <i class="lar la-star" data-value="4"></i>
            <i class="lar la-star" data-value="5"></i>
        </div>
        <?php
        } else if($max==3){
        ?>
                <div class="stars">
            <i class="lar la-star star" data-value="1"></i>
            <i class="lar la-star star" data-value="2"></i>
            <i class="lar la-star star" data-value="3"></i>
            <i class="lar la-star" data-value="4"></i>
            <i class="lar la-star" data-value="5"></i>
        </div>
        <?php
        } else if($max==4){
        ?>
                <div class="stars">
            <i class="lar la-star star" data-value="1"></i>
            <i class="lar la-star star" data-value="2"></i>
            <i class="lar la-star star" data-value="3"></i>
            <i class="lar la-star star" data-value="4"></i>
            <i class="lar la-star" data-value="5"></i>
        </div>
        <?php
        } else if($max==5){
        ?>
                <div class="stars">
            <i class="lar la-star star" data-value="1"></i>
            <i class="lar la-star star" data-value="2"></i>
            <i class="lar la-star star" data-value="3"></i>
            <i class="lar la-star star" data-value="4"></i>
            <i class="lar la-star star" data-value="5"></i>
        </div>
        <?php
        } 
        ?>
       
                    </div>
                </div>
  <hr>
  <div class="etoil-favorit">
                    <ul>
                        
                        <li>
                          <div class="prix">
                            le prix <label for=""><?php echo $g['OfferPrix']?> DZ</label>
                            </div>
                          </li>
                    </ul>
                </div>
                 <hr>
                 <?php
                 if($Theadmin!=0 && $_SESSION['pseudo']!=$g['OfferPoster'] ){
                 ?>
                    <div class="button-delete">
                       
                        <button onclick="document.getElementById('<?php echo $g['idOffer'] ?>').style.display='block'"  class="but-1">supprimer l'offre</button>
                         <button onclick="document.getElementById('<?php echo $g['idOffer'] ?>h').style.display='block'" class="but-2">bloqué client</button>
                     </div>

                     <?php
                     }else{           
                     ?>
                     <div class="button-delete">
                       
                       <button disabled onclick="document.getElementById('<?php echo $g['idOffer'] ?>').style.display='block'"  class="but-1">supprimer l'offre</button>
                        <button disabled onclick="document.getElementById('<?php echo $g['idOffer'] ?>h').style.display='block'" class="but-2">bloqué client</button>
                    </div>
                    <?php
                     }
                    ?>



                    

                     <!-- <div class="modal">
                      <div class="modalContent">
                      <span class="close">×</span>
                      <p>Êtes-vous sûr de vouloir supprimer l'offre</p>
                     <a href=""> <button class="del" onclick="hideModal()">Supprimer</button></a>
                      <button class="cancel" onclick="hideModal()">Annuler</button>
                      </div>
                      </div> -->

                    <!--  <div class="modal2">
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
                        </div>-->

                      
                      
                  </div>

                  <div id="<?php echo $g['idOffer'] ?>" class="modal">
                     
                     <div class="modalContent">
                     <span onclick="document.getElementById('<?php echo $g['idOffer'] ?>').style.display='none'" class="close">×</span>
                     <div class="icon">
          <i class="fas fa-exclamation"></i>
        </div>	
        <br>
                     <p>Êtes-vous sûr de vouloir supprimer loffre</p>
                     
                     <a name="delet_ad" href="offreDel.php?offreDel=<?php echo $g['idOffer']?>"><button   class="del" onclick="hideModal()">Supprimer</button></a>
                     
                     <button type="button"  class="cancel" onclick="document.getElementById('<?php echo $g['idOffer'] ?>').style.display='none'">Annuler</button>
                     </div>
                      </div>

                      <div id="<?php echo $g['idOffer'] ?>h" class="modal">
                     
                     <div class="modalContent">
                     <span onclick="document.getElementById('<?php echo $g['idOffer'] ?>h').style.display='none'" class="close">×</span>
                     <div class="icon">
          <i class="fas fa-exclamation"></i>
        </div>	
        <br>	
                     <p>Êtes-vous sûr de vouloir blocker utilisateur</p>
                     
                     <a name="delet_ad" href="blockUtil.php?blockUtil=<?php echo $g['OfferPoster']?>"><button   class="del" onclick="hideModal()">Blocker</button></a>
                     
                     <button type="button"  class="cancel" onclick="document.getElementById('<?php echo $g['idOffer'] ?>h').style.display='none'">Annuler</button>
                     </div>
                      </div>

                 

                  <?php
 }
            ?>

            
                </div>
                </section>
            
        </section>

</body>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script src="Control-Administration.js"></script>
<script src="Control_Admin.js"></script>
</html>

<?php
}
?>