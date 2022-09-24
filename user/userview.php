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
// $Poster=$_GET['poster'];

/*$_SESSION['Poster']=$_GET['poster'];
$_SESSION['offerid']=$_GET['idPOS'];
$Poster=$_SESSION['Poster'];
$offerid=$_SESSION['offerid'];*/
if(!empty($_GET['idPOS'])){
$offerid=$_GET['idPOS'];
$post="SELECT * FROM offers WHERE idOffer ='".$offerid."'";
            $post_run=mysqli_query($conn,$post);
            while($infoPO=mysqli_fetch_assoc($post_run)){
                $Poster= $infoPO['OfferPoster'];
            }
if(!empty($_POST['rating'])&& isset($_POST['yes'])){
    $eval=$_POST['rating'];
    $evalTo=$_SESSION['post'];
    $evalFrom=$_SESSION['pseudo'];
    
    $ins="INSERT INTO evaleuation(Eval,EvalFrom,numoff)VALUE('$eval','$evalFrom','$offerid')";
    $insr=mysqli_query($conn,$ins);}
$Offer="SELECT * FROM offers WHERE idOffer ='".$offerid."'";
            $Offer_run=mysqli_query($conn,$Offer);
$userInfo="SELECT * FROM userinformation WHERE email ='".$Poster."'";
            $userInfo_run=mysqli_query($conn,$userInfo);   
            while($info=mysqli_fetch_assoc($userInfo_run)){
                $pho=$info['image'];
                $psudo=$info['psudo'];
                $email=$info['email'];
                $phone=$info['phone'];
                $date=$info['userDate'];
                
                    }   
                    $_SESSION['post']=$email;
                    
                    $ofnum="SELECT * FROM offers WHERE OfferPoster ='".$Poster."'";
            $ofnum_run=mysqli_query($conn,$ofnum); 
           

            $ofstar="SELECT Eval FROM evaleuation WHERE  numoff='".$offerid."' " ;
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../admin/Style_AccuiAdmin.css?v=<?php echo time(); ?>">
   <!-- <link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="style_profil.css?v=<?php echo time(); ?>">
    <!-- <link rel="stylesheet" href="../admin/StyleService.css?v=<?php echo time(); ?>"> -->
    <link rel="icon" href="../imageService/business-2684758__340.webp" type="image/x-icon">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../login_System/logoStyle.css?v=<?php echo time();?>">
    <title>getWork</title>
   
</head>
<body >

    <header class="header">
  
        <div class="wrapper">
            <div class="navbar">
            <div class="logo">
            <img src="../imageService/business-2684758__340.webp" alt="">
                    <a href="../admin/Acceui_Admin.php">getWork</a>
                </div>
                <!-- <div>
                <form action="http://localhost/PFFE/admin/Acceui_Admin.php" method="GET">
                <div class="box-recherch">
              <i class="fa fa-search" aria-hidden="true"></i>
                <input name="search" placeholder="trouver des services" id="input-Rechercher" type="text">
                <button id="button-Rechercher">Rechercher</button>
              </div>
                
            </form>
            </div> -->
            <form class="example" action="http://localhost/PFFE/admin/Acceui_Admin.php" method="GET">
  <input type="text" placeholder="quel service recherchez-vous aujourd'hui ?
" name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
                <div class="nav_right">
                    <ul>
                        <li class="nr_li">
                            <!--<i class="fas fa-plus"></i>-->
                        </li>
                       
    
                        <?php
                    
                    if($_SESSION['admin']==1){
                    ?>
                   

                    <li class="nr_li">
                      <a href="../admin/Administration.php" id="shield"> entre à l'administration <i class="fas fa-user-shield"></i></a>
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
                       
                        <!-- <li class="nr_li">
                            <i class="fas fa-envelope-open-text"></i>
                        </li> -->
                        
                        <li class="nr_li dd_main">
                  
    
                            <img class="image_profil"  src="<?php echo ($_SESSION['img']);?>" alt="profile_img">
                            
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

      <div class="cont">
        <div class="roww profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                   
                    <!-- END MENU -->

                    
                           
                            <div class="card-block">
                                <div  class="user-image">
                                <img  src="<?php echo $pho;?>" id="photo">
                                    
                                </div>
                               
                               
                               
                                <h6 class="f-w-600 m-t-25 m-b-10"><?php echo ($psudo); ?></h6>
                            
                            </div>
                               
                                <p class="text-muted">Membre depuis : <?php  echo $date ;?></p>
                                <hr>
                                <p class="text-muted m-t-15"> Pour plus d'information contactez moi par :</p>
                                <div class="email details">
                                    <i class="fas fa-envelope"></i>
                                    <div class="topic">Email</div>
                                    <div class="text-one"><?php echo $email?></div>
                                   
                                  </div>
                                   
                                    <div class="phone details">
                                      <i class="fas fa-phone-alt"></i>
                                      <div class="topic">Phone</div>
                                      <div class="text-one"><?php echo $phone?></div>
                                      
                                    </div>

                                   
                                   
                                  
                                <p class="text-muted m-t-15">nombre des offeres : <?php echo mysqli_num_rows($ofnum_run);?></p>
                               <!-- <div class="bg-c-blue counter-block m-t-10 p-20">
                                    <div class="row">
                                        <div class="col-4">
                                            <i class="fa fa-comment"></i>
                                            <p>1256</p>
                                        </div>
                                        <div class="col-4">
                                            <i class="fa fa-user"></i>
                                            <p>8562</p>
                                        </div>
                                        <div class="col-4">
                                            <i class="fa fa-suitcase"></i>
                                            <p>189</p>
                                        </div>
                                    </div>
                                </div>
                                <p class="m-t-15 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <hr>
                                <div class="row justify-content-center user-social-link">
                                    <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook"></i></a></div>
                                    <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter"></i></a></div>
                                    <div class="col-auto"><a href="#!"><i class="fa fa-dribbble text-dribbble"></i></a></div>
                                </div>-->
                            </div>
                        </div>
                  
            </div>

            <?php
            
            if(mysqli_num_rows($Offer_run)==0){
            ?>
           <div class="">
                <div class="profile-content">
                   <p class="p"> aucun offer a ete poste<p>
                  


                 



                  
                </div>
                
                

                <?php
            }
            else{
                ?>
                <div class="main">
                    <!-- <form action="" metod="POST">
              <button class="save" > <i id="" class="fas fa-bookmark  " ></i> Enregistrer</button>
              </form> -->
              <div class="Evaleuer">
                    <?php
                     $ofstarFrom="SELECT Eval FROM evaleuation WHERE  numoff='".$offerid."' and EvalFrom='".$_SESSION['pseudo']."' ";
                     $ofstarFrom_run=mysqli_query($conn,$ofstarFrom);
                     if(mysqli_num_rows($ofstarFrom_run)==0){
                      if(mysqli_num_rows($ofstar_run)>0){
                          
                    ?>
                   <div class="note">
                    <span><span class="pns"><?php echo mysqli_num_rows($ofstar_run)?></span> personne pense que cette offre deserve <span class="pns"><?php echo $max; ?></span> étoiles</span>
                    <span>, que pensez vous ?</span>
                </div>

                <form action="" method="POST">
               
               <div class="center">
             
                       
                       <fieldset class="rating">
                           <input type="radio" id="star5" name="rating" value="5"/><label for="star5" class="full" title="Awesome"></label>
                          
                           <input type="radio" id="star4" name="rating" value="4"/><label for="star4" class="full"></label>
                        
                           <input type="radio" id="star3" name="rating" value="3"/><label for="star3" class="full"></label>
                          
                           <input type="radio" id="star2" name="rating" value="2"/><label for="star2" class="full"></label>
                        
                           <input type="radio" id="star1" name="rating" value="1"/><label for="star1" class="full"></label>

                       </fieldset>

                       
                   </div>
                   <button name="yes" class="yes"> confirmer</button>
                   </form>
                   <?php }else{
                      ?>
                      <div class="note">
                      <span >Soyez le premier à noter cette offre .</span>
                      <span>Selon vous, combien d'étoiles vaut ?</span>
                      <form action="" method="POST">
               
               <div class="center">
             
                       
                       <fieldset class="rating">
                           <input type="radio" id="star5" name="rating" value="5"/><label for="star5" class="full" title="Awesome"></label>
                          
                           <input type="radio" id="star4" name="rating" value="4"/><label for="star4" class="full"></label>
                        
                           <input type="radio" id="star3" name="rating" value="3"/><label for="star3" class="full"></label>
                          
                           <input type="radio" id="star2" name="rating" value="2"/><label for="star2" class="full"></label>
                        
                           <input type="radio" id="star1" name="rating" value="1"/><label for="star1" class="full"></label>

                       </fieldset>

                       
                   </div>
                   <button name="yes" class="yes"> confirmer</button>
                   </form>
                      </div>
                  
                      <?php }?>
                <!-- <p >Donner une Evaleuation </p>
                <form action="" method="POST">
               
                <div class="center">
              
                        
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" value="5"/><label for="star5" class="full" title="Awesome"></label>
                           
                            <input type="radio" id="star4" name="rating" value="4"/><label for="star4" class="full"></label>
                         
                            <input type="radio" id="star3" name="rating" value="3"/><label for="star3" class="full"></label>
                           
                            <input type="radio" id="star2" name="rating" value="2"/><label for="star2" class="full"></label>
                         
                            <input type="radio" id="star1" name="rating" value="1"/><label for="star1" class="full"></label>

                        </fieldset>

                        
                    </div>
                    <button name="yes" class="yes"> confirmer</button>
                    </form> -->
                    <?php
                     
                     }else {
                        while($sta=mysqli_fetch_assoc($ofstarFrom_run)){
                            $st=$sta['Eval'];
                        }
                        if(mysqli_num_rows($ofstar_run)>1){

                         ?>
                     
                         <div class="note">
                    <span> vous et <span class="pns"><?php echo mysqli_num_rows($ofstar_run)-1?></span> autre personne pense que cette offre deserve <span class="pns"><?php echo $max; ?></span> étoiles</span>
                       <!-- <p >Votre Evaleuation </p> -->
                </div>
                <?php
                        }else{
                ?>
                  <div class="note">
                    <!-- <span> vous  pensez que cette offre deserve <span class="pns"><?php //echo $max; ?></span> étoiles</span> -->
                       <!-- <p >Votre Evaleuation </p> -->
                </div>
                <?php
                        }
                ?>
                   <p class="p">Votre Evaleuation: </p>
                          <?php

                    if($st==0){
                    ?>
                         <!-- <p >Votre Evaleuation </p> -->  
                    <div class="stars">
            <i class="lar la-star " data-value="1"></i>
            <i class="lar la-star " data-value="2"></i>
            <i class="lar la-star " data-value="3"></i>
            <i class="lar la-star" data-value="4"></i>
            <i class="lar la-star" data-value="5"></i>
        </div>
        <?php
        } else if($st==1){
        ?>
                <div class="stars">
            <i class="lar la-star star" data-value="1"></i>
            <i class="lar la-star " data-value="2"></i>
            <i class="lar la-star " data-value="3"></i>
            <i class="lar la-star" data-value="4"></i>
            <i class="lar la-star" data-value="5"></i>
        </div>
        <?php
        } else if($st==2){
        ?>
                <div class="stars">
            <i class="lar la-star star" data-value="1"></i>
            <i class="lar la-star star" data-value="2"></i>
            <i class="lar la-star " data-value="3"></i>
            <i class="lar la-star" data-value="4"></i>
            <i class="lar la-star" data-value="5"></i>
        </div>
        <?php
        } else if($st==3){
        ?>
                <div class="stars">
            <i class="lar la-star star" data-value="1"></i>
            <i class="lar la-star star" data-value="2"></i>
            <i class="lar la-star star" data-value="3"></i>
            <i class="lar la-star" data-value="4"></i>
            <i class="lar la-star" data-value="5"></i>
        </div>
        <?php
        } else if($st==4){
        ?>
                <div class="stars">
            <i class="lar la-star star" data-value="1"></i>
            <i class="lar la-star star" data-value="2"></i>
            <i class="lar la-star star" data-value="3"></i>
            <i class="lar la-star star" data-value="4"></i>
            <i class="lar la-star" data-value="5"></i>
        </div>
        <?php
        } else if($st==5){
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
        

                         
                         
                         <?php
                     }
                    ?>
                </div>
                <?php
                

                while($g=mysqli_fetch_assoc($Offer_run)){
                ?>

                                        




                    <!--cards -->
                   
                   <div class="card">
                   
                   <div class="image">
                      <img src="<?php echo "../user/".$g['OfferImage'] ?>">
                   </div>
                   <div class="des">
                    <span class="spn">Description :</span>
                    <p><?php echo $g['OfferDescription']?></p>
                   
                   </div>

                   <div class="title">
                       
                    <span class="spn">Evaluation :</span>
                   
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
                   <!-- <div class="des">
                    <span class="spn">Le type: <?php //echo $g['OfferCategore']?></span>
                   
 
                   </div> -->
                   <div class="des">
                    <span class="spn">prix: <?php echo $g['OfferPrix']?> DZ</span>
                   
 
                   </div>
                   
                   
                 
                   </div>
                   <!--cards -->
                   
                   
                  <?php
                  
                  }}
                  
                  ?>
                 

                  <?php
                  
                  $Offer="SELECT * FROM offers WHERE OfferPoster ='".$Poster."'";
            $Offer_run=mysqli_query($conn,$Offer);
            if(mysqli_num_rows($Offer_run)>1){
                  ?>
                   <hr>
                   <div class="main">
                       <h1 class="h1">Tu pourrais aussi aimer</h1>
                
                <?php
                

                while($g=mysqli_fetch_assoc($Offer_run)  ){
                    if($g['idOffer']!=$offerid){
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
                

                                        




                    <!--cards -->
                   
                   <div class="card">
                   <a href="?idPOS=<?php echo $g['idOffer']?>">
                   <div class="image">
                      <img src="../user/<?php echo $g['OfferImage'] ?>">
                   </div>
                   <div class="des">
                    <span class="spn">Description :</span>
                    <p><?php echo $g['OfferDescription']?></p>
                   
                   </div>
                   </a>
                   <div class="title">
                       
                    <span class="spn">Evaluation :</span>
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
                   <!-- <div class="des">
                    <span class="spn">Le type: <?php //echo $g['OfferCategore']?></span>
                   
 
                   </div> -->
                   <div class="des">
                    <span class="spn">prix: <?php echo $g['OfferPrix']?> DZ</span>
                   
 
                   </div>
                   
                   
                  
                   </div>
                   <!--cards -->
                   
                   
                  <?php
                  
                  }}}
                  
                  ?>

                
   
            </div>
            
        </div>

        
    </div>

    
    <br>
    <br>

    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<!--<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>-->
<script src="../admin/Control-Administration.js?V=<?php echo time()?>"></script>
<script src="Control_profil.js?V=<?php echo time()?>"></script>
<script src="https://kit.fontawesome.com/6f2f9c8fbf.js" ></script>
<script>window.localStorage.clear();</script>

</body>
</html>

<?php

}
else{
  header("Location:../error.html"); 
}
}
?>