<?php
include_once 'includes/database-linck.php';
$conn;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imageService/business-2684758__340.webp" type="image/x-icon">
    <link rel="stylesheet" href="../login_System/logoStyle.css?V=<?php echo time();?>">
    <link rel="stylesheet" href=".css">
    <link rel="stylesheet" href="../admin/Style_Administrateur.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../admin/Style_AccuiAdmin.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title>getWork</title>
    <style>
        .header{
    position: fixed;
    top: 0%;
    left: 0%;
    padding: 0px 0px 0px;
    width: 100%;
    z-index: 1;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    transition: 0.5s;
    box-shadow:10px 5px 5px cornflowerblue ;
    border: 1px solid cornflowerblue;
    height: 70px;
    background-color: white;
    
    
    
}

.navba{
    display: flex;
    position: relative;
    left: 9%;
    
}
.navba li{
    list-style: none;
}
.navba a{
    color: #fff;
    text-decoration: none;
    margin-left: 30px;
    font-weight: 700;
}
  
 .btn-Connexion{
    padding: 6px 40px; 
   
   text-transform:uppercase ;
   border: 1px solid #8a068f;
   border-radius: 6px;
   position: relative;
   height: 40px;
   background-color:#8a068f ;
   right: 10px;
  
   font-size: 15px;
   
}



.btn-Connexion-conex{
    padding: 6px 40px ; 
    
   text-transform:uppercase ;
   border: 1px solid #8a068f;
   border-radius: 6px;
   position: relative;
   background:#8a068f ;
   

}
/* .hitrou{
    width: 100%;
    background-color: #00b9eb;
   
    
    
} */

/* .LOGO{
    margin-left: -60px;
    position: relative;
} */
    </style>
</head>
<body>
<header class="header">
        <div class="logo">
            <a href="../login_System/accueil.php">getWork</a>
        </div>
        <div class="search-box">
       
        <form action="searchR.php" method="GET">
      <button name="onSub"  class="btn-search"><i class="fas fa-search"></i></button>
      
    <input type="search"  name="search" class="input-search" placeholder="Type to Search...">
    </form>
      
  </div>
        <ul class="navba">
          
          <a href=" http://localhost/PFFE/login_System/regester.php" class="btn-Connexion-conex" id="">S'inscrire  </a>
          <a href="Connexion.php " class="btn-Connexion" id="btn-Connexion"> Connexion</a>
         
        </ul>
          
          
          
          
          
       
      </header>
      <br><br><br><br>
<section class="etoile" id="etoile">
 
  <?php $servic= "SELECT serviceName FROM services" ;
   if((isset($_GET['search']) and !empty($_GET['search']))|| isset($_GET['Sevice']) ){
   
if(isset($_GET['Sevice'])){
    $string = trim($_GET['Sevice']);
    $action="SELECT * FROM offers WHERE OfferCategore LIKE '%". $string."%' ";
    $q=$_GET['Sevice'];
}else{
  
    $q = trim($_GET['search']);
    
    $action="SELECT email FROM userinformation WHERE psudo LIKE '%".$q."%' ";
    $offr = mysqli_query($conn,$action);
    if(mysqli_num_rows($offr)>0){
        while($g=mysqli_fetch_assoc($offr)){
            $p=$g['email'];
        } 
        $action="SELECT * FROM offers WHERE OfferPoster='".$p."' OR OfferCategore LIKE '%".$q."%' ";
    }
    else{
        $action="SELECT * FROM offers WHERE OfferCategore LIKE '%".$q."%' OR OfferDescription LIKE '%".$q."%' ";
    }

}
    

    $offr = mysqli_query($conn,$action);
    if(mysqli_num_rows($offr)>0){
        ?>
        <div class="hitrou">
    <h2 class="search-message-empty-message trou ">
    resultat trouver pour "<?php echo $q?>" 
    </h2>
    </div>
    <div class="box-etoile">
     <?php
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
                 
                    <a href="Connexion.php?Slike=<?php echo $g['idOffer'] ?>">
               <li> <h3><?php echo $name?></h3></li>
               </a>
             
     
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
                            le prix <label for=""><?php echo $g['OfferPrix']?> DZ</label>
                        </li>
                    </ul>
                </div>



                </div>

               <?php
  }}else{
 
      
?>

<div class="search-message-empty-container">
  <span class="search-message-empty-decal">
    <span class="search-message-empty-decal-eyes">:</span>
    <span>(</span>
  </span>
  <h2 class="search-message-empty-message">
    <?php if (isset($_GET['Sevice'])) {
      ?>
       Aucun resultat trouver pour "<?php echo $_GET['Sevice']?>" .
      <?php
    }else{
    
    ?>
 Aucun resultat trouver pour "<?php echo $_GET['search']?>" .
    <?php
    }
    ?>
  
  </h2>
</div>

</div>
<div class="verif">
  <span>Veuillez vérifier l'orthographe, essayez un terme de recherche plus générique ou essayez d'autres termes de recherche.</span>
  <div class="hrr"><hr ></div>
</section>
<section class="util">
<h2 >vous pourriez aussi trouver cela utile  </h2>
<span>Vous cherchez les offres de type :</span>
<div class="autreTy"><a href="?Sevice=Autre" >vous chercher un autre type ></a></div>
<div class="box-etoil">
      <?php
      $sql="SELECT * FROM services";
      $res = mysqli_query($conn,$sql);
      while($g=mysqli_fetch_assoc($res)){
        if($g['serviceName']!="Autre"){
      ?>
       <a href="../login_System/nosServic.php?Sevice=<?php echo $g['serviceName']?>">
      <div class="ser">
      <a href="?Sevice=<?php echo $g['serviceName']?>">
        <div class="service_i">
              <img  src="../admin/<?php echo ($g['serviceIcon'])?>" alt="hiii">
    
       
        <hr>
        <span><?php echo ($g['serviceName'])?></span>
        </div>
        </a>
    </div>
    </a>
    <?php
      }}
    ?>
    

    </div>

<?php
  }
 ?>
 </div>
 <?php
  }else{


?>
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
<div class="seeAll"><a href="../admin/seeAll.php" target="_blank">regarder tout nos offres ></a></div>
<?php
         $Rservice=mysqli_query($conn,$servic);
          while($S=mysqli_fetch_assoc($Rservice)){

            $NOMser=$S['serviceName'];

        //   $action="SELECT * FROM offers ORDER BY idOffer DESC ";
        $action="SELECT * FROM offers where OfferCategore='".$NOMser."' LIMIT 4";
        $offr = mysqli_query($conn,$action);
          if(mysqli_num_rows($offr)>0){
              ?>
              
              <div class="echoService"> <span ><?php echo $NOMser?></span></div>
<div class="box-etoile">
            
            
<?php

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

     ?>
     <!-- <h1 class="noResult">aucun resultat trouver</h1> -->
     <?php

               ?>


                
            
        

               

   </div>
   <?php
          }
  }
   ?>
</section>
</body>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</html>