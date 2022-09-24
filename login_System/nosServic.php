<?php
include_once 'includes/database-linck.php';
$conn;

if(isset($_GET['Sevice'])){
    $Sevice=$_GET['Sevice'];
    
}else{
    header("Location:../error.html"); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../imageService/business-2684758__340.webp" type="image/x-icon">
    <link rel="stylesheet" href="../login_System/logoStyle.css?v=<?php echo time();?>">
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

/* .LOGO{
    margin-left: -60px;
    position: relative;
} */
    </style>
</head>
<body>
<header class="header">
        <div class="logo">
        <img src="../imageService/business-2684758__340.webp" alt="">
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

<section class="nosServi">
    <?php
    
     $sql="SELECT * FROM services where serviceName='".$Sevice."'";
     $res = mysqli_query($conn,$sql);
     if(mysqli_num_rows($res)<1){
        header("Location:../error.html"); 
     }
     while($g=mysqli_fetch_assoc($res)){
         $serviceName=$g['serviceName'];
         $serviceDescription=$g['serviceDescription'];

     }
     
     if($Sevice=="Traduction"){
    ?>

<div class="addOfer">
    <?php
     }else if($Sevice=="Audio"){
    ?>
<div class="addOfer2">
    <?php
     } else  if($Sevice=="Design"){
    ?>
<div class="addOfer3">
    <?php
     } else 	
     if($Sevice=="Programmation"){
    ?>
<div class="addOfer4">
    <?php
    } else if($Sevice=="Affaires"){
    ?>
<div class="addOfer5">
    <?php
    } else{
    ?>
<div class="addOfer6">
    <?php 
    }
    ?>
          <div class="">
      
      </div>
      <div class="nouOfer">
     <h2><?php echo $serviceName?></h2>
     <span><?php echo $serviceDescription?> </span>
     </div> 
    <div>
    
    </div>
</div>
</section>

<section class="etoile" id="etoile">
            <div class="box-etoile">
               <!-- <div class="Concerts"><h1>Concerts que vous pourriez aimer</h1></div> -->
<?php
  $action="SELECT * FROM offers where 	OfferCategore ='".$serviceName."' ";
  $offr = mysqli_query($conn,$action);
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
                  
               
               <li> <a href="../login_System/Connexion.php?Slike=<?php echo $g['idOffer']?>"> <h3><?php echo $name?></h3></a></li>
               
               
     
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
</html>