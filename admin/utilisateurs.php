<?php
session_start();
if(!isset($_SESSION['pseudo']) || ( $_SESSION['admin']!=1) ){
  header('location:http://localhost/PFFE/login_System/regester.php');
}else{
include_once 'includes/database-linck.php';
$conn;
$action="SELECT * FROM userinformation WHERE theadmin =2 and block =0";
$util=mysqli_query($conn,$action);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style_Administration.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="Style_Administrateur.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../login_System/logoStyle.css">
    <link rel="icon" href="../imageService/business-2684758__340.webp" type="image/x-icon">
    <title>getWork</title>
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
                  <img class="image_profil"  src=" ../user/<?php echo ($_SESSION['img']);?>" alt="profile_img">
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
            <div class="Admini">
            <h1>Administration</h1>
            </div>
                   <!-- <form action="GET">
                  <input type="search" placeholder="Chercher...">
                  <button type="submit" aria-label="submit form">
                    <i class="fas fa-search"></i>
                  </button>

                </form>-->
                
                <div class="admin-profile">
                 <!-- <span class="greeting">Bonjour  <?php //echo ($_SESSION['user']); ?></span>
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
                            <span><?php echo mysqli_num_rows($util)?></span><br>

                            <label for="">utilisateurs</label>
                        </div>
                        <div class="admin_num_2">
                           <img src="images_Admin/icons8-travailler-avec-un-ordinateur-portable-90.png" alt="">
                        </div>

                    </div>
                </article>
           
          </section>
         <section class="etoile" id="etoile">
            
           
<form  action="" method="GET">
<div class="search-box">
       
         <button name="onSub"  class="btn-search"><i class="fas fa-search"></i></button>
         
       <input type="search"  name="search" class="input-search" placeholder="Chercher un utilisateur...">
       
         
     </div>
     </form>
     <br>
     
     <div class="box-etoile">
            
            <?php
            $action="SELECT * FROM userinformation WHERE theadmin =2 and block =0";
            if(isset($_GET['search']) and !empty($_GET['search'])){
              $q = trim($_GET['search']);
              $action="SELECT * FROM userinformation WHERE theadmin =2 AND  block =0 and psudo LIKE '%".$q."%'  ";
            }
            $adm = mysqli_query($conn,$action);
            if(mysqli_num_rows($adm)>0){
            while($info=mysqli_fetch_assoc($adm)){
            ?>
              <div class="card">
                <div class="car-img">
                <img src="../user/<?php echo($info['image'])?>" alt="Avatar" style="width:100%">
                </div>
                <div class="card-container">
                 <a href="../user/usrVBA.php?poster=<?php echo $info['psudo']?>" target="_blank"> <h4><b><?php echo($info['psudo'])?></b></h4> </a>
                   
                </div>
                <button id="but_card" onclick="document.getElementById('<?php echo $info['psudo'] ?>').style.display='block'">bloqué utilisateur</button>

                <!-- <div id="<?php //echo $info['psudo'] ?>" class="modal">
                     
                     <div class="modalContent">
                     <span onclick="document.getElementById('<?php //echo $info['psudo'] ?>').style.display='none'" class="close">×</span>
                     <div class="icon-box">
                      <span>!</span>

                    
                   </div>	
                     <p>Êtes-vous sûr de vouloir blocker utilisateur</p>
                     
                     <a name="delet_ad" href="blockerutilisateur.php?blok_uti=<?php //echo $info['psudo']?>"><button   class="del" onclick="hideModal()">Supprimer</button></a>
                     
                     <button type="button"  class="cancel" onclick="hideModal()">Annuler</button>

                     </div> -->
                     <div id="<?php echo $info['psudo'] ?>" class="modal">
                     
                     <div class="modalContent">
                     <span onclick="document.getElementById('<?php echo $info['psudo'] ?>').style.display='none'" class="close">×</span>
                     <div class="icon">
          <i class="fas fa-exclamation"></i>
        </div>
                     <p>Êtes-vous sûr de vouloir bloqué utilisateur</p>
                     
                     <a name="delet_ad" href="blockerutilisateur.php?blok_uti=<?php echo $info['psudo']?>"><button   class="del" onclick="hideModal()">bloqué</button></a>
                    
                     <button type="button"  class="cancel" onclick="hideModal()">Annuler</button>
                     </div>
            </div>
                



              </div>
              <?php
              
            }}
            
            else {
            ?>
        <span class="noResult">aucun resultat trouver</span>
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