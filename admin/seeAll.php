<?php
session_start();
if(!isset($_SESSION['pseudo'])){
    header('location:http://localhost/PFFE/login_System/regester.php');
}else{
include_once 'includes/database-linck.php';
$conn;
// $action="SELECT * FROM userinformation WHERE email ='".$_SESSION['pseudo']."'";
//     $adm = mysqli_query($conn,$action);
//     while($info=mysqli_fetch_assoc($adm)){
// $admi=$info['Theadmin'];
// $_SESSION['user']=$info['psudo'];
// $_SESSION['img']=$info['image'];
// $_SESSION['dat']=$info['userDate'];
// $_SESSION['phone']=$info['phone'];

//     }

    $action="SELECT * FROM offers ORDER BY idOffer DESC ";
    if(isset($_GET['search']) and !empty($_GET['search'])){
        $q = htmlspecialchars($_GET['search']);
        
        $action="SELECT email FROM userinformation WHERE psudo LIKE '%".$q."%' ";
        $offr = mysqli_query($conn,$action);
        if(mysqli_num_rows($offr)>0){
            while($g=mysqli_fetch_assoc($offr)){
                $p=$g['email'];
            } 
            $action="SELECT * FROM offers WHERE OfferPoster='".$p."' OR OfferCategore LIKE '%".$q."%' ";
        }
        else{
            $action="SELECT * FROM offers WHERE OfferCategore LIKE '%".$q."%' ";
        }

       
        
        
       

      }
    
    $offr = mysqli_query($conn,$action);

    
        
       
        if(isset($_POST['saveOff'])){
           
            $fav=$_GET['fav'];
            
            $favfor=$_SESSION['pseudo'];
            $rqFav="INSERT INTO favori(idOffer,saveforH) VALUE('$fav','$favfor')";
            mysqli_query($conn,$rqFav);
            

        }
       

        if(isset($_POST['NOsaveOff'])){
            
          
            $fav=$_GET['fav'];
            

           
            $rqFav="DELETE from favori where idOffer='".$fav."'";
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
    <link rel="stylesheet" href="../login_System/logoStyle.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>getWork</title>



</head>
<body>
    <header class="header">
  
    <div class="wrapper">
        <div class="navbar">
        <div class="logo">
                    <a href="../admin/Acceui_Admin.php">getWork</a>
                </div>
            <!-- <div>
            <form action="">
                <div class="box-recherch">
              <i class="fa fa-search" aria-hidden="true"></i>
                <input name="search" placeholder="trouver des services" id="input-Rechercher" type="text">
                <button id="button-Rechercher">Rechercher</button>
              </div>
                
            </form>
        </div> -->
     
        <form class="example" action="">
  <input type="text" placeholder="quel service recherchez-vous aujourd'hui ?
" name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>



      
       
            <div class="nav_right">
                <ul>
                    <li class="nr_li">
                       <!-- <i class="fas fa-plus"></i>-->
                    </li>

                    <?php
                    
                    if($_SESSION['admin']==1){
                    ?>
                   

                    <li class="nr_li">
                      <a href="Administration.php" id="shield"> entre à l'administraction <i  class="fas fa-user-shield"></i></a>
                    </li>
                    <?php
                    }

                    ?>
                   
                    <!-- <li class="nr_li">
                        <i class="fas fa-envelope-open-text"></i>
                    </li> -->
                    
                    <li class="nr_li dd_main">
                    <?php
     /* $sql="SELECT * FROM userinformation";
      $resL = mysqli_query($conn,$sql);
      while($L=mysqli_fetch_assoc($resL)){
       $image= $L['image'];

      }*/
      
      ?>

<img class="image_profil"  src="../user/<?php echo ($_SESSION['img']);?>" alt="profile_img">
                        
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
                        <span><?php echo  $_SESSION['user'] ?></span>
                    </li>
                  
                </ul>
            </div>
        </div>
    </div>	

      
      
      
      
      
   
  </header>
 <section class="Bien_venu">
   
 <div class=slideshow>
<input name="slideshow" id=slide_img1 type="radio" class=slide>
<input name="slideshow" id=slide_img2 type="radio" class=slide>
<input name="slideshow" id=slide_img3 type="radio" class=slide>
<input name="slideshow" id=slide_img4 type="radio" class=slide> 
<input name="slideshow" id=play_img1 type="radio" checked>  
<input name="slideshow" id=pause_img1 type="radio" class=pause>
<input name="slideshow" id=pause_img2 type="radio" class=pause>
<input name="slideshow" id=pause_img3 type="radio" class=pause>
<input name="slideshow" id=pause_img4 type="radio" class=pause>
<ul>
<!-- <img class=cache src="1.jpg"> -->
<li class=img1>
    <div class="impp">
    <div class="imss"> Bienvenue à getWork </div>
   <div class="imss2"> Vous êtes à un pas de votre premier projet</div>
   </div>
<!-- <img src=https://www.achievers.com/wp-content/uploads/2020/03/03-18-20-2-1.jpg alt> -->
</li>
<li class=img2>
<!--<img src=codeur-outil-videos-animees.jpg alt>-->
</li>
<li class=img3>
<!-- <img src=codeur-outil-videos-animees.jpg alt> -->
</li>
<li class=img4>
<!-- <img src=codeur-outil-videos-animees.jpg alt> -->
</li>
</ul>

    </div>

    <div class="bien-v"><span>Bien venu <?php echo $_SESSION['user'] ?>,</span><p>Recevez des offres de vendeurs pour votre projet.
</p> </div>
 </section>


  <section class="etoile" id="etoile">
            <div class="box-etoile">
               <!-- <div class="Concerts"><h1>Concerts que vous pourriez aimer</h1></div> -->
<?php
if(mysqli_num_rows($offr)>0){
 while($g=mysqli_fetch_assoc($offr)){
    $ofstar="SELECT Eval FROM evaleuation WHERE  numoff='".$g['idOffer']."'";
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
                $name=$info['psudo'];
                
                    }
                    ?>
                    <li> <img class="image_profil_etoile"  src=" ../user/<?php  echo $pho?>" alt="profile_img"></li>
                    <?php
                    if($_SESSION['pseudo']!=$g['OfferPoster']){
                    ?>
               <li> <a href="../user/userview.php?idPOS=<?php echo $g['idOffer']?>"> <h3><?php echo $name?></h3></a></li>
               <?php
               }
               else{
               ?>
               
               <li> <a href="../user/userProfil.php"> <h3><?php echo $name?></h3></a></li>
               
               <?php
            }
               ?>
     
             </ul>
             <div class="description">
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
            <span>(<?php echo mysqli_num_rows($ofstar_run)?>)</span>
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
            <span>(<?php echo mysqli_num_rows($ofstar_run)?>)</span>
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
            <span>(<?php echo mysqli_num_rows($ofstar_run)?>)</span>
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
            <span>(<?php echo mysqli_num_rows($ofstar_run)?>)</span>
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
            <span>(<?php echo mysqli_num_rows($ofstar_run)?>)</span>
            
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
                        $us=$_SESSION['pseudo'];
                        //echo $us;
                        $S="SELECT * from favori where  saveforH ='$us' and idOffer='".$g['idOffer']."'";
                        $rqST=mysqli_query($conn,$S);
                       // echo mysqli_num_rows($rqST);
                     

                        if(mysqli_num_rows($rqST)==0){

                        ?>
                        <form action="Acceui_admin.php?fav=<?php echo $g['idOffer']?> " method="POST" id="myform">
                        <li> <button id="insert" name="saveOff" ><i id="<?php echo $g['idOffer']?>" class="fas fa-bookmark  " ></i></button></li>
                        </form>
                        <?php
                        }else{
                        ?>
                        <form action="Acceui_admin.php?fav=<?php echo $g['idOffer']?> " method="POST">
                        <li> <button type="submit" name="NOsaveOff" ><i id="<?php echo $g['idOffer']?>" class="fas fa-bookmark red " ></i></button></li>
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
 }}
 else{
     ?>
     <h1 class="noResult">aucun resultat trouver</h1>
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