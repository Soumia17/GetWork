<?php
session_start();
if(!isset($_SESSION['pseudo'])){
    header('location:http://localhost/PFFE/login_System/regester.php');
}else{
include_once '../includes/database-linck.php';
$conn;
if(isset($_GET['seen'])){
    $req="UPDATE notification SET seen=1 where la_Persones ='".$_SESSION['pseudo']."'";
$res = mysqli_query($conn,$req);
}
    $ree=$_SESSION['user'];
    
   
    
  


        
        
       

        if(isset($_POST['NOsaveOff'])){
            
            $us=$_SESSION['user'];
            $fav=$_GET['fav'];
            
            $favfor=$_SESSION['user'];

           
            $rqFav="DELETE from favori where idFavori='".$fav."'";
            mysqli_query($conn,$rqFav);

        }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/Style_AccuiAdmin.css?v=<?php echo time(); ?>">
    <link rel="icon" href="../imageService/business-2684758__340.webp" type="image/x-icon">
    <link rel="stylesheet" href="../login_System/logoStyle.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>getWork</title>



</head>
<body>
    <header class="header">
  
    <div class="wrapper">
        <div class="navbar">
        <div class="logo">
        <img src="../imageService/business-2684758__340.webp" alt="">
                    <a href="../admin/Acceui_Admin.php">getWork</a>
                </div>
                <form class="example" action="http://localhost/PFFE/admin/Acceui_Admin.php" method="GET">
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
                      <a href="../admin/Administration.php" id="shield">entre à l'administration<i  class="fas fa-user-shield"></i></a>
                    </li>
                    <?php
                    }

                    ?>
                        <li class="nr_li not">
                        <div class="nutification" onclick="toggleNotifi()" >
                        <?php $not="SELECT * From notification where la_Persones ='".$_SESSION['pseudo']."' ";
                   $res_em=mysqli_query($conn,$not);
                   if(mysqli_num_rows($res_em)>0){
                   while($e=mysqli_fetch_assoc($res_em)){
                    $m=$e['seen'];
                   }}
                   if(mysqli_num_rows($res_em)>0){
                   if($m==0 ){
                   ?>
                   
                        <span class="badge"><?php echo mysqli_num_rows($res_em)?></span>
                        <?php
                   }} 
                        ?>
                   <img  src="../admin/images_Admin/bell-solid.svg" alt="" class="nutif" >
                   </div>
                  
                   <div class="notifi-box" id="box">
                  
			<h2>Notifications <span><?php echo mysqli_num_rows($res_em)?></span></h2>
            <?php  if(mysqli_num_rows($res_em)>0){
                     $not="SELECT * From notification where la_Persones ='".$_SESSION['pseudo']."' ";
                    $res_em=mysqli_query($conn,$not);
                   while($eml=mysqli_fetch_assoc($res_em)){
                       
                   ?>
			<div class="notifi-item">
				<img src="../admin/images_Admin/<?php echo $eml['icon'] ?>" alt="img">
				<div class="text">
				   <h4><?php echo $eml['Subject'] ?></h4>
				   <p><?php echo $eml['text'] ?></p>
			    </div> 
			</div>

		<?php  }}?>



			
			</div>
            </div>         

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
                                   <a href=""> <li>Favoris</li> </a>               
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
  <section style="hight=60vh;">
  <?php
$us=$_SESSION['pseudo'];

 $action="SELECT * FROM favori where saveforH ='$us'";
 $of = mysqli_query($conn,$action);
 
 if(mysqli_num_rows($of)>0){?>
 <div class="yourf">
  <h1>ma favorite</h1>
  <span>Organisez vos freelances et services préférés dans Vos Favoris auxquels vous pouvez facilement accéder et partager avec votre équipe.
</span>
</div>
  <?php
 }
?>
  </section>
 


  <section class="fav" id="">
            <div class="box-etoile">
                
<?php
$us=$_SESSION['pseudo'];

 $action="SELECT * FROM favori where saveforH ='$us'";
 $of = mysqli_query($conn,$action);
 
 if(mysqli_num_rows($of)>0){
while($B=mysqli_fetch_assoc($of)){
    $idoff=$B['idOffer'];
    $action="SELECT * FROM offers where idOffer='".$idoff."'";
    $offr = mysqli_query($conn,$action);
   
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
                $name=$info['psudo'];
                    }
                    ?>
                    <li> <img class="image_profil_etoile"  src="<?php echo $pho?>" alt="profile_img"></li>
                    <?php
                    if($_SESSION['pseudo']!=$g['OfferPoster']){
                    ?>
               <li> <a href="../user/userview.php?poster=<?php echo $g['OfferPoster']?>& idPOS=<?php echo $g['idOffer']?>"> <h3><?php echo $name?></h3></a></li>
               <?php
               }
               else{
               ?>
               
               <li> <a href="../user/userProfil.php"> <h3><?php echo $name?></h3></a></li>
               
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
                     
                        
                        <form action="favorites.php?fav=<?php echo $B['idFavori']?> " method="POST">
                        <li> <button name="NOsaveOff" ><i id="<?php echo $g['idOffer']?>" class="fas fa-bookmark red " ></i></button></li>
                        </form>

                        
                        <li>
                            le prix <label for=""><?php echo $g['OfferPrix']?> DZ</label>
                        </li>
                    </ul>
                </div>



                </div>

               <?php
 }}} else{
               ?>

<div class="yourf">
  <h1>Votre favoris est vide</h1>
  <span>Organisez vos freelances et services préférés dans Vos Favoris auxquels vous pouvez facilement accéder et partager avec votre équipe.
</span>
</div>

               

<?php 
}
?>
                
            
        

               

   </div>
</section>

</body>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script src="../admin/Control-Administration.js?V=<?php echo time()?>"></script>
</html>

<?php
} 
?>