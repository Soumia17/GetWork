<?php
session_start();
if(!isset($_SESSION['pseudo'])){
    header('location:http://localhost/PFFE/login_System/regester.php');
}else{
include_once 'includes/database-linck.php';
$conn;
$action="SELECT * FROM userinformation WHERE email ='".$_SESSION['pseudo']."'";
    $adm = mysqli_query($conn,$action);
    while($info=mysqli_fetch_assoc($adm)){
$admi=$info['Theadmin'];
$_SESSION['user']=$info['psudo'];
$_SESSION['img']=$info['image'];
$_SESSION['dat']=$info['userDate'];
$_SESSION['phone']=$info['phone'];

    }

    $action="SELECT * FROM offers ORDER BY idOffer DESC ";
    $offr = mysqli_query($conn,$action);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style_AccuiAdmin.css?v=<?php echo time(); ?>">
    <link rel="icon" href="https://img.icons8.com/nolan/64/workday.png" type="image/x-icon">
    <title>Document</title>



</head>
<body>
    <header class="header">
  
    <div class="wrapper">
        <div class="navbar">
            <div class="logo">
                <a href="#">LOGO</a>
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
                       <!-- <i class="fas fa-plus"></i>-->
                    </li>

                    <?php
                    
                    if($_SESSION['admin']==1){
                    ?>
                   

                    <li class="nr_li">
                      <a href="Administration.php" id="shield">  <i  class="fas fa-user-shield"></i></a>
                    </li>
                    <?php
                    }

                    ?>
                   
                    <li class="nr_li">
                        <i class="fas fa-envelope-open-text"></i>
                    </li>
                    
                    <li class="nr_li dd_main">
                    <?php
     /* $sql="SELECT * FROM userinformation";
      $resL = mysqli_query($conn,$sql);
      while($L=mysqli_fetch_assoc($resL)){
       $image= $L['image'];

      }*/
      ?>

                        <img class="image_profil"  src="<?php echo $_SESSION['img']?>" alt="profile_img">
                        
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
                                   <a href="../user/userProfil.php"> <li>Profil</li></a>   
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
  <section class="Bien_venu">
      <div class="service_i_bien">
      <div class="bien">

         <center> <h2>Bienvenu <?php echo ($_SESSION['user']);?> <span></span></h2>
          </center>
      </div>
      <div class="services_bien">
      <?php
      $sql="SELECT * FROM services";
      $res = mysqli_query($conn,$sql);
      while($g=mysqli_fetch_assoc($res)){
      ?>
      
          <a href=""><div class="service_i">
              <img src="<?php echo ($g['serviceIcon'])?>" alt="">
    
       
        <hr>
        <span><?php echo ($g['serviceName'])?></span>
    </div></a>
    <?php
      }
    ?>
    

    </dive>

  </section>


  <section class="etoile" id="etoile">
            <div class="box-etoile">
<?php
 while($g=mysqli_fetch_assoc($offr)){
?>
        <div class="box">
            <div class="image-etoile">
                <img src="<?php echo "../imageService/".$g['OfferImage'] ?>"alt="">
            </div>
            <div>
                <ul class="image_info">
                    <?php
                    $action="SELECT * FROM userinformation WHERE psudo ='".$g['OfferPoster']."' ";
                    $adm = mysqli_query($conn,$action);
                    while($info=mysqli_fetch_assoc($adm)){
                $pho=$info['image'];
                
                    }
                    ?>
                    <li> <img class="image_profil_etoile"  src="<?php echo $pho?>" alt="profile_img"></li>
                    <?php
                    if($_SESSION['user']!=$g['OfferPoster']){
                    ?>
               <li> <a href="../user/userview.php?poster=<?php echo $g['OfferPoster']?>& idPOS=<?php echo $g['idOffer']?>"> <h3><?php echo $g['OfferPoster']?></h3></a></li>
               <?php
               }
               else{
               ?>
               
               <li> <a href="../user/userProfil.php"> <h3><?php echo $g['OfferPoster']?></h3></a></li>
               
               <?php
            }
               ?>
     
             </ul>
            <p><?php echo $g['OfferDescription']?></p>

            
                
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
                            le prix <label for=""><?php echo $g['OfferPrix']?> DZ</label>
                        </li>
                    </ul>
                </div>



                </div>

               <?php
 }
               ?>


                
            
        

               

   </div>
</section>

</body>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script src="Control-Administration.js"></script>
</html>

<?php
} 
?>