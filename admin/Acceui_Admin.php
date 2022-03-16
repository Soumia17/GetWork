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

    
        
        
        if(isset($_POST['saveOff'])){
           
            $fav=$_GET['fav'];
            $favof=$_GET['favof'];
            $favfor=$_SESSION['user'];
            $rqFav="INSERT INTO favori(idOffer,saveof,saveforH) VALUE('$fav','$favof','$favfor')";
            mysqli_query($conn,$rqFav);
            

        }

        if(isset($_POST['NOsaveOff'])){
            
            $us=$_SESSION['user'];
            $fav=$_GET['fav'];
            $favof=$_GET['favof'];
            $favfor=$_SESSION['user'];

           
            $rqFav="DELETE from favori where idOffer='".$fav."' AND saveforH ='$us'";
            mysqli_query($conn,$rqFav);

        }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style_AccuiAdmin.css?v=<?php echo time(); ?>">
    <link rel="icon" href="https://img.icons8.com/nolan/64/workday.png" type="image/x-icon">

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
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
                                   <a href="../user/favorites.php"> <li>Favorites</li> </a>               
                                   <a href="../user/Parametres.php"> <li>Paramètres</li> </a>
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
    $ofstar="SELECT Eval FROM evaleuation WHERE EvalTo ='".$g['OfferPoster']."'";
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
                        <?php
                        //saveof='".$g['OfferPoster']."' AND
                        $us=$_SESSION['user'];
                        //echo $us;
                        $S="SELECT * from favori where saveof='".$g['OfferPoster']."' AND saveforH ='$us'";
                        $rqST=mysqli_query($conn,$S);
                       // echo mysqli_num_rows($rqST);
                        if(mysqli_num_rows($rqST)==0){

                        ?>
                        <form action="Acceui_admin.php?fav=<?php echo $g['idOffer']?>&favof=<?php echo $g['OfferPoster']?> " method="POST">
                        <li> <button name="saveOff" ><i id="<?php echo $g['idOffer']?>" class="fas fa-bookmark  " ></i></button></li>
                        </form>
                        <?php
                        }else{
                        ?>
                        <form action="Acceui_admin.php?fav=<?php echo $g['idOffer']?>&favof=<?php echo $g['OfferPoster']?> " method="POST">
                        <li> <button name="NOsaveOff" ><i id="<?php echo $g['idOffer']?>" class="fas fa-bookmark red " ></i></button></li>
                        </form>

                        <?php
                        }
                        ?>
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